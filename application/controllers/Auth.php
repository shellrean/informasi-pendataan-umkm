<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	private function _cekLogin()
	{
		if ($this->session->has_userdata('user_app_identifer')) {
			redirect('dashboard');
		}
	}

	public function index()
	{
		$this->_cekLogin();

		if ($this->form_validation->run('auth') == false) {
			$this->load->view('auth/login');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row();

		# if the user is find in database
		if ($user) {

			# check is user active ?
			if ($user->is_active == 1) {

				# verify if user find
				if (password_verify($password, $user->password)) {

					$query = $this->db->get_where('login', ['username' => $username]);

					# make identifer for session
					$identifer = uniqid();

					# set all session data and take it in array
					$data = [
						'id'	=> $user->id,
						'username' => $user->username,
						'user_app_identifer' => $identifer,
					];
					$this->session->set_userdata($data);

					redirect('dashboard');
				}
			}
		}
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered!</div>');
		redirect('auth');
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('slug');
		$this->session->unset_userdata('user_app_identifer');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been log out!</div>');
		redirect('auth');
	}
}
