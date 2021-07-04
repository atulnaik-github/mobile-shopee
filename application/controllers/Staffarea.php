<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staffarea extends MY_Controller {

	public function index()
	{
		$this->staffBackend('staff-area/landing-page');
	}

	public function dashboard()
	{
		$this->staffBackend('staff-area/dashboard');
	}

	public function change_password()
	{
		$this->staffBackend('staff-area/change-password');
	}
}
