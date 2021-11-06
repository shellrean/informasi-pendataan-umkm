<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		is_login();
	}

	public function index()
	{
		$data['users'] = $this->db->get('user')->result();
		$this->template->load('template', 'user/index', $data);
	}

	public function create()
	{
		if($this->form_validation->run('user.create') == false) {
			$this->template->load('template','user/create');
		} else {
			$data = [
				'username'  => $this->input->post('username'),
				'name'      => $this->input->post('name'),
				'password'  => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
				'is_active' => 1
			];
			$this->db->insert('user',$data);
			alertsuccess('message','Data berhasil ditambahkan');
			redirect('user');
		}
	}

	public function edit($id)
	{
		if($this->form_validation->run('user.update') == false){
			$data['users'] = $this->db->get_where('user',['id'=>$id])->row();
			$this->template->load('template','user/edit',$data);
		} else {
			$data = [
				'username'  => $this->input->post('username'),
				'name'      => $this->input->post('name'),
				'is_active' => $this->input->post('is_active'),
			];
			$this->db->where('id',$id);
			$this->db->update('user',$data);
			alertsuccess('message','Data berhasil diubah');
			redirect('user');
		}
	}

	public function ubahpass()
	{
		$this->form_validation->set_rules('password1','Password','required|trim|matches[password2]|min_length[6]');
		$this->form_validation->set_rules('password2','Password confirm','required|trim|matches[password1]');

		if($this->form_validation->run() == false) {
			$data['user'] = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row();
			$this->template->load('template','user/profile',$data);

		} else {
			$data = [
				'password' => password_hash($this->input->post('password1',true),PASSWORD_DEFAULT)
			];
			$this->db->where('username',$this->session->userdata('username'));
			$this->db->update('user',$data);
			alertsuccess('message','Password berhasil diubah');
			redirect('user/profile');
		}
	}

	public function reset($id)
	{
		$newpassword = generateRandomString(5);
		$password = password_hash($newpassword,PASSWORD_DEFAULT);
		$this->db->where('id',$id);
		$this->db->update('user',['password' => $password]);

		alertsuccess('message','Password baru <b>'.$newpassword.'</b>');
		redirect('user/index');
	}

	public function delete($id)
	{
		$user = $this->db->get_where('user',['id' => $id])->row();

		if($user->username == $this->session->userdata('username')) {
			alerterror('message','Tidak bisa menghapus diri sendiri');
			redirect('user');
		}

		$this->db->delete('user', ['id' => $id]);

		$data['title'] = 'Sukses';
		$data['text'] = 'Data berhasil dihapus';
		$data['type'] = 'success';

		echo json_encode($data);
	}
}
