<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function adminBackend($common, $data = array(), $return = FALSE) {
		if ($return):
			$this->load->view('adminarea/includes/head-files');
			$this->load->view('adminarea/includes/navbar');
			$this->load->view('adminarea/includes/sidebar');
			$this->load->view($common, $data);
			$this->load->view('adminarea/includes/footer');
			$this->load->view('adminarea/includes/js-files');
		else:
			$this->load->view('adminarea/includes/head-files');
			$this->load->view('adminarea/includes/navbar');
			$this->load->view('adminarea/includes/sidebar');
			$this->load->view($common);
			$this->load->view('adminarea/includes/footer');
			$this->load->view('adminarea/includes/js-files');
		endif;
	}

	public function staffBackend($common, $data = array(), $return = FALSE) {
		if ($return):
			$this->load->view('staff-area/includes/head-files');
			$this->load->view('staff-area/includes/navbar');
			$this->load->view('staff-area/includes/sidebar');
			$this->load->view($common, $data);
			$this->load->view('staff-area/includes/footer');
			$this->load->view('staff-area/includes/js-files');
		else:
			$this->load->view('staff-area/includes/head-files');
			$this->load->view('staff-area/includes/navbar');
			$this->load->view('staff-area/includes/sidebar');
			$this->load->view($common);
			$this->load->view('staff-area/includes/footer');
			$this->load->view('staff-area/includes/js-files');
		endif;
	}
	
}
