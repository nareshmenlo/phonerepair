<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Models extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!is_loggedIn()) {
            redirect('admin/login');
        }
        $this->load->model('models_model');
        $this->load->model('brands_model');
    }

    public function index() {
        $data['models'] = $this->models_model->get_all_with_brand();
        $this->load->view('admin/header');
        $this->load->view('admin/models', $data);
        $this->load->view('admin/footer');
    }

    function get_single_model($id){
        if($id==0){
            redirect('models');
        }
        $postdata=$this->models_model->get_single_model($id);
        if($postdata==NULL){
            $this->session->set_flashdata('error', 'Sorry some thing went wrong...(selected model is not available)!');             
            redirect('models');
        }else{
            return $postdata;
        }
    }

    function do_upload($fieldname)
    {
        $config['upload_path'] = './useruploadfiles/modelimages';
        $config['allowed_types'] = 'gif|jpg|png';
         $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload($fieldname)){
            $result = array('error' =>true,'data'=>$this->upload->display_errors());
            return $result;
        }else{
            $result = array('error' =>false,'data'=>$this->upload->data());
            return $result;
        }
    }

    public function create() {
        $data['brands'] = $this->brands_model->get_all();
        if($this->input->post()){
            $this->form_validation->set_rules('brand_id', 'Brand Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('model_name', 'Model Name', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/header');
                $this->load->view('admin/modelcreate',$data);
                $this->load->view('admin/footer');
            } else {
            	$upload_image_name="";
                $upload_file_res=$this->do_upload('modelimage');
                if(is_array($upload_file_res)){
                    if(!$upload_file_res['error']){
                        $upload_image_name=$upload_file_res['data']['file_name'];
                    }
                }
                $post_insert_data=[
                    'model_name'=>$this->input->post('model_name'),
                    'model_url'=>$upload_image_name,
                    'brand_id'=>$this->input->post('brand_id'),
                    'is_active'=>0
                ];   
                $this->models_model->insert_entry($post_insert_data);
                $this->session->set_flashdata('success', 'New model has been added successfully please make active to display...!');
                redirect('models');   
            } 
        }else{
            $this->load->view('admin/header');
            $this->load->view('admin/modelcreate',$data);
            $this->load->view('admin/footer');
        }
    }

    public function update($id) {
        $data['id'] = $id;
        $data['brands'] = $this->brands_model->get_all();
        $data['model_data'] = $this->get_single_model($id);
        if($this->input->post()){
            $this->form_validation->set_rules('brand_id', 'Brand Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('model_name', 'Model Name', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/header');
                $this->load->view('admin/modelupdate',$data);
                $this->load->view('admin/footer');
            } else {
                $upload_image_name=$data['postdata']->image;
                $upload_file_res=$this->do_upload('postimage');
                if(is_array($upload_file_res)){
                    if(!$upload_file_res['error']){
                        $upload_image_name=$upload_file_res['data']['file_name'];
                    }
                }
                $post_updated_data=[
                    'model_name'=>$this->input->post('model_name'),
                    'brand_id'=>$this->input->post('brand_id'),
                ];
                if($upload_image_name!=""){
                    $post_updated_data['model_url'] = $upload_image_name;
                }
                $this->models_model->update_entry($post_updated_data,$id);
                $this->session->set_flashdata('success', 'Model updated successfully..!');             
                redirect('models');     
            }
        }else{
            $this->load->view('admin/header');
            $this->load->view('admin/modelupdate',$data);
            $this->load->view('admin/footer');
        }
    }

    
    /*public function update() {
        $res['error']=false;
        if($this->input->post()){
            $post_insert_data=[
                'model_name'=>$this->input->post('model_name'),
            ];   
            $this->models_model->update_entry($post_insert_data,$this->input->post('model_id'));
            $res['message']="New model has been added successfully please make active to display...!";
        }else{
            $res['error']=true;
        }
        echo json_encode($res);
    }*/


    public function make_active_not() {
        if($this->input->post('model_id')){
            $status=$this->input->post('is_active')==1?0:1;
            echo json_encode(['model_id'=>$this->input->post('model_id'),'success'=>((int)$this->models_model->update_status($status,$this->input->post('model_id')))]);
            die();
        }
    } 

    public function delete_model() {
        if($this->input->post('model_id')){
            $postdata=$this->get_single_model($this->input->post('model_id'));
            if(is_object($postdata)){
                $res=json_encode(['success'=>((int)$this->models_model->delete_model($this->input->post('model_id')))]);
                $this->session->set_flashdata('success', 'model deleted successfully');             
                echo $res;
            }
        }
    }

}
