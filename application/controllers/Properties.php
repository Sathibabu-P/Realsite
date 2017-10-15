<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Properties extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('property_type'); 
        $this->load->model('city'); 
        $this->load->model('area');   
        $this->load->model('amenity'); 
        $this->load->library("pagination");
       
    }

	public function index()	
	{	

		$search['city_id'] = 0;
		$search['area_id'] =0;
		$search['property_type_id'] = 0;

		if($this->uri->segment(2) == 'search'){

			$search['city_id'] = $this->input->post('city_id');
			$search['area_id'] = $this->input->post('area_id');
			$search['property_type_id'] = $this->input->post('property_type_id');
			$this->session->set_userdata($search);

		}elseif($this->uri->segment(2) == 'page'){

			$search['city_id'] = ($this->session->userdata('city_id')) ? $this->session->userdata('city_id') : 0;
			$search['area_id'] = ($this->session->userdata('area_id')) ? $this->session->userdata('area_id') : 0;
			$search['property_type_id'] = ($this->session->userdata('property_type_id')) ? $this->session->userdata('property_type_id') : 0;

		}else{			
			// $array_items = array('city_id', 'area_id','property_type_id');
			// $this->session->unset_userdata($array_items);
			$search['city_id'] = ($this->session->userdata('city_id')) ? $this->session->userdata('city_id') : 0;
			$search['area_id'] = ($this->session->userdata('area_id')) ? $this->session->userdata('area_id') : 0;
			$search['property_type_id'] = ($this->session->userdata('property_type_id')) ? $this->session->userdata('property_type_id') : 0;
			
		}
		

		$data['property_types'] = $this->property_type->property_types();
        $data['cities'] = $this->city->cities();
        $data['areas'] = $this->area->areas();
        $data['search'] = $search;


        // pagination
		$config['base_url'] = 'http://localhost/realsite/properties/page';
		$config["total_rows"] = $this->property->record_count($search);
		$config['per_page'] = 5;
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$this->pagination->initialize($config);		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


		$data['properties'] = $this->property->properties_all($config['per_page'],$page,$search);
		$data["links"] = $this->pagination->create_links();	
		$data['map'] = $this->load->view('map', NULL, TRUE,$data);		
		$this->load->view('header', $data);
		$this->load->view('index',$data);
		$this->load->view('footer');

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

	public function view()
	{
		$id = base64_decode($this->uri->segment(3));
		$data['property'] = $this->property->get_property($id);
		$data['amenities'] = $this->amenity->amenities();
		$data['user'] = $this->user->get_user($data['property']['user_id']);
		$this->load->view('header');
		$this->load->view('view',$data);
		$this->load->view('footer');
	}

	public function enquiry()
	{
		
	 	if($_POST){
	 		if ($this->form_validation->run('enquiry') == TRUE)
    		{
    			$enquiry_data = $this->enquiry_data();
    			if($enquiry = $this->property->insert_property_enquires($enquiry_data))
    			{
    				echo 'successfully submited.';
    			}else{
    				echo FALSE;
    			}
    		}else{
    			echo json_encode(validation_errors());
    		}    		
	 	}
		 
	}

	public function review()
	{
		
	 
	 		if ($this->form_validation->run('review') == FALSE)
    		{

    		}else{
    			$review_data = $this->review_data();
    			if($enquiry = $this->property->insert_property_reviews($review_data))
    			{
	    			$type = 'success';
					$msg  = 'Successfully Submiited.';
	        	} else{
	        		$type = 'danger';
					$msg  = 'Invalid Credentials.';
	        	}
	        	$this->session->set_flashdata('type', $type);
        		$this->session->set_flashdata('message', $msg);
    		} 

    		
    		$id = base64_decode($this->input->post('property_id'));
			$data['property'] = $this->property->get_property($id);
			$data['amenities'] = $this->amenity->amenities();
			$data['user'] = $this->user->get_user($data['property']['user_id']);
			$this->load->view('header');
			$this->load->view('view',$data);
			$this->load->view('footer');
    		
	}

	public function review_data()
	{
		$data['name'] = ucfirst($this->input->post('name'));
		$data['review'] = ucfirst($this->input->post('review'));
		$data['email'] = $this->input->post('email');
		$data['property_id'] = base64_decode($this->input->post('property_id'));	
		$data['rating'] = $this->input->post('rating');				
		return $data;	
	}

	public function enquiry_data()
	{
		$data['name'] = ucfirst($this->input->post('name'));
		$data['message'] = ucfirst($this->input->post('message'));
		$data['email'] = $this->input->post('email');
		$data['property_id'] = base64_decode($this->input->post('property_id'));
		$data['user_id'] = base64_decode($this->input->post('user_id'));			
		return $data;	
	}

	public function unique_review($email){

		if($this->property->unique_review($email)){
			$this->form_validation->set_message('unique_review', 'You are alredy submited review..');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function areas($id) { 
       $result = $this->area->areas_by_city($id);
       echo json_encode($result);
    }
}

