<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/5
 * Time: 20:45
 */
?>
<?php
class Repair_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function addRepair($data)
    {
        return $this->db->insert('repair',$data);
    }

    public function getRepairInfo($condition){
        $query = $this->db->get_where('repair',$condition);
        return $query->row_array();
    }

    public function getRepairList($condition=array())
    {
        $query=$this->db->get_where('repair',$condition);
        return $query->result_array();
    }

    public function deleteRepair($condition=array()){
        return $this->db->delete('repair', $condition);
    }

    public function editRepair($data,$condition){
        $this->db->where($condition);
        return $this->db->update('repair', $data);
    }


}
?>
