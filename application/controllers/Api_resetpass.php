<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_resetpass extends CI_Controller {
	function __construct(){
    parent::__construct();
    $this->load->model('Akun_model');
		$this->load->model('Reset_model');

		$this->load->helper('string');
  }
  public function email_reset_password_validation(){
    $email = $this->input->post('email');
    $reset_key = random_string('alnum', 15);
    if($this->Reset_model->update_reset_key($email,$reset_key))
    {
      $this->load->library('email');
      $config = array();
      $config['charset'] = 'utf-8';
      $config['useragent'] = 'Codeigniter';
      $config['protocol']= "smtp";
      $config['mailtype']= "html";
      $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
      $config['smtp_port']= "465";
      $config['smtp_timeout']= "5";
      $config['smtp_user']= "exkost.decode@gmail.com"; // isi dengan email kamu
      $config['smtp_pass']= "decode12345"; // isi dengan password kamu
      $config['crlf']="\r\n";
      $config['newline']="\r\n";
      $config['wordwrap'] = TRUE;
      //memanggil library email dan set konfigurasi untuk pengiriman email
      $this->email->initialize($config);
      //konfigurasi pengiriman
      $this->email->from($config['smtp_user']);
      $this->email->to($this->input->post('email'));
      $this->email->subject("Reset your password");
      $message = "<p>Anda melakukan permintaan reset password</p>";
      $message .= "<p>Silahkan salin kode reset ini ke form reset password di aplikasi:</p>";
      $message .= "<p>".$reset_key."</p>";
      $this->email->message($message);
      if($this->email->send())
      {
        $response = array(
          'msg' => $this->input->post('email')
        );
        echo json_encode($response);
        //echo "silahkan cek email <b>".$this->input->post('email').'</b> untuk melakukan reset password';
      }else
      {
        $response = array(
          'msg' => 'failedsend'
        );
        echo json_encode($response);
      }
    }else {
      $response = array(
        'msg' => 'noemail'
      );
      echo json_encode($response);
    }
  }
  public function reset_password(){
    $reset_key = $this->uri->segment(3);
    if(!$reset_key){
      die('Jangan Dihapus');
    }
    if($this->Reset_model->check_reset_key($reset_key) == 1)
    {
      $this->load->view('reset_password');
    } else{
      die("reset key salah");
    }
  }
  public function reset_password_validation(){
    $reset_key = $this->input->post('reset_key');
    $password = $this->input->post('password');
    if($this->Reset_model->check_reset_key($reset_key) == 1)
    {
      if($this->Reset_model->reset_password($reset_key, $password)){
        $response = array(
          'reset' => 'sukses'
        );
        echo json_encode($response);
      }else{
        $response = array(
          'reset' => 'gagal'
        );
        echo json_encode($response);
      }
    }else {
      $response = array(
        'reset' => 'keyfalse'
      );
      echo json_encode($response);
    }
  }
}
