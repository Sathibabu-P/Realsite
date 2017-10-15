<?php
class Property extends CI_Model {

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private $tableName = 'properties';


    public function record_count($search) {
        if($search['city_id'] > 0){
            $this->db->where('city_id =',$search['city_id']);          
        }
        if($search['area_id'] > 0){
            $this->db->where('area_id =',$search['area_id']);          
        }
        if($search['property_type_id'] > 0){
            $this->db->where('property_type_id =',$search['property_type_id']);          
        }
       
        return $this->db->count_all_results($this->tableName);
    }


    public function properties_all($limit,$start,$search){
        $this->db->select('properties.*,cities.name as city_name,areas.name as area_name, property_types.name as  property_type');
        $this->db->from($this->tableName);
        $this->db->join('cities', 'cities.id = properties.city_id');
        $this->db->join('areas', 'areas.id = properties.area_id');
        $this->db->join('property_types', 'property_types.id = properties.property_type_id');    
        // $this->db->join('property_images', 'property_images.property_id = properties.id');  
        if($search['city_id'] > 0){
            $this->db->where('properties.city_id =',$search['city_id']);          
        }
        if($search['area_id'] > 0){
            $this->db->where('properties.area_id =',$search['area_id']);          
        }
        if($search['property_type_id'] > 0){
            $this->db->where('properties.property_type_id =',$search['property_type_id']);          
        }

        $this->db->limit($limit,$start); 
        $query = $this->db->get();       
         if ($query->num_rows() > 0) return $query->result_array();
        return NULL;
    }

    public function properties($user){
        $this->db->select('properties.*,cities.name as city_name,areas.name as area_name, property_types.name as  property_type');
        $this->db->from($this->tableName);
        $this->db->join('cities', 'cities.id = properties.city_id');
        $this->db->join('areas', 'areas.id = properties.area_id');
        $this->db->join('property_types', 'property_types.id = properties.property_type_id');
        $this->db->where('properties.user_id =',$user);
        $query = $this->db->get();       
         if ($query->num_rows() > 0) return $query->result_array();
        return NULL;
    }

    public function property($id)
    {
        $this->db->select('properties.*,cities.id as city_id,areas.name as area_name,areas.id as area_id, property_types.id as  property_type_id');
        $this->db->from($this->tableName);
        $this->db->join('cities', 'cities.id = properties.city_id');
        $this->db->join('areas', 'areas.id = properties.area_id');
        $this->db->join('property_types', 'property_types.id = properties.property_type_id');
        $this->db->where('properties.id =',$id);
        $query = $this->db->get();       
        if ($query->num_rows() == 1) return $query->row_array();
        return NULL;
    }

    public function get_property($id)
    {
        $this->db->select('properties.*,cities.name as city_name,areas.name as area_name, property_types.name as  property_type');       
        $this->db->from($this->tableName);
        $this->db->join('cities', 'cities.id = properties.city_id');
        $this->db->join('areas', 'areas.id = properties.area_id');
        $this->db->join('property_types', 'property_types.id = properties.property_type_id');
        $this->db->where('properties.id =',$id);
        $query = $this->db->get();       
        if ($query->num_rows() == 1) return $query->row_array();
        return NULL;
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
    public function update($id,$data){
        $data['updated_at'] =  date("Y-m-d H:i:s");
        $this->db->where('id', $id);
        $this->db->where('user_id', $data['user_id']);
        $this->db->update($this->tableName, $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;    
    }

    public function property_images($data = array())
    {
        $insert = $this->db->insert_batch('property_images',$data);
        return $insert?true:false;
    }

    public function get_property_images($property_id) //get by property_id
    {
        $this->db->where('property_id', $property_id);
        $query = $this->db->get('property_images');
        if ($query->num_rows() > 0) return $query->result_array();
        return NULL;
    }

    public function get_property_image($id) //get by id
    {
        $this->db->where('id', $id);
        $query = $this->db->get('property_images');
        if ($query->num_rows() == 1) return $query->row_array();
        return NULL;
    }

    public function get_avg_rating($property_id)
    {
       $this->db->select('SUM(rating) as rating, COUNT(*) as total');
       $this->db->where('property_id', $property_id);
       $this->db->from('property_reviews');
        $query = $this->db->get();       
        if ($query->num_rows() > 0) return $query->row_array();
        return NULL;
    }


    public function del_property_images($id,$property_id)
    {
        $this->db->where('id', $id);
        $this->db->where('property_id', $property_id);
        $this->db->delete('property_images');
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }


    public function insert_property_enquires($data)
    {
        $data['created_at'] =  date("Y-m-d H:i:s");      
        if ($this->db->insert('property_enquires', $data)) {           
            // $query = $this->db->get_where('property_enquires',array('id' => $this->db->insert_id()));
            // return $query->row_array();
            return true;
        }
        return false;
    }

    public function insert_property_reviews($data)
    {
        $data['created_at'] =  date("Y-m-d H:i:s");      
        if ($this->db->insert('property_reviews', $data)) {           
            // $query = $this->db->get_where('property_enquires',array('id' => $this->db->insert_id()));
            // return $query->row_array();
            return true;
        }
        return false;
    }


    public function unique_review($mail)
    {
        $property_id = base64_decode($this->input->post('property_id'));
        $this->db->where('property_id',$property_id);
        $this->db->where('email',$mail);
        $query = $this->db->get('property_reviews');        
        if ($query->num_rows() > 0) return true;
        return FALSE;
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tableName);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }
}