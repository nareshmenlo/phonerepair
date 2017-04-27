<?php

class issues_model extends CI_Model {
    
    function __construct()
    {
        // Call the issue constructor
        parent::__construct();
    }
    
    function get_all()
    {
        $this->db->order_by('issue_id','desc');
        $query = $this->db->get('issues');
        return $query->result_array();
    }

    function getHeaderissues()
    {
        $this->db->where('is_active = 1');
        $this->db->order_by('issue_id','desc');
        $this->db->limit(10);
        $query = $this->db->get('issues');
        return $query->result_array();
    }

    function get_single_issue($id)
    {
        $this->db->where('issue_id', $id);
        $query=$this->db->get('issues');
        return array_shift($query->result());
    }
    
    function insert_entry($data)
    {
        return $this->db->insert('issues', $data);
    }

    function update_status($status,$id)
    {
        $this->db->update('issues',['is_active'=>$status], array('issue_id' => $id));
        
        return ($this->db->affected_rows() > 0)?1:0;          
    }

    function delete_issue($id)
    {
        $this->db->delete('issues', array('issue_id' => $id));
        return ($this->db->affected_rows() > 0)?1:0;          
    }

    function update_entry($data,$id)
    {
        $this->db->update('issues', $data, ['issue_id' => $id]);
    }

}
