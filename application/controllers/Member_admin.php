<?php
class Member_admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index(){
        $this->load->model('member_model');
        $condition=array();
        if(!empty($_GET['username'])){
          $condition['username']=$_GET['username'];
        }
        if(!empty($_GET['name'])){
          $condition['name']=$_GET['name'];
        }
        $member_list=$this->member_model->getMemberList($condition);

        $data=array();
        $data['member_list']=$member_list;

        $this->load->view('templates/header_admin',$data);
        $this->load->view('member_index_admin',$data);
    }


    public function add(){
        $this->load->view('templates/header_admin');
        $this->load->view('member_add_admin');
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

    public function delete(){
        $this->load->model('member_model');
        $condition=array();
        $condition['member_id']=$_GET['member_id'];

        $result=$this->member_model->deleteMember($condition);
        if($result){
            $this->index();
        }
        else{
            $this->load->view('errors/error');
        }

    }

    public function showEdit(){
        $this->load->model('member_model');
        $member_info=$this->member_model->getMember (array('member_id'=>$_GET['member_id']));
        $data['member_info']=$member_info;

        $this->load->view('templates/header_admin',$data);
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
            redirect('http://localhost/index.php/member_admin/index');
        }
        else{
            show_404();
        }
    }

}