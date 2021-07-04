<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller {

	public function forgot_password()
	{
		$this->load->view('adminarea/forgot-password');
	}

	public function otp()
	{
		$this->load->view('adminarea/otp');
	}

	public function reset_password()
	{
		$this->load->view('adminarea/reset-password');
	}
}
