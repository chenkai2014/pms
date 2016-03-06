<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/3
 * Time: 21:31
 */
?>
<?php
class News_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_news($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('news');
            return $query->result_array();
        }

        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }

}

?>