<?php

$config['auth'] = [
	[
		'field'   => 'username',
		'label'   => 'Username',
		'rules'   => 'required|trim',
	],
	[
		'field'   => 'password',
		'label'   => 'Password',
		'rules'   => 'required|trim'
	]
];

$config['user.create'] = [
	[
		'field'		=> 'username',
		'label'		=> 'Username',
		'rules'		=> 'trim|required|is_unique[user.username]'
	],
	[
		'field'		=> 'name',
		'label'		=> 'Name',
		'rules'		=> 'required'
	],
	[
		'field'		=> 'password1',
		'label'		=> 'Password',
		'rules'		=> 'trim|required|matches[password2]|min_length[3]'
	],
	[
		'field'		=> 'password2',
		'label'		=> 'Password confirm',
		'rules'		=> 'trim|required|matches[password1]'
	]
];

$config['user.update'] = [
	[
		'field'		=> 'username',
		'label'		=> 'Username',
		'rules'		=> 'trim|required'
	],
	[
		'field'		=> 'name',
		'label'		=> 'Name',
		'rules'		=> 'required'
	]
];


$config['kecamatan.create'] = [
	[
		'field'		=> 'kode',
		'label'		=> 'Kode',
		'rules'		=> 'trim|required'
	],
	[
		'field'		=> 'name',
		'label'		=> 'Name',
		'rules'		=> 'required'
	]
];

$config['umkm.create'] = [
	[
		'field'		=> 'nama_pemilik',
		'label'		=> 'Nama pemilik',
		'rules'		=> 'trim|required'
	]
];
