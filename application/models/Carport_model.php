<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/5
 * Time: 20:45
 */
?>
<?php
class Carport_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    //新增停车位
    public function addCarport($data)
    {
        return $this->db->insert('carport',$data);
    }

    //获取停车位详细信息
    public function getCarportInfo($condition){
        $query = $this->db->get_where('carport',$condition);
        return $query->row_array();
    }

    //获取停车位列表
    public function getCarportList($condition=array())
    {
        $query=$this->db->get_where('carport',$condition);
        return $query->result_array();
    }

    //删除停车位
    public function deleteCarport($condition=array()){
        return $this->db->delete('carport', $condition);
    }

    //更新停车位信息
    public function editCarport($data,$condition){
        $this->db->where($condition);
        return $this->db->update('carport', $data);
    }


}
?>
