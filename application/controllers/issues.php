<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class issues extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!is_loggedIn()) {
            redirect('admin/login');
        }
        $this->load->model('issues_model');
        $this->load->model('brands_model');
    }

    public function index() {
        $data['issues'] = $this->issues_model->get_all();
        $this->load->view('admin/header');
        $this->load->view('admin/issues', $data);
        $this->load->view('admin/footer');
    }

    function get_single_model($id){
        if($id==0){
            redirect('issues');
        }
        $postdata=$this->issues_model->get_single_model($id);
        if($postdata==NULL){
            $this->session->set_flashdata('error', 'Sorry some thing went wrong...(selected issue is not available)!');             
            redirect('issues');
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
            $this->form_validation->set_rules('model_id', 'Model Name', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/header');
                $this->load->view('admin/issuecreate',$data);
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
                $this->issues_model->insert_entry($post_insert_data);
                $this->session->set_flashdata('success', 'New model has been added successfully please make active to display...!');
                redirect('issues');   
            } 
        }else{
            $this->load->view('admin/header');
            $this->load->view('admin/issuecreate',$data);
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
                $this->load->view('admin/issueupdate',$data);
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
                $this->issues_model->update_entry($post_updated_data,$id);
                $this->session->set_flashdata('success', 'Model updated successfully..!');             
                redirect('issues');     
            }
        }else{
            $this->load->view('admin/header');
            $this->load->view('admin/issueupdate',$data);
            $this->load->view('admin/footer');
        }
    }

    public function make_active_not() {
        if($this->input->post('issue_id')){
            $status=$this->input->post('is_active')==1?0:1;
            echo json_encode(['issue_id'=>$this->input->post('issue_id'),'success'=>((int)$this->issues_model->update_status($status,$this->input->post('issue_id')))]);
            die();
        }
    } 

    public function delete_model() {
        if($this->input->post('issue_id')){
            $postdata=$this->get_single_model($this->input->post('issue_id'));
            if(is_object($postdata)){
                $res=json_encode(['success'=>((int)$this->issues_model->delete_model($this->input->post('issue_id')))]);
                $this->session->set_flashdata('success', 'Issue deleted successfully');             
                echo $res;
            }
        }
    }

}
