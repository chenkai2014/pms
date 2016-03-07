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
        $this->db->insert('member',$data);
    }


    //根据用户名和密码获取用户信息
    public function getMemberInfo($username,$password)
    {
        $query = $this->db->get_where('member', array('username' => $username,'password'=>$password));
        return $query;
    }

}
?>
