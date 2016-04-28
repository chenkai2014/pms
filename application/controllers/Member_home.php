<?php
class Member_home extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index(){
        $this->load->model('member_model');
        $member_id=$this->session->userdata('member_id');
        $member_info=$this->member_model->getMemberDetailInfoById($member_id);
        $data=array();
        $data['member_info']=$member_info;

        $this->load->view('templates/header_home',$data);
        $this->load->view('member_index_home',$data);
    }


    public function save(){
        $this->load->model('member_model');

        $data=array();
        $data['house_name']=$_POST['house_name'];
        $data['username']=$_POST['username'];
        $data['password']=$_POST['password'];
        $data['name']=$_POST['name'];
        $data['mobile']=$_POST['mobile'];
        $data['building_num']=$_POST['building_num'];
        $data['address_detail']=$_POST['address_detail'];
        $result=$this->member_model->addMember($data);
        if($result){
            $this->index();
        }
        else {
            $this->load->view('errors/error');
        }
    }



    public function showEdit(){
        $this->load->model('member_model');
        $member_info=$this->member_model->getMember (array('member_id'=>$_GET['member_id']));
        $data['member_info']=$member_info;

        $this->load->view('member_edit_admin',$data);
    }

    public function edit(){
        $this->load->model('member_model');
        $condition=array();
        $condition['member_id']=$_GET['member_id'];

        $data=array();
        $data['house_name']=$_GET['house_name'];
        $data['username']=$_GET['username'];
        $data['password']=$_GET['password'];
        $data['name']=$_GET['name'];
        $data['mobile']=$_GET['mobile'];
        $data['building_num']=$_GET['building_num'];
        $data['address_detail']=$_GET['address_detail'];

        $result=$this->member_model->editMember($data,$condition);
        if($result){
            //$this->index();
            redirect('http://localhost/index.php/member_admin/index');
        }
        else{
            show_404();
        }


    }


}