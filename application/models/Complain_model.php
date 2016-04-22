<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/5
 * Time: 20:45
 */
?>
<?php
class Complain_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function addComplain($data)
    {
        return $this->db->insert('complain',$data);
    }

    public function getComplainInfo($condition){
        $query = $this->db->get_where('complain',$condition);
        return $query->row_array();
    }

    public function getComplainList($condition=array())
    {
        $query=$this->db->get_where('complain',$condition);
        return $query->result_array();
    }

    public function deleteComplain($condition=array()){
        return $this->db->delete('complain', $condition);
    }

    public function editComplain($data,$condition){
        $this->db->where($condition);
        return $this->db->update('complain', $data);
    }


}
?>
