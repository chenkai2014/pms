<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/5
 * Time: 20:45
 */
?>
<?php
class Charge_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function addCharge($data)
    {
        return $this->db->insert('charge',$data);
    }

    public function getChargeInfo($condition){
        $query = $this->db->get_where('charge',$condition);
        return $query->row_array();
    }

    public function getChargeList($condition=array())
    {
        $query=$this->db->get_where('charge',$condition);
        return $query->result_array();
    }

    public function getChargeTypeList($condition=array())
    {
        $query=$this->db->get_where('charge_type',$condition);
        return $query->result_array();
    }

    public function deleteCharge($condition=array()){
        return $this->db->delete('charge', $condition);
    }

    public function editCharge($data,$condition){
        $this->db->where($condition);
        return $this->db->update('charge', $data);
    }

    public function getTypeInfoById($type_id)
    {
        $query = $this->db->get_where('charge_type',array('type_id'=>$type_id));
        return $query->row_array();
    }


}
?>
