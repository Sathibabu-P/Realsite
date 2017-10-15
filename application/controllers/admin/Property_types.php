<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property_types extends CI_Controller {
	

	function __construct() {
        parent::__construct();
        // Load facebook library
        $this->load->model('property_type');    
       
    }


	public function index()
	{	
		$data['title'] = 'PropertyTypes';
		$data['property_types'] = $this->property_type->property_types();
		$this->load->view('admins/header');
		$this->load->view('admins/property_types/index',$data);
		$this->load->view('admins/footer');
	}

	

	public function create()
	{			
		
		if ($this->form_validation->run('property_type') == FALSE)
        {         
            $data['title'] = 'Create PropertyType';	
			$this->load->view('admins/header');
			$this->load->view('admins/property_types/create',$data);
			$this->load->view('admins/footer');
        }else{

        	$data['name'] = ucfirst($this->input->post('name'));	
        	if($this->property_type->create($data)){
        		$this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('message', 'Sucessfully Creted..');                
        	}else{
        		$this->session->set_flashdata('type', 'danger');
                $this->session->set_flashdata('message', 'Please try again problem with database connection..');
        	}
        	redirect('admins/property_types');
        }
		
	}

	public function edit()
	{	
		if ($this->form_validation->run('property_type') == FALSE)
        {
			$data['title'] = 'Edit PropertyType';
			$id =$this->uri->segment(4);
			if(empty($id)) $id =$this->input->post('id');
			$id = base64_decode($id);		
			$data['property_type'] = $this->property_type->property_type($id);
			$this->load->view('admins/header');
			$this->load->view('admins/property_types/edit',$data);
			$this->load->view('admins/footer');
		}else{
			$id =$this->input->post('id');
			$id = base64_decode($id);
			$data['name'] = ucfirst($this->input->post('name'));
        	if($this->property_type->update($id,$data)){
        		$this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('message', 'Sucessfully Creted..');                
        	}else{
        		$this->session->set_flashdata('type', 'danger');
                $this->session->set_flashdata('message', 'Please try again problem with database connection..');
        	}
        	redirect('admins/property_types');
		}
	}



	public function delete(){
		$id =$this->uri->segment(4);
		$id = base64_decode($id);
		if($this->property_type->delete($id)){
			$this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('message', 'Sucessfully Deleted..');                
    	}else{
    		$this->session->set_flashdata('type', 'danger');
            $this->session->set_flashdata('message', 'Please try again problem with database connection..');
    	}
    	redirect('admins/property_types');
	}


	public  function isunique($name){
		if($this->property_type->isunique($name)){
			$this->form_validation->set_message('isunique', 'Property Name alredy used..');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	



	
}
