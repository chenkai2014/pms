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
        if(!empty($_GET['date_start'])){
            $condition['createTime >=']=strtotime($_GET['date_start']);
        }
        if(!empty($_GET['date_end'])){
            $condition['createTime <=']=strtotime($_GET['date_end']);
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
        $this->load->model('charge_model');
        $this->load->model('house_model');

        $charge_type_list=$this->charge_model->getChargeTypeList();
        $house_list=$this->house_model->getHouseList();

        $data=array();
        $data['charge_type_list']=$charge_type_list;
        $data['house_list']=$house_list;

        $this->load->view('templates/header_admin');
        $this->load->view('charge_add_admin',$data);
    }

    public function save(){
        $this->load->model('charge_model');

        $data=array();
        $data['type_id']=$_POST['type_id'];
        $data['house_id']=$_POST['house_id'];
        $data['invoiceNum']=$_POST['invoiceNum'];
        $data['paymentMoney']=$_POST['paymentMoney'];
        $data['createTime']=time();
        $data['remark']=$_POST['remark'];
        $data['handleName']=$_POST['handleName'];

        $result=$this->charge_model->addCharge($data);
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

        $data=array();
        $data['charge_id']=$_GET['charge_id'];

        $this->load->view('templates/header_admin');
        $this->load->view('charge_edit_admin',$data);
    }

    public function edit(){
        $this->load->model('charge_model');
        $condition=array();
        $condition['charge_id']=$_GET['charge_id'];

        $data=array();
        $data['paymentTime']=time();
        $data['chargeName']=$_GET['chargeName'];
        $data['status']=20;

        $result=$this->charge_model->editCharge($data,$condition);
        if($result){
            redirect('http://localhost/index.php/charge_admin/index');
        }
        else{
            show_404();
        }


    }


}