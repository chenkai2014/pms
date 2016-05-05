<?php
class Complain_admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    //投诉记录详情
    public function index(){
        $this->load->model('complain_model');
        $this->load->model('member_model');

        $condition=array();
        if(!empty($_GET['username'])){
            $member_info=$this->member_model->getMember(array('username'=>$_GET['username']));
            $condition['member_id']=$member_info['member_id'];
        }

        $complain_list=$this->complain_model->getComplainList($condition);
        foreach($complain_list as $key=>$complain_info){
            $member_info=$this->member_model->getMember(array('member_id'=>$complain_info['member_id']));
            $complain_list[$key]['username']=$member_info['username'];
        }


        $data=array();
        $data['complain_list']=$complain_list;

        $this->load->view('templates/header_admin',$data);
        $this->load->view('complain_index_admin',$data);
    }



    //新增投诉
    public function save(){
        $this->load->model('complain_model');

        $data=array();
        $data['member_id']=$this->session->userdata('member_id');
        $data['title']=$_POST['title'];
        $data['create_time']=time();
        $data['content']=$_POST['content'];
        $data['remark']=$_POST['remark'];

        $result=$this->complain_model->addComplain($data);
        if($result){
            $this->index();
        }
        else {
            $this->load->view('errors/error');
        }
    }

    //删除投诉
    public function delete(){
        $this->load->model('complain_model');
        $condition=array();
        $condition['complain_id']=$_GET['complain_id'];

        $result=$this->complain_model->deleteComplain($condition);
        if($result){
            $this->index();
        }
        else{
            $this->load->view('errors/error');
        }
    }

    public function showEdit(){
        $this->load->model('complain_model');
        $complain_info=$this->complain_model->getComplainInfo(array('complain_id'=>$_GET['complain_id']));

        $data['complain_info']=$complain_info;

        $this->load->view('templates/header_admin');
        $this->load->view('complain_edit_admin',$data);
    }

    //确认维修完成
    public function finish(){
        $this->load->model('repair_model');
        $repair_info=$this->repair_model->editRepair(array('status'=>20),array('repair_id'=>$_GET['repair_id']));

        $this->index();
    }

    public function edit(){
        $this->load->model('complain_model');
        $condition=array();
        $condition['complain_id']=$_GET['complain_id'];

        $data=array();
        if($_GET['status']==10){
            $data['audit_name']=$_GET['audit_name'];
            $data['handle_name']=$_GET['handle_name'];
            $data['status']=20;
        }
        elseif($_GET['status']==20){
            $data['handle_info']=$_GET['handle_info'];
            $data['finish_time']=time();
            $data['status']=30;
        }
        $result=$this->complain_model->editComplain($data,$condition);
        if($result){
            redirect('http://localhost/index.php/complain_admin/index');
        }
        else{
            show_404();
        }
    }


}