<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{
    public function getPosts()
    {
        $result = $this->db->findAllBy('Select username, email, title, content, image from Post ');
        return $result;

    }
}