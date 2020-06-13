<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct(){
    parent::__construct();
    $this->load->model('Akun_model');
		$this->load->model('Jenis_model');
		$this->load->model('Barang_model');
		$this->load->model('Reset_model');

		$this->load->helper('string');
  }
	public function index()
	{
		$this->Now->updateNow();
    $done['now'] = $this->Now->getNow()->result();
    $done['all'] = $this->Done_model->allLelang()->result();
    $selesai = $this->done->selesai($done);
    if ($selesai!=NULL) {
      foreach ($selesai as $value) {
        $ids[] = $value;
      }
      $this->Done_model->changeStat($ids);
      foreach ($ids as $thisid) {
        $win = $this->Done_model->listTawaran($thisid)->num_rows();
        if ($win!=0) {
          $wins = $this->Done_model->winnerBid($thisid)->result();
          foreach ($wins as $datawin) {
            $jumbid = $datawin->jumlah_tawaran;
          }
          $winner = $this->Done_model->winnerData($jumbid,$thisid)->result();
          foreach ($winner as $w) {
            $this->Done_model->insertWinner($w->id_tawaran);
          }
        }else {
          $this->Done_model->changeStatl($thisid);
        }
      }
    }
		$limbar = 6;
    $limcol = 3;
    $limnew = 4;
    $limtop = 4;
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['jenlimcol'] = $this->Jenis_model->jenisLimit($limcol)->result();
    $data['jenlimnew'] = $this->Jenis_model->jenisLimit($limnew)->result();
    $data['jenlimtop'] = $this->Jenis_model->jenisLimit($limtop)->result();
    $data['barang'] = $this->Barang_model->getAll()->result();
		$this->load->view('main_view',$data);
	}
	public function login()
	{
		$this->Now->updateNow();
    $done['now'] = $this->Now->getNow()->result();
    $done['all'] = $this->Done_model->allLelang()->result();
    $selesai = $this->done->selesai($done);
    if ($selesai!=NULL) {
      foreach ($selesai as $value) {
        $ids[] = $value;
      }
      $this->Done_model->changeStat($ids);
      foreach ($ids as $thisid) {
        $win = $this->Done_model->listTawaran($thisid)->num_rows();
        if ($win!=0) {
          $wins = $this->Done_model->winnerBid($thisid)->result();
          foreach ($wins as $datawin) {
            $jumbid = $datawin->jumlah_tawaran;
          }
          $winner = $this->Done_model->winnerData($jumbid,$thisid)->result();
          foreach ($winner as $w) {
            $this->Done_model->insertWinner($w->id_tawaran);
          }
        }else {
          $this->Done_model->changeStatl($thisid);
        }
      }
    }
		$this->load->view('login');
	}
	public function prosesLogin(){
		$this->Now->updateNow();
    $done['now'] = $this->Now->getNow()->result();
    $done['all'] = $this->Done_model->allLelang()->result();
    $selesai = $this->done->selesai($done);
    if ($selesai!=NULL) {
      foreach ($selesai as $value) {
        $ids[] = $value;
      }
      $this->Done_model->changeStat($ids);
      foreach ($ids as $thisid) {
        $win = $this->Done_model->listTawaran($thisid)->num_rows();
        if ($win!=0) {
          $wins = $this->Done_model->winnerBid($thisid)->result();
          foreach ($wins as $datawin) {
            $jumbid = $datawin->jumlah_tawaran;
          }
          $winner = $this->Done_model->winnerData($jumbid,$thisid)->result();
          foreach ($winner as $w) {
            $this->Done_model->insertWinner($w->id_tawaran);
          }
        }else {
          $this->Done_model->changeStatl($thisid);
        }
      }
    }
		$email = $this->input->post('email');
    $password = $this->input->post('password');

		$data = array(
      'email_akun' => $email,
			'pass_akun' => $password
    );

		$cek = $this->Akun_model->loginAkun($data)->num_rows();
		if($cek > 0){
			$dataakun = $this->Akun_model->loginAkun($data)->result();
			foreach ($dataakun as $akun) {
				$id_akun = $akun->id_akun;
			}
			$data_session = array(
				'id_akun' => $id_akun,
				'status' => "login"
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('Home'));
		}
		else{
			$data['login'] = "salah";
			$this->load->view('login',$data);
		}
	}
	function logout(){
		$this->Now->updateNow();
    $done['now'] = $this->Now->getNow()->result();
    $done['all'] = $this->Done_model->allLelang()->result();
    $selesai = $this->done->selesai($done);
    if ($selesai!=NULL) {
      foreach ($selesai as $value) {
        $ids[] = $value;
      }
      $this->Done_model->changeStat($ids);
      foreach ($ids as $thisid) {
        $win = $this->Done_model->listTawaran($thisid)->num_rows();
        if ($win!=0) {
          $wins = $this->Done_model->winnerBid($thisid)->result();
          foreach ($wins as $datawin) {
            $jumbid = $datawin->jumlah_tawaran;
          }
          $winner = $this->Done_model->winnerData($jumbid,$thisid)->result();
          foreach ($winner as $w) {
            $this->Done_model->insertWinner($w->id_tawaran);
          }
        }else {
          $this->Done_model->changeStatl($thisid);
        }
      }
    }
		$this->session->sess_destroy();
		redirect(base_url('main'));
	}
	public function register()
	{
		$this->Now->updateNow();
    $done['now'] = $this->Now->getNow()->result();
    $done['all'] = $this->Done_model->allLelang()->result();
    $selesai = $this->done->selesai($done);
    if ($selesai!=NULL) {
      foreach ($selesai as $value) {
        $ids[] = $value;
      }
      $this->Done_model->changeStat($ids);
      foreach ($ids as $thisid) {
        $win = $this->Done_model->listTawaran($thisid)->num_rows();
        if ($win!=0) {
          $wins = $this->Done_model->winnerBid($thisid)->result();
          foreach ($wins as $datawin) {
            $jumbid = $datawin->jumlah_tawaran;
          }
          $winner = $this->Done_model->winnerData($jumbid,$thisid)->result();
          foreach ($winner as $w) {
            $this->Done_model->insertWinner($w->id_tawaran);
          }
        }else {
          $this->Done_model->changeStatl($thisid);
        }
      }
    }
		$this->load->view('register');
	}
	public function prosesRegister(){
		$this->Now->updateNow();
    $done['now'] = $this->Now->getNow()->result();
    $done['all'] = $this->Done_model->allLelang()->result();
    $selesai = $this->done->selesai($done);
    if ($selesai!=NULL) {
      foreach ($selesai as $value) {
        $ids[] = $value;
      }
      $this->Done_model->changeStat($ids);
      foreach ($ids as $thisid) {
        $win = $this->Done_model->listTawaran($thisid)->num_rows();
        if ($win!=0) {
          $wins = $this->Done_model->winnerBid($thisid)->result();
          foreach ($wins as $datawin) {
            $jumbid = $datawin->jumlah_tawaran;
          }
          $winner = $this->Done_model->winnerData($jumbid,$thisid)->result();
          foreach ($winner as $w) {
            $this->Done_model->insertWinner($w->id_tawaran);
          }
        }else {
          $this->Done_model->changeStatl($thisid);
        }
      }
    }
    $nama = $this->input->post('nama');
    $alamat = $this->input->post('alamat');
    $notelepon = $this->input->post('notelepon');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
		$rekening = $this->input->post('rekening');

    $data = array(
      'nama_akun' => $nama,
      'alamat_akun' => $alamat,
      'no_telp_akun' => $notelepon,
      'email_akun' => $email,
			'pass_akun' => $password,
			'rekening_akun' => $rekening
    );

		$cekEmail = $this->Akun_model->cekEmail($data)->num_rows();
		if ($cekEmail == 0) {
			$data['regisSukses'] = "ya";
		  $this->Akun_model->registerAkun($data,'akun');
		  $this->load->view('login',$data);
		}
		else {
			$data['cekEmail'] = "ada";
			$this->load->view('register',$data);
		}
  }
	function lupa_password(){
		$this->load->view('lupa_password');
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
			$message .= "<a href='".base_url('main/reset_password/'.$reset_key)."'>klik reset password</a>";
			$this->email->message($message);
			if($this->email->send())
			{
				echo "silahkan cek email <b>".$this->input->post('email').'</b> untuk melakukan reset password';
			}else
			{
				echo "Berhasil melakukan registrasi lupa password, gagal mengirim verifikasi email";
			}
			echo "<br><br><a href='".base_url('main/login')."'>Kembali ke Menu Login</a>";
		}else {
			die("Email yang anda masukan belum terdaftar");
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
		if($this->Reset_model->reset_password($reset_key, $password)){
			$data['resetSukses'] = "ya";
			$this->load->view('login',$data);
		}else{
			$data['resetSukses'] = "tidak";
			$this->load->view('login',$data);
		}
	}
}
