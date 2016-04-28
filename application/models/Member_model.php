<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/5
 * Time: 20:45
 */
?>
<?php
class Member_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    //新增用户
    public function addMember($data)
    {
       return $this->db->insert('member',$data);
    }

    //获取用户详细信息
    public function getMemberDetailInfoById($member_id)
    {
        $query = $this->db->get_where('member',array('member_id'=>$member_id));
        $result=$query->row_array();

        $this->load->model('house_model');
        $query=$this->db->get_where('house',array('house_id'=>$result['house_id']));
        $result_house=$query->row_array();
        $result['extend_house']=$result_house;

        $this->load->model('carport_model');
        $query=$this->db->get_where('carport',array('carport_id'=>$result_house['carport_id']));
        $result_carport=$query->row_array();
        $result['extend_carport']=$result_carport;

        $this->load->model('building_model');
        $query=$this->db->get_where('building',array('building_id'=>$result_house['building_id']));
        $result_building=$query->row_array();
        $result['extend_building']=$result_building;

        return $result;

    }


    //根据用户名和密码获取用户信息
    public function getMemberInfo($username,$password)
    {
        $query = $this->db->get_where('member', array('username' => $username,'password'=>$password));
        return $query->row_array();
    }

    public function getMember($condition){
        $query = $this->db->get_where('member',$condition);
        return $query->row_array();
    }

    //获取用户列表
    public function getMemberList($condition=array())
    {
        $query=$this->db->get_where('member',$condition);
        return $query->result_array();
    }

    //删除用户
    public function deleteMember($condition=array()){
        return $this->db->delete('member', $condition);
    }

    //更新用户信息
    public function editMember($data,$condition){
        $this->db->where($condition);
        return $this->db->update('member', $data);
    }


}
?>
