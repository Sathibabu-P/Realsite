<?php
class User extends CI_Model {

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private $tableName = 'users';
    private $primaryKey = 'id';


     public function checkUser($data = array()){
        $this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        $this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
        $query = $this->db->get();
        $check = $query->num_rows();
        
        if($check > 0){
            $result = $query->row_array();
            $data['modified_at'] = date("Y-m-d H:i:s");
            $update = $this->db->update($this->tableName,$data,array('id'=>$result['id']));
            $userID = $result['id'];
            $query = $this->db->get_where($this->tableName,array('id' => $userID));
            $result =  $query->row_array();
        }else{
            $data['created_at'] = date("Y-m-d H:i:s");
            $data['modified_at']= date("Y-m-d H:i:s");
            $insert = $this->db->insert($this->tableName,$data);
            $userID = $this->db->insert_id();
            $query = $this->db->get_where($this->tableName,array('id' => $userID));
            $result = $query->row_array();
        }

         return $result?$result:false;
    }



    public function create($data){   
        $data['created_at'] =  date("Y-m-d H:i:s"); 
    	if ($this->db->insert($this->tableName, $data)) {        	
        	$query = $this->db->get_where($this->tableName,array('id' => $this->db->insert_id()));
            return $query->row_array();
            //return true;
        }
        return false;
    }

    public function update($id, $data){
        $data['updated_at'] =  date("Y-m-d H:i:s");
        $this->db->where('id', $id);
        $this->db->update($this->tableName, $data);
         if ($this->db->affected_rows() > 0) {
           // return TRUE;
            $query = $this->db->get_where($this->tableName,array('id' => $id));
            return $query->row_array();

        }
        return FALSE;      
    }


    public function changepassword($id, $data){       
        $this->db->where('id', $id);
        $this->db->where('password', $data['oldpassword']);
        $query = $this->db->get($this->tableName);

        if ($query->num_rows() == 1){                   
            $this->db->set('password', $data['newpassword']);
            $this->db->set('updated_at', date("Y-m-d H:i:s"));
            $this->db->where('id', $id);
            $this->db->update($this->tableName);
            if ($this->db->affected_rows() > 0)  return TRUE;
            return FALSE;
        } 
        return FALSE; 
    }


    public function user($data){
    	$this->db->where('email =',$data['email']);
    	$this->db->where('password =',$data['password']);
    	$query = $this->db->get($this->tableName);
        if ($query->num_rows() == 1){
        	
        	$row = $query->row_array();
        	// update last login
        	$this->last_login($row['id']);

        	return $row;
        } 
        return NULL;
    }

    public function get_user($id)
    {
        $this->db->where('id =',$id);     
        $query = $this->db->get($this->tableName);
        if ($query->num_rows() == 1){            
            $row = $query->row_array(); 
            return $row;
        } 
        return NULL;
    }


    public function isunique($email)    {
    	$this->db->where('email =', $email);
        $this->db->where('id !=', $this->session->userdata('userId'));
    	$query = $this->db->get($this->tableName);
    	if ($query->num_rows() > 0) return true;
        return false;
    }

    public function last_login($id){
    	$this->db->set('last_login', date("Y-m-d H:i:s"));
    	$this->db->where('id', $id);
        $this->db->update($this->tableName);
    }

    public function profile_image($id,$data){
        $this->db->set('profile_image', $data['file_name']);
        $this->db->where('id', $id);
        $this->db->update($this->tableName);
    }

    
}