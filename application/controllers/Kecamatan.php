<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		is_login();
	}

	public function index()
	{
		$data['desas'] = $this->db->get('kecamatan')->result();
		$this->template->load('template','kecamatan/index', $data);
	}

	public function create()
	{
		if($this->form_validation->run('kecamatan.create') == false) {
			$this->template->load('template','kecamatan/create');
		} else {
			$data = [
				'kode'  => $this->input->post('kode'),
				'name'      => $this->input->post('name')
			];
			$this->db->insert('kecamatan',$data);
			alertsuccess('message','Data berhasil ditambahkan');
			redirect('kecamatan');
		}
	}

	public function edit($id)
	{
		if($this->form_validation->run('kecamatan.create') == false){
			$data['users'] = $this->db->get_where('kecamatan',['id'=>$id])->row();
			$this->template->load('template','kecamatan/edit',$data);
		} else {
			$data = [
				'kode'  => $this->input->post('kode'),
				'name'      => $this->input->post('name')
			];
			$this->db->where('id',$id);
			$this->db->update('kecamatan',$data);
			alertsuccess('message','Data berhasil diubah');
			redirect('kecamatan');
		}
	}

	public function delete($id)
	{
		$this->db->delete('kecamatan', ['id' => $id]);

		$data['title'] = 'Sukses';
		$data['text'] = 'Data berhasil dihapus';
		$data['type'] = 'success';

		echo json_encode($data);
	}
}
