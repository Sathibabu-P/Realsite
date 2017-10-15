<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('property_type'); 
        $this->load->model('city'); 
        $this->load->model('area');   
        $this->load->model('amenity');   
        //load google login library
        $this->load->library('google');
         // Load facebook library
        $this->load->library('facebook');
       
       
    }

    public function facebook()
    {
    	// Check if user is logged in
		if($this->facebook->is_authenticated()){
			// Get user facebook profile details
			$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];

            // print_r($userData);
            // exit;
			
             //insert or update user data to the database
            $user = $this->user->checkUser($userData);          
            
            //store status & user info in session
            $userdata = array(
    			'userId'    => $user['id'],				       
		        'email'     => $user['email'],
		        'logged_in' => TRUE
			);
			$this->session->set_userdata($userdata);

            if($user['first_login'] == 0){
                redirect('users/changepassword');
            }else{
                redirect('users/profile');
            }
			
			// Get logout URL
			$data['logoutUrl'] = $this->facebook->logout_url();
		}else{
          
			// Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
        }
		
        if(!logged_in()) redirect('users/login');
    }

     public function google(){ 

        // Google Auth
        if (isset($_GET['code'])) {

		    //authenticate user
            $this->google->getAuthenticate();
            
            //get user info from google
            $gpInfo = $this->google->getUserInfo();
            
            //preparing data for database insertion
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid']      = $gpInfo['id'];
            $userData['first_name']     = $gpInfo['given_name'];
            $userData['last_name']      = $gpInfo['family_name'];
            $userData['email']          = $gpInfo['email'];
            $userData['gender']         = !empty($gpInfo['gender'])?$gpInfo['gender']:'';
            $userData['locale']         = !empty($gpInfo['locale'])?$gpInfo['locale']:'';
            $userData['profile_url']    = !empty($gpInfo['link'])?$gpInfo['link']:'';
            $userData['picture_url']    = !empty($gpInfo['picture'])?$gpInfo['picture']:'';
            
            //insert or update user data to the database
            $user = $this->user->checkUser($userData);          
            
            //store status & user info in session
            $userdata = array(
    			'userId'    => $user['id'],				       
		        'email'     => $user['email'],
		        'logged_in' => TRUE
			);
			$this->session->set_userdata($userdata);

			if($user['first_login'] == 0){
				redirect('users/changepassword');
			}else{
				redirect('users/profile');
			}
            
            //redirect to profile page
            
        } 
        //redirect to profile page if user already logged in
        if(!logged_in()) redirect('users/login'); 
    }
	
	public function login()
	{	
		$data['title'] = 'Login Form';	
		$data['google'] = $this->google->loginURL();		
		$data['facebook'] = $this->facebook->login_url();

		if ($this->form_validation->run('user_login') == FALSE)
        {
        	$this->custom_redirect('login',$data);
        }else{
        	$logindata['password'] = md5($this->input->post('password'));	
        		
        	$logindata['email'] = $this->input->post('email');         	
        	if($user = $this->user->user($logindata)){

        		$userdata = array(
        			'userId'    => $user['id'],				       
			        'email'     => $user['email'],
			        'logged_in' => TRUE
				);

				$this->session->set_userdata($userdata);
				$type = 'success';
				$msg  = 'Successfully Login.';
        	} else{
        		$type = 'danger';
				$msg  = 'Invalid Credentials.';
        	}
        	$this->session->set_flashdata('type', $type);
        	$this->session->set_flashdata('message', $msg);
        	if($type == 'danger'){        		
        		$this->custom_redirect('login',$data);
        	}else{
        		redirect('users/dashboard');
        	}
        }
	}


	public function register()
	{	
		$data['title'] = 'Register Form';	
		if ($this->form_validation->run('user_register') == FALSE)
        {
        	$this->custom_redirect('register',$data);
        }else{
        	$userdata = $this->user_data();
        	if($user=$this->user->create($userdata)){

        		$userdata = array(	
        			'userId'    => $user['id'],		       
			        'email'     => $user['email'],
			        'logged_in' => TRUE
				);

				$this->session->set_userdata($userdata);
				$type = 'success';
				$msg  = 'Successfully Registred.';
        	} else{
        		$type = 'danger';
				$msg  = 'Error while saving file info to Database.';
        	}
        	$this->session->set_flashdata('type', $type);
        	$this->session->set_flashdata('message', $msg);
        	if($type == 'danger'){        		
        		$this->custom_redirect('register',$data);
        	}else{
        		redirect('users/dashboard');
        	}
        	
        }
		

	}

	public function dashboard()
	{	
		$data['title'] = 'Login Form';
		if(!logged_in()) redirect('users/login');

		$data['title'] = 'Profile';	
		$data['user'] = current_user($this->session->userdata('userId'));
	    $this->custom_redirect('dashboard',$data);
		
	}

	public function profile()
	{
		$data['title'] = 'Login Form';
		if(!logged_in()) redirect('users/login');

		if ($this->form_validation->run('user_update') == FALSE)
        {	
        	$data['title'] = 'Update Profile';	
        	$data['user'] = current_user($this->session->userdata('userId'));
			$this->custom_redirect('profile',$data);
        }else{

        	$userdata = $this->user_data();
        	if($user=$this->user->update($this->session->userdata('userId'),$userdata)){

        		$config['upload_path']          = 'uploads/users/';
                $config['allowed_types']        = 'jpg|png';
               	$config['max_size'] = '0';
				$config['max_filename'] = '255';
				$config['file_name'] = md5($user['id']);
				$config['overwrite'] = TRUE;
				//$config['encrypt_name'] = TRUE;

				 
				$this->load->library('upload',$config);

				//upload file
	            $is_file_error = FALSE;	          


				if ($this->upload->do_upload('userfile'))               
                {
	                $imagedata = $this->upload->data();	                   
	                $this->user->profile_image($this->session->userdata('userId'),$imagedata);                        
                }



        		$userdata = array(	
        			'userId'    => $user['id'],		       
			        'email'     => $user['email'],
			        'logged_in' => TRUE
				);

				$this->session->set_userdata($userdata);
				$type = 'success';
				$msg  = 'Successfully Updated.';
        	} else{
        		$type = 'danger';
				$msg  = 'Error while saving file info to Database.';
        	}
        	$data['user'] = current_user($this->session->userdata('userId'));
        	$this->session->set_flashdata('type', $type);
        	$this->session->set_flashdata('message', $msg);
        	$this->custom_redirect('profile',$data);
        	


        }

	}

	public function changepassword()
	{
		$data['title'] = 'Change Password';
		if(!logged_in()) redirect('users/login');
		if ($this->form_validation->run('change_password') == FALSE)
        {        	
			$this->custom_redirect('changepassword',$data);
        }else{
        	$userdata['oldpassword'] = md5($this->input->post('oldpassword'));
        	$userdata['newpassword'] = md5($this->input->post('newpassword'));
        	if($user=$this->user->changepassword($this->session->userdata('userId'),$userdata)){
        		$type = 'success';
				$msg  = 'Successfully Updated.';
        	} else{
        		$type = 'danger';
				$msg  = 'Error while saving file info to Database.';
        	}
        	$this->session->set_flashdata('type', $type);
        	$this->session->set_flashdata('message', $msg);
        	$this->custom_redirect('changepassword',$data);	
        }
	}

	public function properties()
	{
		$data['title'] = 'Posted Rooms';
		$data['properties'] = $this->property->properties($this->session->userdata('userId'));	
		if(!logged_in()) redirect('users/login');

		$this->custom_redirect('properties',$data);

	}

	public function property_create()
	{
		
		$data['title'] = 'Create Property';
		if(!logged_in()) redirect('users/login');
		$data['property_types'] = $this->property_type->property_types();
        $data['cities'] = $this->city->cities();
        $data['areas'] = $this->area->areas();
        $data['amenities'] = $this->amenity->amenities();
        if ($this->form_validation->run('property') == FALSE)
        {  
        	$this->custom_redirect('property_create',$data);
        }else{
        	$propertydata = $this->property_data();        	
        	if($property = $this->property->create($propertydata)){
        		if($this->upload_files($property)){
        			$type = 'success';
					$msg  = 'Successfully Created.';
        		}else{
        			$type = 'danger';
					$msg  = 'Error while saving file info to Database.';
        		}        		
        	} else{
        		$type = 'danger';
				$msg  = 'Error while saving file info to Database.';
        	}
        	$this->session->set_flashdata('type', $type);
        	$this->session->set_flashdata('message', $msg);   
        	$data['properties'] = $this->property->properties($this->session->userdata('userId'));   
        	$this->custom_redirect('properties',$data);
        }
	}

	public function property_edit()
	{	
		if(!logged_in()) redirect('users/login');

		$data['title'] = 'Edit Property';
		$data['property_types'] = $this->property_type->property_types();
        $data['cities'] = $this->city->cities();
        $data['areas'] = $this->area->areas();
        $data['amenities'] = $this->amenity->amenities();
		

		if ($this->form_validation->run('property') == FALSE)
        {         
        	$id = base64_decode($this->uri->segment(4));
        	if(!$id) $id = base64_decode($this->input->post('property')); 
        	$data['property'] = $this->property->property($id);
        	$data['property_images'] = $this->property->get_property_images($id);          	
          
        }else{
        	$propertydata = $this->property_data();
        	$id = base64_decode($this->input->post('property')); 

        	if($this->property->update($id,$propertydata)){
        		$property =  $this->property->property($id);
        		if($this->upload_files($property)){
        			$type = 'success';
					$msg  = 'Successfully Updated.';
        		}else{
        			$type = 'danger';
					$msg  = 'Error while saving file info to Database.';
        		}        		
        	} else{
        		$type = 'danger';
				$msg  = 'Error while saving file info to Database.';
        	}
        	$this->session->set_flashdata('type', $type);
        	$this->session->set_flashdata('message', $msg); 
        	$data['property'] = $this->property->property($id); 
        	$data['property_images'] = $this->property->get_property_images($id); 
        }
        $this->custom_redirect('property_edit',$data);
	}


	public function delimg()
	{
		$data['title'] = 'Edit Property';
		$id = $this->uri->segment(5);
		$property_id = base64_decode($this->uri->segment(3));
		$dir_path = 'uploads/properties/';

		if($image = $this->property->get_property_image($id)){

			 $file = $dir_path . $image['file_name'];
	         if (file_exists($file)) {
	            unlink($file);
	         }
	        $this->property->del_property_images($id,$property_id);
	      
		}    
    	$data['property'] = $this->property->property($property_id); 
    	$data['property_images'] = $this->property->get_property_images($property_id); 
    	$data['property_types'] = $this->property_type->property_types();
        $data['cities'] = $this->city->cities();
        $data['areas'] = $this->area->areas();
        $data['amenities'] = $this->amenity->amenities();
    	$this->custom_redirect('property_edit',$data);
	}

	public function logout()
	{	
		 // Remove local Facebook session
         $this->facebook->destroy_session();

		 $this->session->unset_userdata('logged_in'); 
		 $this->session->unset_userdata('email'); 
		 $this->session->set_flashdata('type', 'info');
         $this->session->set_flashdata('message', 'Successfully logout.');   
		 redirect('users');  
	}

	public function isunique($email){		
		if($this->user->isunique($email)){
			$this->form_validation->set_message('isunique', 'Email alredy used..');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function user_data()
	{
		$data['first_name'] = ucfirst($this->input->post('first_name'));
		$data['last_name'] = ucfirst($this->input->post('last_name'));
		$data['email'] = $this->input->post('email');
		$data['gender'] = $this->input->post('gender');
		$data['dob'] = $this->input->post('dob');
		$data['address'] = $this->input->post('address');
		$data['occupation'] = $this->input->post('occupation');
		$data['phone_no'] = $this->input->post('phone_no');
		$data['password'] = md5($this->input->post('password'));		
		return $data;	
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
    	$data['user_id'] = $this->session->userdata('userId');
    	$data['show_email'] = $this->input->post('show_email');
    	$data['show_phoneno'] = $this->input->post('show_phoneno');
    	$data['current_roommates'] = $this->input->post('current_roommates');
    	$data['preferred_gender'] = $this->input->post('preferred_gender');
    	$data['preferred_occupation'] = $this->input->post('preferred_occupation');
    	$data['preferred_age_from'] = $this->input->post('preferred_age_from');
    	$data['show_phoneno'] = $this->input->post('show_phoneno');
    	$data['show_email'] = $this->input->post('show_email');	
    	$data['preferred_age_to'] = $this->input->post('preferred_age_to');		
    	$data['amenities'] =  json_encode(implode(",", $this->input->post('amenities[]'))); 	
    	return $data;
	}

	public function custom_redirect($path,$data=NULL)
	{
		$this->load->view('header');
		$this->load->view('users/'.$path,$data);
		$this->load->view('footer');
	}

	public function upload_files($property)
	{
		if(count($_FILES['userFiles']['name']) > 0){
			$dir_path = 'uploads/properties/';
			$config['upload_path'] = $dir_path;
			$config['allowed_types'] = 'jpg|png';
			$config['max_size'] = '0';
			$config['max_filename'] = '255';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload');

			//upload file
	        $is_file_error = FALSE;

	        for($i=0; $i<count($_FILES['userFiles']['name']); $i++)
	        {           
	            $_FILES['userFile']['name']= $_FILES['userFiles']['name'][$i];
	            $_FILES['userFile']['type']= $_FILES['userFiles']['type'][$i];
	            $_FILES['userFile']['tmp_name']= $_FILES['userFiles']['tmp_name'][$i];
	            $_FILES['userFile']['error']= $_FILES['userFiles']['error'][$i];
	            $_FILES['userFile']['size']= $_FILES['userFiles']['size'][$i];    

	            $this->upload->initialize($config);
	            if (!$this->upload->do_upload('userFile')) {                        
	            	$error = 1;
	        		//$statusMsg = $this->upload->display_errors(); 
	                $is_file_error = TRUE;
	                } else {
	                    $files = $this->upload->data();
	                    $Filedata[$i]['property_id'] = $property['id'];
	                	$Filedata[$i]['file_name'] = $files['file_name'];                	
	                }
	        }


	        if ($is_file_error && empty($Filedata)) {
	            for ($i = 0; $i < count($Filedata); $i++) {
	                $file = $dir_path . $Filedata[$i]['file_name'];
	                if (file_exists($file)) {
	                    unlink($file);
	                }
	            }
	            //DELETE INSERT RECORD
	            //$this->property->delete($property['id']);
	        } else if(!empty($Filedata)){
	        	$resp = $this->property->property_images($Filedata);
	        	if ($resp === TRUE) {	                   
	                $error = 0;               
	            } else {
	                for ($i = 0; $i < count($files); $i++) {
	                    $file = $dir_path . $files[$i]['file_name'];
	                    if (file_exists($file)) {
	                        unlink($file);
	                    }
	                }	                  
	                $error = 1;               
	                //DELETE INSERT RECORD
	                //$this->property->delete($property['id']);
	            }
	        }
	        if($error == 1) return FALSE;
	        return TRUE;
	    }
	}

	
}
