<?php
class Carport_admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index(){
        $this->load->model('carport_model');
        $condition=array();
        if(!empty($_GET['license'])){
            $condition['license']=$_GET['license'];
        }
        if(!empty($_GET['carport_name'])){
            $condition['carport_name']=$_GET['carport_name'];
        }
        $carport_list=$this->carport_model->getCarportList($condition);

        $data=array();
            $data['carport_list']=$carport_list;

        $this->load->view('templates/header_admin',$data);
        $this->load->view('carport_index_admin',$data);
    }


    public function add(){
        $this->load->view('templates/header_admin');
        $this->load->view('carport_add_admin');
    }

    public function save(){
        $this->load->model('carport_model');

        $data=array();
        $data['carport_name']=$_POST['carport_name'];
        $data['area']=$_POST['area'];
        $data['license']=$_POST['license'];
        $data['remark']=$_POST['remark'];

        $result=$this->carport_model->addCarport($data);
        if($result){
            $this->index();
        }
        else {
            $this->load->view('errors/error');
        }
    }

    public function delete(){
        $this->load->model('carport_model');
        $condition=array();
        $condition['carport_id']=$_GET['carport_id'];

        $result=$this->carport_model->deleteCarport($condition);
        if($result){
            $this->index();
        }
        else{
            $this->load->view('errors/error');
        }

    }

    public function showEdit(){
        $this->load->model('carport_model');
        $carport_info=$this->carport_model->getCarportInfo(array('carport_id'=>$_GET['carport_id']));
        $data['carport_info']=$carport_info;

        $this->load->view('templates/header_admin');
        $this->load->view('carport_edit_admin',$data);
    }

    public function edit(){
        $this->load->model('carport_model');
        $condition=array();
        $condition['carport_id']=$_GET['carport_id'];

        $data=array();
        $data['carport_name']=$_GET['carport_name'];
        $data['area']=$_GET['area'];
        $data['license']=$_GET['license'];
        $data['remark']=$_GET['remark'];

        $result=$this->carport_model->editCarport($data,$condition);
        if($result){
            //$this->index();
            redirect('http://localhost/index.php/carport_admin/index');
        }
        else{
            show_404();
        }


    }


}