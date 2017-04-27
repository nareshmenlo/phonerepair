<?php

class brands_model extends CI_Model {
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all()
    {
        $this->db->order_by('brand_id','desc');
        $query = $this->db->get('brands');
        return $query->result_array();
    }

    function getHeaderbrands()
    {
        $this->db->where('is_active = 1');
        $this->db->order_by('brand_id','desc');
        $this->db->limit(10);
        $query = $this->db->get('brands');
        return $query->result_array();
    }

    function get_single_brand($id)
    {
        $this->db->where('brand_id', $id);
        $query=$this->db->get('brands');
        return array_shift($query->result());
    }
    
    function insert_entry($data)
    {
        return $this->db->insert('brands', $data);
    }

    function update_status($status,$id)
    {
        $this->db->update('brands',['is_active'=>$status], array('brand_id' => $id));
        
        return ($this->db->affected_rows() > 0)?1:0;          
    }

    function delete_brand($id)
    {
        $this->db->delete('brands', array('brand_id' => $id));
        return ($this->db->affected_rows() > 0)?1:0;          
    }

    function update_entry($data,$id)
    {
        $this->db->update('brands', $data, ['brand_id' => $id]);
    }

}
