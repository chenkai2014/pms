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

	//用户注册
    public function register()
	{

	}

	//用户登出
	public function logout()
	{
       unset($_SESSION['member_id']);
	   unset($_SESSION['member_name']);
	   unset($_SESSION['is_login']);

	   header('Location:http://localhost/index.php/Welcome/index');
	}

	//用户登录
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
			//将用户信息放入Session
			$_SESSION['is_login']=1;
			$_SESSION['member_id']=$data['member_info'][0]['member_id'];
			$_SESSION['member_name']=$data['member_info'][0]['name'];

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
