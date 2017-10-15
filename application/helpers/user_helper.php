<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function logged_in()
{
	$CI = & get_instance();
	if($CI->session->userdata('logged_in') == true) return true;
	return false;
}

function current_user($id)
{
	$CI = & get_instance();
	$CI->load->database();
	$query = $CI->db->get_where('users',array('id'=>$id));
	if($query->num_rows() > 0) return $query->row_array();
    return false;
}