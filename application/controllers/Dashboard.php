<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
	}

	public function index()
	{
		$data['jenis_usaha'] = $this->_getJenisUsahaSum();
		$data['spesifikasi_usaha'] = $this->_getSpesifikasiUsaha();
		$data['kecamatan'] = $this->_getSummaryDesa();

		$this->template->load('template','dashboard/index', $data);
	}

	private function _getJenisUsahaSum()
	{
		$query = $this->db->query("SELECT jenis_usaha, count(1) as total FROM umkm GROUP BY jenis_usaha");
		$jenis_usaha = $query->result();
		$data = [['Jenis Usaha', 'Jumlah UMKM']];
		foreach ($jenis_usaha as $k => $d) {
			$data[] = [$d->jenis_usaha, intval($d->total)];
		}
		return $data;
	}

	private function _getSpesifikasiUsaha()
	{
		$query = $this->db->query("SELECT spek, count(1) as total FROM umkm GROUP BY spek");
		$spesifikasi = $query->result();
		$data = [['Spesifikasi UMKM', 'Jumlah UMKM']];
		foreach ($spesifikasi as $k => $d) {
			$data[] = [$d->spek, intval($d->total)];
		}
		return $data;
	}

	private function _getSummaryDesa()
	{
		$query = $this->db->query("
			select name, 
			(select count(1) from umkm where kecamatan = d.kode) as total_umkm, 
			(select count(1) from umkm where kecamatan = d.kode and spek = 'MIKRO') as total_mikro,
			(select count(1) from umkm where kecamatan = d.kode and spek = 'KECIL') as total_kecil,
			(select avg(omset) from umkm where kecamatan = d.kode ) as rata_omset,
			(select avg(asset) from umkm where kecamatan = d.kode) as rata_asset from kecamatan d");
		return $query->result();
	}
}
