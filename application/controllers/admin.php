<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		if(!is_loggedIn()){
			redirect(site_url('admin/login'));
		}else{
			redirect('dashboard');
		}
	}

	public function login()
	{
		$this->load->view('admin/login');
	}

	// Check for user login process
	public function do_login() {
		
		$this->form_validation->set_rules('name', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('pwd', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['is_logged_in'])){
				redirect('dashboard');
			}else{
				redirect('admin/login');
			}
		} else {
			$data = array(
				'username' => $this->input->post('name'),
				'password' => $this->input->post('pwd')
			);
			$this->load->model('login_model');
			$result = $this->login_model->login($data);
			if ($result != false) {
					$session_data = array(
						'username' => $result[0]->username,
						'first_name' => $result[0]->first_name,
						'last_name' => $result[0]->last_name,
						'id' => $result[0]->id,
						'user_type' => $result[0]->user_type,
						'status' => $result[0]->status
					);
					// Add user data in session
					$this->session->set_userdata('is_logged_in', 1);
					$this->session->set_userdata('userdata', $session_data);
					redirect('dashboard');
			} else {
				$data = array(
				'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('admin/login', $data);
			}
		}
	}

	function logout()
{
    $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
    $this->session->sess_destroy();
    redirect('admin/login');
}
}