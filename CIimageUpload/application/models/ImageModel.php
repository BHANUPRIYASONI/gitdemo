<?php

class ImageModel extends CI_Model{


public function insert_item($table,$data)
{
    return $this->db->insert($table,$data);
}

public function insert_image($table,$data)
{
    return $this->db->insert($table,$data);
}

public function getData()
    {
        $this->db->select('user_id,userName,userImage');
        $this->db->from('user_table');
        
        $this->db->join('user_image','user_table.user_id = user_image.user_image_id');
       
        $query = $this->db->get();
        
        return $query->result_array();
    }

}
?>