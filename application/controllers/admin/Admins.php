<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {

	public function index()
	{	
		$this->load->view('admins/header');
		$this->load->view('admins/index');
		$this->load->view('admins/footer');
	}


	
	public function login()
	{	
		$data['navigation'] = $this->load->view('admins/navigation', NULL, TRUE);
		$this->load->view('admins/header',$data);
		$this->load->view('admins/login');
		$this->load->view('admins/footer');
	}


	
}
