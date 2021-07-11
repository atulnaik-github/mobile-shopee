<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		$this->load->view('adminarea/login');
	}

	public function login_action()
	{
		$user_details = $this->Md_database->getDataObject(
			TBL_USERADMIN,
			'id,user_type,staff_name,user_name,password,status,profile',
			array(
				'user_name' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'status' =>  '1',
			),
			'id desc',
			'1'
		);
		if (!empty($user_details)) {
			$user_details = $user_details[0];

			if ($user_details->status == '1') {

				$this->session->set_userdata('UID', $user_details->id);
				$this->session->set_userdata('UPD', md5($user_details->password));
				$this->session->set_userdata('UNAME', $user_details->staff_name);
				$this->session->set_userdata('UMAIL', $user_details->user_name);
				$this->session->set_userdata('UTYPE', $user_details->user_type);
				$this->session->set_userdata('UPROFILE', $user_details->profile);

				$this->session->set_flashdata('success', 'You are logged in successfully.');
				redirect(base_url() . 'adminarea');
			} else if ($user_details['status'] == '2') {
				$this->session->set_flashdata('error', 'User inactive. Please contact admin.');
				redirect($this->agent->referrer(), 'refresh', 301);
			}
		} else {
			//Email id or password not match:
			/* @ Redirect */
			$this->session->set_flashdata('error', 'Please enter valid credentials to login.');
			redirect($this->agent->referrer(), 'refresh', 301);
		}
	}

	public function logout_action()
	{
		$this->session->unset_userdata('UID');
		$this->session->unset_userdata('UPD');
		$this->session->unset_userdata('UNAME');
		$this->session->unset_userdata('UMAIL');
		$this->session->unset_userdata('UTYPE');
		$this->session->unset_userdata('UPROFILE');
		$this->session->set_flashdata('success', 'You are logged out successfully.');
		redirect(base_url() . 'Login');
	}
}
