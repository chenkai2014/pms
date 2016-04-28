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

        $member_id=$this->session->userdata('member_id');

        $complain_list=$this->complain_model->getComplainList(array('member_id'=>$member_id));


        $data=array();
        $data['complain_list']=$complain_list;

        $this->load->view('templates/header_home',$data);
        $this->load->view('complain_index_home',$data);
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
        $this->load->model('repair_model');
        $this->load->model('house_model');
        $repair_info=$this->repair_model->getRepairInfo(array('repair_id'=>$_GET['repair_id']));
        $house_info=$this->house_model->getHouseInfo(array('house_id'=>$repair_info['house_id']));
        $repair_info['house_name']=$house_info['house_name'];
        $data['repair_info']=$repair_info;

        $this->load->view('repair_edit_admin',$data);
    }

    //确认维修完成
    public function finish(){
        $this->load->model('repair_model');
        $repair_info=$this->repair_model->editRepair(array('status'=>20),array('repair_id'=>$_GET['repair_id']));

        $this->index();
    }

    public function edit(){
        $this->load->model('repair_model');
        $condition=array();
        $condition['repair_id']=$_GET['repair_id'];

        $data=array();
        if($_GET['status']==0){
            $data['repair_time']=time();
            $data['repair_name']=$_GET['repair_name'];
            $data['status']=10;
        }
        elseif($_GET['status']==10){
            $data['status']=20;
        }


        $result=$this->repair_model->editRepair($data,$condition);
        if($result){
            redirect('http://localhost/index.php/repair_admin/index');
        }
        else{
            show_404();
        }
    }


}