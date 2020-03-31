<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Barang_model');
  }
	public function index()
	{
		$this->load->view('home_view');
	}
}
