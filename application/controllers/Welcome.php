<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login()
	{
        $username=$_POST['username'];
		$password=$_POST['password'];

		//获取用户信息
		$this->load->model('member_model');
		$result=$this->member_model->getMemberInfo($username,$password);
		$data['member_info']=$result->result_array();

		if(count($data['member_info'])==1)
		{
			//将用户ID放入Session
			$_SESSION['member_id']=$data['member_info'][0]['member_id'];

			$this->load->view('templates/header',$data);
			$this->load->view('member_home',$data);
			$this->load->view('templates/footer',$data);
		}
		else
		{
			$this->load->view('errors/error.php',$data);
		}

	}
}
