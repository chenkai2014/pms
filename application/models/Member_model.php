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
