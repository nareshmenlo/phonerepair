<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Brands extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!is_loggedIn()) {
            redirect('admin/login');
        }
        $this->load->model('brands_model');
    }

    public function index() {
        $data['brands'] = $this->brands_model->get_all();
        $this->load->view('admin/header');
        $this->load->view('admin/brands', $data);
        $this->load->view('admin/footer');
    }

    function get_single_brand($id){
        if($id==0){
            redirect('brands');
        }
        $postdata=$this->brands_model->get_single_brand($id);
        if($postdata==NULL){
            $this->session->set_flashdata('error', 'Sorry some thing went wrong...(selected brand is not available)!');             
            redirect('brands');
        }else{
            return $postdata;
        }
    }

    public function create() {
        $res['error']=false;
        if($this->input->post()){
            $post_insert_data=[
                'brand_name'=>$this->input->post('brand_name'),
                'is_active'=>0
            ];   
            $this->brands_model->insert_entry($post_insert_data);
            $res['message']="New brand has been added successfully please make active to display...!";
        }else{
            $res['error']=true;
        }
        echo json_encode($res);
    }
    
    public function update() {
        $res['error']=false;
        if($this->input->post()){
            $post_insert_data=[
                'brand_name'=>$this->input->post('brand_name'),
            ];   
            $this->brands_model->update_entry($post_insert_data,$this->input->post('brand_id'));
            $res['message']="New brand has been added successfully please make active to display...!";
        }else{
            $res['error']=true;
        }
        echo json_encode($res);
    }


    public function make_active_not() {
        if($this->input->post('brand_id')){
            $status=$this->input->post('is_active')==1?0:1;
            echo json_encode(['brand_id'=>$this->input->post('brand_id'),'success'=>((int)$this->brands_model->update_status($status,$this->input->post('brand_id')))]);
            die();
        }
    } 

    public function delete_brand() {
        if($this->input->post('brand_id')){
            $postdata=$this->get_single_brand($this->input->post('brand_id'));
            if(is_object($postdata)){
                $res=json_encode(['success'=>((int)$this->brands_model->delete_brand($this->input->post('brand_id')))]);
                $this->session->set_flashdata('success', 'brand deleted successfully');             
                echo $res;
            }
        }
    }

}
