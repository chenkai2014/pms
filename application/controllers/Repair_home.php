<?php
class Repair_home extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    //保修记录详情
    public function index(){
        $this->load->model('repair_model');
        $this->load->model('house_model');

        $house_id=$this->session->userdata('house_id');

        $repair_list=$this->repair_model->getRepairList(array('house_id'=>$house_id));
        if(!empty($repair_list)){
            foreach($repair_list as $key=>$value){
                $house_info=$this->house_model->getHouseInfo(array('house_id'=>$value['house_id']));
                $repair_list[$key]['house_name']=$house_info['house_name'];
            }
        }

        $data=array();
        $data['repair_list']=$repair_list;

        $this->load->view('templates/header_home',$data);
        $this->load->view('repair_index_home',$data);
    }



    public function add(){
        $this->load->view('building_add_admin');
    }


    //增加报修记录
    public function save(){
        $this->load->model('repair_model');

        $data=array();
        $data['title']=$_POST['title'];
        $data['content']=$_POST['content'];
        $data['remark']=$_POST['remark'];
        $data['house_id']=$this->session->userdata('house_id');
        $data['create_time']=time();

        $result=$this->repair_model->addRepair($data);
        if($result){
            $this->index();
        }
        else {
            $this->load->view('errors/error');
        }
    }

    public function delete(){
        $this->load->model('repair_model');
        $condition=array();
        $condition['repair_id']=$_GET['repair_id'];

        $result=$this->repair_model->deleteRepair($condition);
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