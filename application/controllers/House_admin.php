<?php
class House_admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index(){
        $this->load->model('house_model');
        $this->load->model('building_model');
        $this->load->model('carport_model');
        $condition=array();
        if(!empty($_GET['house_name'])){
            $condition['house_name']=$_GET['house_name'];
        }
        if(!empty($_GET['unit_num'])){
            $condition['unit_num']=$_GET['unit_num'];
        }
        $house_list=$this->house_model->getHouseList($condition);
        foreach($house_list as $key=>$value){
            $carport_info=$this->carport_model->getCarportInfo(array('carport_id'=>$value['carport_id']));
            $house_list[$key]['carport_name']=$carport_info['carport_name'];
            $building_info=$this->building_model->getBuildingInfo(array('building_id'=>$value['building_id']));
            $house_list[$key]['building_num']=$building_info['building_num'];
        }

        $data=array();
        $data['house_list']=$house_list;

        $this->load->view('templates/header_admin',$data);
        $this->load->view('house_index_admin',$data);
    }


    //添加住户页面
    public function add(){
        $this->load->model('carport_model');
        $this->load->model('building_model');

        $carport_list=$this->carport_model->getCarportList();
        $building_list=$this->building_model->getBuildingList();

        $data=array();
        $data['carport_list']=$carport_list;
        $data['building_list']=$building_list;

        $this->load->view('templates/header_admin');
        $this->load->view('house_add_admin',$data);
    }

    public function save(){
        $this->load->model('house_model');

        $data=array();
        $data['carport_id']=$_POST['carport_id'];
        $data['building_id']=$_POST['building_id'];
        $data['telephone']=$_POST['telephone'];
        $data['unit_num']=$_POST['unit_num'];
        $data['house_name']=$_POST['house_name'];
        $data['status']=20;
        $data['move_in_time']=time();
        $data['remark']=$_POST['remark'];

        $result=$this->house_model->addHouse($data);
        if($result){
            $this->index();
        }
        else {
            $this->load->view('errors/error');
        }
    }

    public function delete(){
        $this->load->model('house_model');
        $condition=array();
        $condition['house_id']=$_GET['house_id'];

        $result=$this->house_model->deleteHouse($condition);
        if($result){
            $this->index();
        }
        else{
            $this->load->view('errors/error');
        }
    }

    public function showEdit(){
        $this->load->model('house_model');
        $this->load->model('carport_model');
        $house_info=$this->house_model->getHouseInfo(array('house_id'=>$_GET['house_id']));

        $carport_info=$this->carport_model->getCarportInfo(array('carport_id'=>$house_info['carport_id']));
        $house_info['carport_name']=$carport_info['carport_name'];

        $carport_list=$this->carport_model->getCarportList();

        $data=array();
        $data['house_info']=$house_info;
        $data['carport_list']=$carport_list;

        $this->load->view('templates/header_admin');
        $this->load->view('house_edit_admin',$data);
    }

    public function edit(){
        $this->load->model('house_model');
        $condition=array();
        $condition['house_id']=$_GET['house_id'];

        $data=array();
        $data['carport_id']=$_GET['carport_id'];
        $data['telephone']=$_GET['telephone'];
        $data['status']=$_GET['status'];
        $data['remark']=$_GET['remark'];

        $result=$this->house_model->editHouse($data,$condition);
        if($result){
            redirect('http://localhost/index.php/house_admin/index');
        }
        else{
            show_404();
        }


    }


}