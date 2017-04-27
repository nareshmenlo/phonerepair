<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Home extends CI_Controller {

    public function index()
    {
        $title['title'] = "Phone Repairs";
        $this->load->view('header',$title);
        $this->load->view('home');
        $this->load->view('footer');
    }

    public function contactus(){
        $title['title'] = "Phone Repairs | Contact Us";
        $this->load->view('header',$title);
        $this->load->view('contactus');
        $this->load->view('sidebar');
        $this->load->view('footer');    
    }
}
