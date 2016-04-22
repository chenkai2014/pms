<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/5
 * Time: 20:45
 */
?>
<?php
class Building_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function addBuilding($data)
    {
        return $this->db->insert('building',$data);
    }

    public function getBuildingInfo($condition){
        $query = $this->db->get_where('building',$condition);
        return $query->row_array();
    }

    public function getBuildingList($condition=array())
    {
        $query=$this->db->get_where('building',$condition);
        return $query->result_array();
    }

    public function deleteBuilding($condition=array()){
        return $this->db->delete('building', $condition);
    }

    public function editBuilding($data,$condition){
        $this->db->where($condition);
        return $this->db->update('building', $data);
    }


}
?>
