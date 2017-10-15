<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Amenities extends CI_Controller {
	

	function __construct() {
        parent::__construct();
        // Load facebook library
        $this->load->model('amenity');          
       
    }


	public function index()
	{	
		$data['title'] = 'Amenities';
		$data['amenities'] = $this->amenity->amenities();
		$this->load->view('admins/header');
		$this->load->view('admins/amenities/index',$data);
		$this->load->view('admins/footer');
	}

	

	public function create()
	{			
		
		if ($this->form_validation->run('amenity') == FALSE)
        {         
            $data['title'] = 'Create amenity';	
			$this->load->view('admins/header');
			$this->load->view('admins/amenities/create',$data);
			$this->load->view('admins/footer');
        }else{

        	$data['name'] = ucfirst($this->input->post('name'));	
        	if($this->amenity->create($data)){
        		$this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('message', 'Sucessfully Creted..');                
        	}else{
        		$this->session->set_flashdata('type', 'danger');
                $this->session->set_flashdata('message', 'Please try again problem with database connection..');
        	}
        	redirect('admins/amenities');
        }
		
	}

	public function edit()
	{	
		if ($this->form_validation->run('amenity') == FALSE)
        {
			$data['title'] = 'Edit amenity';
			$id =$this->uri->segment(4);
			if(empty($id)) $id =$this->input->post('id');
			$id = base64_decode($id);		
			$data['amenity'] = $this->amenity->amenity($id);
			$this->load->view('admins/header');
			$this->load->view('admins/amenities/edit',$data);
			$this->load->view('admins/footer');
		}else{
			$id =$this->input->post('id');
			$id = base64_decode($id);
			$data['name'] = ucfirst($this->input->post('name'));
        	if($this->amenity->update($id,$data)){
        		$this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('message', 'Sucessfully Creted..');                
        	}else{
        		$this->session->set_flashdata('type', 'danger');
                $this->session->set_flashdata('message', 'Please try again problem with database connection..');
        	}
        	redirect('admins/amenities');
		}
	}



	public function delete(){
		$id =$this->uri->segment(4);
		$id = base64_decode($id);
		if($this->amenity->delete($id)){
			$this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('message', 'Sucessfully Deleted..');                
    	}else{
    		$this->session->set_flashdata('type', 'danger');
            $this->session->set_flashdata('message', 'Please try again problem with database connection..');
    	}
    	redirect('admins/amenities');
	}


	public  function isunique($name){
		if($this->amenity->isunique($name)){
			$this->form_validation->set_message('isunique', 'Amenity Name alredy used..');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	



	
}
