<?php
class Charge_admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index(){
        $this->load->model('charge_model');
        $this->load->model('house_model');
        $condition=array();
        if(!empty($_GET['house_name'])){
            $house_info=$this->house_model->getHouseInfo(array('house_name'=>$_GET['house_name']));
            $condition['house_id']=$house_info['house_id'];
        }
        $charge_list=$this->charge_model->getChargeList($condition);
        //整理缴费列表
        foreach($charge_list as $key=>$value){
            $type_info=$this->charge_model->getTypeInfoById($value['type_id']);
            $charge_list[$key]['type_name']=$type_info['type_name'];
            $house_info=$this->house_model->getHouseInfo(array('house_id'=>$value['house_id']));
            $charge_list[$key]['house_name']=$house_info['house_name'];
        }

        $data=array();
        $data['charge_list']=$charge_list;

        $this->load->view('templates/header_admin',$data);
        $this->load->view('charge_index_admin',$data);
    }


    public function add(){
        $this->load->view('charge_add_admin');
    }

    public function save(){
        $this->load->model('charge_model');

        $data=array();
        $data['building_num']=$_POST['building_num'];
        $data['building_floor']=$_POST['building_floor'];
        $data['orientation']=$_POST['orientation'];
        $data['remark']=$_POST['remark'];

        $result=$this->charge_model->addBuilding($data);
        if($result){
            $this->index();
        }
        else {
            $this->load->view('errors/error');
        }
    }

    //删除缴费记录
    public function delete(){
        $this->load->model('charge_model');
        $condition=array();
        $condition['charge_id']=$_GET['charge_id'];

        $result=$this->charge_model->deleteCharge($condition);
        if($result){
            $this->index();
        }
        else{
            $this->load->view('errors/error');
        }
    }

    public function showEdit(){
        $this->load->model('charge_model');
        $building_info=$this->charge_model->getBuildingInfo(array('building_id'=>$_GET['building_id']));
        $data['building_info']=$building_info;

        $this->load->view('charge_edit_admin',$data);
    }

    public function edit(){
        $this->load->model('charge_model');
        $condition=array();
        $condition['building_id']=$_GET['building_id'];

        $data=array();
        $data['building_num']=$_GET['building_num'];
        $data['building_floor']=$_GET['building_floor'];
        $data['orientation']=$_GET['orientation'];
        $data['remark']=$_GET['remark'];

        $result=$this->charge_model->editBuilding($data,$condition);
        if($result){
            //$this->index();
            redirect('http://localhost/index.php/charge_admin/index');
        }
        else{
            show_404();
        }


    }


}