<?php

class models_model extends CI_Model {
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all()
    {
        $this->db->order_by('model_id','desc');
        $query = $this->db->get('models');
        return $query->result_array();
    }

    function get_all_with_brand()
    {
        $this->db->select('models.*, brands.brand_name')
         ->from('models')
         ->join('brands', 'models.brand_id = brands.brand_id');
        return $this->db->get()->result_array();
    }

    function getHeadermodels()
    {
        $this->db->where('is_active = 1');
        $this->db->order_by('model_id','desc');
        $this->db->limit(10);
        $query = $this->db->get('models');
        return $query->result_array();
    }

    function get_single_model($id)
    {
        $this->db->where('model_id', $id);
        $query=$this->db->get('models');
        return array_shift($query->result());
    }
    
    function insert_entry($data)
    {
        return $this->db->insert('models', $data);
    }

    function update_status($status,$id)
    {
        $this->db->update('models',['is_active'=>$status], array('model_id' => $id));
        
        return ($this->db->affected_rows() > 0)?1:0;          
    }

    function delete_model($id)
    {
        $this->db->delete('models', array('model_id' => $id));
        return ($this->db->affected_rows() > 0)?1:0;          
    }

    function update_entry($data,$id)
    {
        $this->db->update('models', $data, ['model_id' => $id]);
    }

}
