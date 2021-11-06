<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Umkm extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		is_login();
	}
	public function data()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$query = $this->db->limit($_GET['length'], $_GET['start']);
		$query = $query->get('umkm');

		$data = array();

		foreach($query->result() as $k => $r) {

			$data[] = array(
				$k+1,
				$r->nama_usaha,
				$r->nama_pemilik,
				'<div class="text-right">'.number_format($r->omset, 2).'</div>',
				$r->telp,
				$r->spek,
				'<div class="btn-group">
					<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Aksi
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="'.base_url('umkm/edit/'.$r->id).'">Edit</a>
						<a class="dropdown-item confirm" href="'.base_url('umkm/delete/'.$r->id).'">Hapus</a>
					</div>
				</div>'
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $this->db->get('umkm')->num_rows(),
			"recordsFiltered" => $this->db->get('umkm')->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}

	public function index()
	{
		$this->template->load('template', 'umkm/index');
	}

	public function create()
	{
		if($this->form_validation->run('umkm.create') == false) {
			$data['kecamatan'] = $this->db->get('kecamatan')->result();
			$this->template->load('template','umkm/create', $data);
		} else {
			$data = [
				'jenis_usaha'  		=> $this->input->post('jenis_usaha'),
				'nama_usaha'  		=> $this->input->post('nama_usaha'),
				'kecamatan'  			=> $this->input->post('kecamatan'),
				'badan_hukum'  		=> $this->input->post('badan_hukum'),
				'nama_pemilik'  	=> $this->input->post('nama_pemilik'),
				'jumlah_karyawan'  	=> $this->input->post('jumlah_karyawan'),
				'omset'  			=> $this->input->post('omset'),
				'asset'  			=> $this->input->post('asset'),
				'telp'  			=> $this->input->post('telp'),
				'spek'  			=> $this->input->post('spek'),
				'alamat'  			=> $this->input->post('alamat'),
			];
			$this->db->insert('umkm',$data);
			alertsuccess('message','Data berhasil ditambahkan');
			redirect('umkm');
		}
	}

	public function edit($id)
	{
		if($this->form_validation->run('umkm.create') == false) {
			$data['kecamatan'] = $this->db->get('kecamatan')->result();
			$data['umkm'] = $this->db->get_where('umkm',['id'=>$id])->row();
			$this->template->load('template','umkm/edit', $data);
		} else {
			$data = [
				'jenis_usaha'  		=> $this->input->post('jenis_usaha'),
				'nama_usaha'  		=> $this->input->post('nama_usaha'),
				'kecamatan'  			=> $this->input->post('kecamatan'),
				'badan_hukum'  		=> $this->input->post('badan_hukum'),
				'nama_pemilik'  	=> $this->input->post('nama_pemilik'),
				'jumlah_karyawan'  	=> $this->input->post('jumlah_karyawan'),
				'omset'  			=> $this->input->post('omset'),
				'asset'  			=> $this->input->post('asset'),
				'telp'  			=> $this->input->post('telp'),
				'spek'  			=> $this->input->post('spek'),
				'alamat'  			=> $this->input->post('alamat'),
			];
			$this->db->where('id', $id);
			$this->db->update('umkm',$data);
			alertsuccess('message','Data berhasil ditambahkan');
			redirect('umkm');
		}
	}

	public function delete($id)
	{
		$this->db->delete('umkm', ['id' => $id]);

		$data['title'] = 'Sukses';
		$data['text'] = 'Data berhasil dihapus';
		$data['type'] = 'success';

		if (!$this->input->is_ajax_request()) {
			redirect('umkm');
		}
		echo json_encode($data);
	}

	public function upload()
	{
		$this->template->load('template','umkm/upload');
	}

	public function import()
	{
		if(isset($_FILES['import']['name'])) {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

			$spreadsheet = $reader->load($_FILES['import']['tmp_name']);
			$sheetData = $spreadsheet->getActiveSheet()->toArray();

			for($i = 1;$i < count($sheetData);$i++)
			{
				$row = $sheetData[$i];
				$data = [
					'jenis_usaha'  		=> $row['1'],
					'nama_usaha'  		=> $row['2'],
					'alamat'  			=> $row['3'],
					'kecamatan'  		=> $row['4'],
					'desa'				=> $row['5'],
					'badan_hukum'  		=> $row['6'],
					'nama_pemilik'  	=> $row['7'],
					'jumlah_karyawan'  	=> intval($row['9']),
					'omset'  			=> intval($row['10']),
					'asset'  			=> intval($row['11']),
					'telp'  			=> $row['12'],
					'spek'  			=> strtoupper($row['13'])
				];
				$this->db->insert('umkm',$data);
			}
			$status['type'] = 'success';
			$status['title'] = 'Import data sukses!';
		} else {
			$status['type'] = 'error';
			$status['text'] = 'Format Import tidak sesuai. Silahkan download template yang telah disediakan.';
			$status['title'] = 'Import data gagal!';
		}
		echo json_encode($status);
	}
}
