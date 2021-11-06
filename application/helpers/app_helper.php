<?php
defined('BASEPATH') or exit('No direct script access allowed');

function is_login()
{
	$CI =& get_instance();
	if (!$CI->session->has_userdata('user_app_identifer') && !$CI->session->has_userdata('username') ) {
		redirect('auth');
	}
}

function get_my_info()
{
	$CI =& get_instance();

	$user = $CI->db->get_where('user',[
		'username' => $CI->session->userdata('username')
	])->row();

	return $user;
}

function alertsuccess($name,$text) {
	$CI =& get_instance();
	$alert = ' <div class="alert alert-success fade show" role="alert">'.$text.'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
	return $CI->session->set_flashdata($name,$alert);
}

function alerterror($name,$text) {
	$CI =& get_instance();
	$alert = '<div class="alert alert-danger fade show" role="alert">'.$text.'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
	return $CI->session->set_flashdata($name,$alert);
}

function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
