<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/5
 * Time: 20:45
 */
?>
<?php
class House_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function addHouse($data)
    {
        return $this->db->insert('house',$data);
    }

    public function getHouseInfo($condition){
        $query = $this->db->get_where('house',$condition);
        return $query->row_array();
    }

    public function getHouseList($condition=array())
    {
        $query=$this->db->get_where('house',$condition);
        return $query->result_array();
    }

    public function deleteHouse($condition=array()){
        return $this->db->delete('house', $condition);
    }

    public function editHouse($data,$condition){
        $this->db->where($condition);
        return $this->db->update('house', $data);
    }


}
?>
