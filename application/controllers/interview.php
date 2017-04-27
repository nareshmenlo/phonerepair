<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class interview extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

	public function index($page=1)
	{
		$this->load->model('home_model');
		$this->load->library('pagination');
		$this->load->library('paginationlib');
		try
		{
			$pagingConfig   = $this->paginationlib->initPagination("interview/index",$this->home_model->get_count_pagename('interview'),19,3);
 			$data["pagination_helper"]   = $this->pagination;
			$data["interview"] = $this->home_model->get_by_pagename_range('interview',(($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
			$title['title'] = "ఇంటర్వ్యూ";
	
  			$this->load->view('header',$title);
			$this->load->view('interview',$data);
			$this->load->view('sidebar',$data);
			$this->load->view('footer');
		}
		catch (Exception $err)
		{
			log_message("error", $err->getMessage());
			return show_error($err->getMessage());
		}
		
	}
	public function single($id)
	{
		$this->load->model('home_model');
		$data['id']=$id;
		$data['interview'] = $this->home_model->getAll("interview");
		
		$data['interviewById'] = $this->home_model->getPostById($id,"interview");
		$title['articleimage'] = $data['interviewById'][0]->image;
		$title['description'] = substr(strip_tags($data['interviewById'][0]->description),0,800);
		$title['title'] = $data['interviewById'][0]->title;
		$this->load->view('header',$title);
		$this->load->view('interviewsingle',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('footer');
	}
}
