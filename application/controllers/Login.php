<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if (isset($this->session->userdata['logged_in'])) 
		{
			redirect('/home', 'refresh');
		}
		
		$this->load->view('login_view');
	}

	public function verify()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) 
		{
			$data['error_msg'] = 'Username and Password both required.';
			$this->load->view('login_view',$data);
		} 
		else 
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if($username == 'admin' && $password == 'admin')
			{
				$session_data = array(
								'username' => $username
								);
				// Add user data in session
				$this->session->set_userdata('logged_in', $session_data);

				redirect('/home', 'refresh');
			}
			else
			{
				$data['error_msg'] = 'Username or Password not correct.';

				$this->load->view('login_view',$data);
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		redirect('/login', 'refresh');
	}
}
