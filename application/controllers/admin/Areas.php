<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas extends CI_Controller {
	

	function __construct() {
        parent::__construct();
        // Load facebook library
        $this->load->model('city');   
        $this->load->model('area');    
       
    }


	public function index()
	{	
		$data['title'] = 'Areas';
		$data['areas'] = $this->area->areas();		
		$this->load->view('admins/header');
		$this->load->view('admins/areas/index',$data);
		$this->load->view('admins/footer');
	}

	

	public function create()
	{			

		if ($this->form_validation->run('area') == FALSE)
        {       

            $data['title'] = 'Create Area';	
            $data['cities'] = $this->city->cities();
			$this->load->view('admins/header');
			$this->load->view('admins/areas/create',$data);
			$this->load->view('admins/footer');
        }else{

        	$data['name'] = ucfirst($this->input->post('name'));
        	$data['city_id'] = $this->input->post('city_id');		
        	if($this->area->create($data)){
        		$this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('message', 'Sucessfully Creted..');                
        	}else{
        		$this->session->set_flashdata('type', 'danger');
                $this->session->set_flashdata('message', 'Please try again problem with database connection..');
        	}
        	redirect('admins/areas');
        }
		
	}

	public function edit()
	{	
		if ($this->form_validation->run('area') == FALSE)
        {
			$data['title'] = 'Edit area';
			$id =$this->uri->segment(4);
			if(empty($id)) $id =$this->input->post('id');
			$id = base64_decode($id);		
			$data['area'] = $this->area->area($id);
			$data['cities'] = $this->city->cities();
			$this->load->view('admins/header');
			$this->load->view('admins/areas/edit',$data);
			$this->load->view('admins/footer');
		}else{
			$id =$this->input->post('id');
			$id = base64_decode($id);
			$data['name'] = ucfirst($this->input->post('name'));
			$data['city_id'] = $this->input->post('city_id');
        	if($this->area->update($id,$data)){
        		$this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('message', 'Sucessfully Creted..');                
        	}else{
        		$this->session->set_flashdata('type', 'danger');
                $this->session->set_flashdata('message', 'Please try again problem with database connection..');
        	}
        	redirect('admins/areas');
		}
	}



	public function delete(){
		$id =$this->uri->segment(4);
		$id = base64_decode($id);
		if($this->area->delete($id)){
			$this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('message', 'Sucessfully Deleted..');                
    	}else{
    		$this->session->set_flashdata('type', 'danger');
            $this->session->set_flashdata('message', 'Please try again problem with database connection..');
    	}
    	redirect('admins/areas');
	}


	public  function isunique($name){
		if($this->area->isunique($name)){
			$this->form_validation->set_message('isunique', 'Area Name alredy used..');
			return FALSE;
		}else{
			return TRUE;
		}
	}



	
}
