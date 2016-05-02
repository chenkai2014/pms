<?php
class Building_admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index(){
        $this->load->model('building_model');
        $condition=array();
        if(!empty($_GET['building_num'])){
            $condition['building_num']=$_GET['building_num'];
        }
        $building_list=$this->building_model->getBuildingList($condition);

        $data=array();
        $data['building_list']=$building_list;

        $this->load->view('templates/header_admin',$data);
        $this->load->view('building_index_admin',$data);
    }


    public function add(){
        $this->load->view('templates/header_admin');
        $this->load->view('building_add_admin');
    }

    public function save(){
        $this->load->model('building_model');

        $data=array();
        $data['building_num']=$_POST['building_num'];
        $data['building_floor']=$_POST['building_floor'];
        $data['orientation']=$_POST['orientation'];
        $data['remark']=$_POST['remark'];

        $result=$this->building_model->addBuilding($data);
        if($result){
            $this->index();
        }
        else {
            $this->load->view('errors/error');
        }
    }

    public function delete(){
        $this->load->model('building_model');
        $condition=array();
        $condition['building_id']=$_GET['building_id'];

        $result=$this->building_model->deleteBuilding($condition);
        if($result){
            $this->index();
        }
        else{
            $this->load->view('errors/error');
        }
    }

    public function showEdit(){
        $this->load->model('building_model');
        $building_info=$this->building_model->getBuildingInfo(array('building_id'=>$_GET['building_id']));
        $data['building_info']=$building_info;

        $this->load->view('templates/header_admin');
        $this->load->view('building_edit_admin',$data);
    }

    public function edit(){
        $this->load->model('building_model');
        $condition=array();
        $condition['building_id']=$_GET['building_id'];

        $data=array();
        $data['building_num']=$_GET['building_num'];
        $data['building_floor']=$_GET['building_floor'];
        $data['orientation']=$_GET['orientation'];
        $data['remark']=$_GET['remark'];

        $result=$this->building_model->editBuilding($data,$condition);
        if($result){
            //$this->index();
            redirect('http://localhost/index.php/building_admin/index');
        }
        else{
            show_404();
        }


    }


}