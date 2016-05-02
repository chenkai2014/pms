<?php
class Repair_admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index(){
        $this->load->model('repair_model');
        $this->load->model('house_model');
        $condition=array();


        $repair_list=$this->repair_model->getRepairList($condition);
        if(!empty($repair_list)){
            foreach($repair_list as $key=>$value){
              $house_info=$this->house_model->getHouseInfo(array('house_id'=>$value['house_id']));
                $repair_list[$key]['house_name']=$house_info['house_name'];
            }
        }

        $data=array();
        $data['repair_list']=$repair_list;

        $this->load->view('templates/header_admin',$data);
        $this->load->view('repair_index_admin',$data);
    }


    public function add(){
        $this->load->view('building_add_admin');
    }

    public function save(){
        $this->load->model('repair_model');

        $data=array();
        $data['building_num']=$_POST['building_num'];
        $data['building_floor']=$_POST['building_floor'];
        $data['orientation']=$_POST['orientation'];
        $data['remark']=$_POST['remark'];

        $result=$this->repair_model->addBuilding($data);
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

        $this->load->view('templates/header_admin',$data);
        $this->load->view('repair_edit_admin',$data);
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