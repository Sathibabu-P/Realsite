<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cities extends CI_Controller {
	

	function __construct() {
        parent::__construct();
        // Load facebook library
        $this->load->model('city');    
       
    }


	public function index()
	{	
		$data['title'] = 'Cities';
		$data['cities'] = $this->city->cities();
		$this->load->view('admins/header');
		$this->load->view('admins/cities/index',$data);
		$this->load->view('admins/footer');
	}

	

	public function create()
	{			
		
		if ($this->form_validation->run('city') == FALSE)
        {         
            $data['title'] = 'Create City';	
			$this->load->view('admins/header');
			$this->load->view('admins/cities/create',$data);
			$this->load->view('admins/footer');
        }else{

        	$data['name'] = ucfirst($this->input->post('name'));	
        	if($this->city->create($data)){
        		$this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('message', 'Sucessfully Creted..');                
        	}else{
        		$this->session->set_flashdata('type', 'danger');
                $this->session->set_flashdata('message', 'Please try again problem with database connection..');
        	}
        	redirect('admins/cities');
        }
		
	}

	public function edit()
	{	
		if ($this->form_validation->run('city') == FALSE)
        {
			$data['title'] = 'Edit City';
			$id =$this->uri->segment(4);
			if(empty($id)) $id =$this->input->post('id');
			$id = base64_decode($id);		
			$data['city'] = $this->city->city($id);
			$this->load->view('admins/header');
			$this->load->view('admins/cities/edit',$data);
			$this->load->view('admins/footer');
		}else{
			$id =$this->input->post('id');
			$id = base64_decode($id);
			$data['name'] = ucfirst($this->input->post('name'));
        	if($this->city->update($id,$data)){
        		$this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('message', 'Sucessfully Creted..');                
        	}else{
        		$this->session->set_flashdata('type', 'danger');
                $this->session->set_flashdata('message', 'Please try again problem with database connection..');
        	}
        	redirect('admins/cities');
		}
	}



	public function delete(){
		$id =$this->uri->segment(4);
		$id = base64_decode($id);
		if($this->city->delete($id)){
			$this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('message', 'Sucessfully Deleted..');                
    	}else{
    		$this->session->set_flashdata('type', 'danger');
            $this->session->set_flashdata('message', 'Please try again problem with database connection..');
    	}
    	redirect('admins/cities');
	}


	public  function isunique($name){
		if($this->city->isunique($name)){
			$this->form_validation->set_message('isunique', 'City Name alredy used..');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	



	
}
