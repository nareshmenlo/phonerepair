<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cms extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!is_loggedIn()) {
            redirect('admin/login');
        }
        $this->load->model('posts_model');
    }

    public function index($page=1) {

        try
        {
            $pagingConfig   = $this->paginationlib->initPagination("cms/index",$this->posts_model->get_posts_count(),20,3);
            $data["pagination_helper"]   = $this->pagination;
            $data["posts"] = $this->posts_model->get_posts_by_range((($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
            $this->load->view('admin/header');
            $this->load->view('admin/cms', $data);
            $this->load->view('admin/footer');
        }
        catch (Exception $err)
        {
            log_message("error", $err->getMessage());
            return show_error($err->getMessage());
        }
        
    }

    public function create() {
        if($this->input->post()){
            $this->form_validation->set_rules('post_title', 'Title', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/header');
                $this->load->view('admin/newpost');
                $this->load->view('admin/footer');
            } else {
                $upload_image_name="";
                $upload_file_res=$this->do_upload('postimage');
                if(is_array($upload_file_res)){
                    if(!$upload_file_res['error']){
                        $upload_image_name=$upload_file_res['data']['file_name'];
                    }
                }
                $pagenames=$this->input->post('pagename');
                //var_dump($pagenames);exit;
                $youtubeid="";
                if($this->input->post('youtubeurl')!=""){
                    $url = parse_url($this->input->post('youtubeurl'));
                    if(isset($url['query'])){
                        parse_str($url['query'], $query);
                        $youtubeid = isset($query['v'])?$query['v']:"";
                    }
                }
                if($pagenames){
                    foreach ($pagenames as $key => $singlepagename) {
                        $post_insert_data=[
                            'pagename'=>$singlepagename,
                            'title'=>$this->input->post('post_title'),
                            'description'=>$this->input->post('editor1'),
                            'image'=>$upload_image_name,
                            'video'=>$youtubeid,
                            'full_video_url'=>$this->input->post('youtubeurl'),
                            'date'=>date('Y-m-d'),
                            'status'=>'Not Active',
                        ];  
                        if($key==0 && $this->input->post('isbanner')){
                            $this->createBanner($post_insert_data);
                        }
                        if($key==0 && $this->input->post('district')!=""){
                            $dist_post_insert_data=$post_insert_data;
                            $dist_post_insert_data['district']=$this->input->post('district');
                            $dist_post_insert_data['pagename']="district";
                            $this->posts_model->insert_entry($dist_post_insert_data);
                        }
                        $this->posts_model->insert_entry($post_insert_data);
                    }
                }else if($this->input->post('district')!=""){
                    $post_insert_data=[
                        'pagename'=>"district",
                        'title'=>$this->input->post('post_title'),
                        'description'=>$this->input->post('editor1'),
                        'district'=>$this->input->post('district'),
                        'image'=>$upload_image_name,
                        'video'=>$youtubeid,
                        'full_video_url'=>$this->input->post('youtubeurl'),
                        'date'=>date('Y-m-d'),
                        'status'=>'Not Active',
                    ];
                    $this->posts_model->insert_entry($post_insert_data);
                }
                $this->session->set_flashdata('success', 'New posts are created successfully please make active...!');             
                redirect('cms');     
            }
        }else{
            $this->load->view('admin/header');
            $this->load->view('admin/newpost');
            $this->load->view('admin/footer');
        }
    }

    function do_upload($fieldname)
    {
        $config['upload_path'] = './useruploadfiles/postimages';
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

    public function make_active_not() {
        if($this->input->post('postid')){
            $status=$this->input->post('status')=="Active"?"Deactive":"Active";
            echo json_encode(['postid'=>$this->input->post('postid'),'success'=>((int)$this->posts_model->update_status($status,$this->input->post('postid')))]);
            die();
        }
    }

    public function update($id) {
        $data['postdata']=$this->get_single_post($id);
        if($this->input->post()){
            $this->form_validation->set_rules('pagename', 'Category', 'trim|required|xss_clean');
            $this->form_validation->set_rules('post_title', 'Title', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/header');
                $this->load->view('admin/editpost',$data);
                $this->load->view('admin/footer');
            } else {
                $upload_image_name=$data['postdata']->image;
                $upload_file_res=$this->do_upload('postimage');
                if(is_array($upload_file_res)){
                    if(!$upload_file_res['error']){
                        $upload_image_name=$upload_file_res['data']['file_name'];
                    }
                }
                $pagenames=$this->input->post('pagename');
                $url = parse_url($this->input->post('youtubeurl'));
                parse_str($url['query'], $query);
                $youtubeid = isset($query['v'])?$query['v']:"";
                $post_updated_data=[
                    'pagename'=>$this->input->post('pagename'),
                    'title'=>$this->input->post('post_title'),
                    'description'=>$this->input->post('editor1'),
                    'image'=>$upload_image_name,
                    'video'=>$youtubeid,
                    'full_video_url'=>$this->input->post('youtubeurl')
                ];
                if($this->input->post('district')!=""){
                    $post_updated_data['district']=$this->input->post('district');
                    $post_updated_data['pagename']="district";
                }
                $this->posts_model->update_entry($post_updated_data,$id);
                $this->session->set_flashdata('success', 'Post updated successfully..!');             
                redirect('cms');     
            }
        }else{
            $this->load->view('admin/header');
            $this->load->view('admin/editpost',$data);
            $this->load->view('admin/footer');
        }
    }

    public function delete_post() {
        if($this->input->post('postid')){
            $postdata=$this->get_single_post($this->input->post('postid'));
            if(is_object($postdata)){
                $res=json_encode(['success'=>((int)$this->posts_model->delete_post($this->input->post('postid')))]);
                $this->session->set_flashdata('success', 'Post deleted successfully');             
                echo $res;
            }
        }
    }

}
