<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Properties extends CI_Controller {


	function __construct() {
        parent::__construct();       
        $this->load->model('property_type'); 
        $this->load->model('city'); 
        $this->load->model('area');   
        $this->load->model('amenity');   
    }

	
	public function index()
	{	
		$data['title'] = 'Properties';
		$data['properties'] = $this->property->properties();		
		$this->load->view('admins/header');
		$this->load->view('admins/properties/index',$data);
		$this->load->view('admins/footer');
	}


	public function create()
	{	
	    if(logged_in()){
	    	$this->custom_redirect();
	    }else{		    	
             $this->session->set_flashdata('type', 'info');
        	 $this->session->set_flashdata('message','Need to Login before Post Your Room.');
	    	 redirect('users');
	    }            
       
	}

	


	

	public function property_data(){
		$data['title'] = ucfirst($this->input->post('title'));
    	$data['description'] = ucfirst($this->input->post('description'));
    	$data['monthly_rent'] = $this->input->post('monthly_rent');
    	$data['total_rooms'] = $this->input->post('total_rooms');
    	$data['fixed_deposit'] = $this->input->post('fixed_deposit');
    	$data['latitude'] = $this->input->post('latitude');
    	$data['longitude'] = $this->input->post('longitude');
    	$data['minimum_stay'] = $this->input->post('minimum_stay');
    	$data['property_type_id'] = $this->input->post('property_type_id');
    	$data['city_id'] = $this->input->post('city_id');
    	$data['area_id'] = $this->input->post('area_id');
    	$data['user_id'] = 1;
    	$data['show_email'] = $this->input->post('show_email');
    	$data['show_phoneno'] = $this->input->post('show_phoneno');
    	$data['current_roommates'] = $this->input->post('current_roommates');
    	$data['preferred_gender'] = $this->input->post('preferred_gender');
    	$data['preferred_occupation'] = $this->input->post('preferred_occupation');
    	$data['preferred_age_from'] = $this->input->post('preferred_age_from');
    	$data['show_phoneno'] = $this->input->post('show_phoneno');
    	$data['show_email'] = $this->input->post('show_email');	
    	$data['preferred_age_to'] = $this->input->post('preferred_age_to');		
    	$data['amenities'] = json_encode(implode(",", $this->input->post('amenities[]'))); 	
    	return $data;
	}



	public function areas($id) { 
       $result = $this->area->areas_by_city($id);
       echo json_encode($result);
    }


}
