<?php
//temp for testing
class PostModel extends model
{
    public function getPosts()
    {
        $this->db->query("SELECT * FROM post");

        return $this->db->resultSet();
    }
}
