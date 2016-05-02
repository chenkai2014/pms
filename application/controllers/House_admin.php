<?php
class House_admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index(){
        $this->load->model('house_model');
        $condition=array();
        /*if(!empty($_GET['building_num'])){
            $condition['building_num']=$_GET['building_num'];
        }*/
        $house_list=$this->house_model->getHouseList($condition);

        $data=array();
        $data['house_list']=$house_list;

        $this->load->view('templates/header_admin',$data);
        $this->load->view('house_index_admin',$data);
    }


    public function add(){
        $this->load->view('templates/header_admin');
        $this->load->view('house_add_admin');
    }

    public function save(){
        $this->load->model('house_model');

        $data=array();
        $data['carport_id']=$_POST['carport_id'];
        $data['building_id']=$_POST['building_id'];
        $data['house_id']=$_POST['house_id'];
        $data['telephone']=$_POST['telephone'];
        $data['unit_num']=$_POST['unit_num'];
        $data['status']=$_POST['status'];
        $data['move_in_time']=$_POST['move_in_time'];
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
        $condition['building_id']=$_GET['building_id'];

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
        $house_info=$this->house_model->getHouseInfo(array('house_id'=>$_GET['house_id']));
        $data['house_info']=$house_info;

        $this->load->view('templates/header_admin');
        $this->load->view('house_edit_admin',$data);
    }

    public function edit(){
        $this->load->model('house_model');
        $condition=array();
        $condition['house_id']=$_GET['house_id'];

        $data=array();
        $data['carport_id']=$_GET['carport_id'];
        $data['building_id']=$_GET['building_id'];
        $data['house_id']=$_GET['house_id'];
        $data['telephone']=$_GET['telephone'];
        $data['unit_num']=$_GET['unit_num'];
        $data['status']=$_GET['status'];
        $data['move_in_time']=$_GET['move_in_time'];
        $data['move_out_time']=$_GET['move_out_time'];
        $data['remark']=$_GET['remark'];

        $result=$this->house_model->editHouse($data,$condition);
        if($result){
            //$this->index();
            redirect('http://localhost/index.php/house_admin/index');
        }
        else{
            show_404();
        }


    }


}