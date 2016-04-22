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

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
	}

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
		$data['member_info']=$result;

		if(!empty($data['member_info'])&&$data['member_info']['is_super']==1)
		{
			$_SESSION['is_login']=1;
			$_SESSION['member_id']=$data['member_info']['member_id'];
			$_SESSION['member_name']=$data['member_info']['name'];

			$member_list=$this->member_model->getMemberList();
			$data=array();
			$data['member_list']=$member_list;

			$this->load->view('templates/header_admin',$data);
			$this->load->view('member_index_admin',$data);
		}
		elseif(!empty($data['member_info'])&&$data['member_info']['is_super']==0)
		{
			$_SESSION['is_login']=1;
			$_SESSION['member_id']=$data['member_info']['member_id'];
			$_SESSION['member_name']=$data['member_info']['name'];

			$this->load->view('home/templates/header',$data);
			$this->load->view('home/member.index',$data);
		}
		else
		{
			$this->load->view('errors/error.php',$data);
		}

	}
}
