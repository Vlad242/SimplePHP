<?php

namespace application\models;

use application\core\Model;
use PDO;

class Admin extends Model
{
    public $error;

   public function loginValidate($post)
   {
        $config = require 'application/config/admin.php';
        if ($config['login'] != $post['login'])
        {
            $this->error = "Login error!";
            return false;
        }elseif ($config['password'] != $post['password']){
            $this->error = "Password error!";
            return false;
        }
        return true;
   }

    public function postValidate($post)
    {
        $usernameLen = iconv_strlen($post['username']);
        $titleLen = iconv_strlen($post['title']);
        $contentLen = iconv_strlen($post['content']);

        if ($usernameLen < 2 or $usernameLen > 20)
        {
            $this->error = 'Username must be > 2 and < 20 symbols!';
            return false;
        }elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
            $this->error = 'Error email(for example user@gmail.com)!';
            return false;
        }elseif ($titleLen < 2 or $titleLen > 50){
            $this->error = 'Title must be > 2 and < 50 symbols!';
            return false;
        }elseif ($contentLen < 2 or $contentLen > 500){
            $this->error = 'Content must be > 2 and < 500 symbols!';
            return false;
        }
        return true;
    }

    public function postExist($param)
    {
        $params =[
            'id' => [
                'param' => $param,
                'type' => PDO::PARAM_STR,
            ],
        ];
        return $this->db->findOneBy('SELECT id FROM Post WHERE id = :id', $params);
    }

    public function deletePost($param)
    {
        $params =[
            'id' => [
                'param' => $param,
                'type' => PDO::PARAM_INT,
            ],
        ];
        $this->db->query('DELETE FROM Post WHERE id = :id;', $params);
        unlink('public/images/posts/'.$param.'.jpg');
        return 0;
    }

    public function postData($param)
    {
        $params =[
            'id' => [
                'param' => $param,
                'type' => PDO::PARAM_STR,
            ],
        ];
        return $this->db->findAllBy('SELECT * FROM Post WHERE id = :id;', $params);
    }

    public function editPost($post, $param)
    {
        $params =[
            'id' => [
                'param' => $param,
                'type' => PDO::PARAM_STR,
            ],
            'username' => [
                'param' => $post['username'],
                'type' => PDO::PARAM_STR,
            ],
            'title' => [
                'param' => $post['title'],
                'type' => PDO::PARAM_STR,
            ],
            'content' => [
                'param' => $post['content'],
                'type' => PDO::PARAM_STR,
            ],
            'email' => [
                'param' => $post['email'],
                'type' => PDO::PARAM_STR,
            ],
        ];
        $this->db->query('UPDATE Post SET username = :username, title = :title, content = :content, email = :email WHERE id = :id', $params);
        return 0;
    }

    public function getPosts()
    {
        $result = $this->db->findAllBy('Select * from Post');
        return $result;
    }

    public function viewPost($param)
    {
        $params =[
            'id' => [
                'param' => $param,
                'type' => PDO::PARAM_STR,
            ],
        ];
        $result = $this->db->findAllBy('Select * from Post WHERE id = :id;', $params);
        return $result;
    }

    public function getStatus($param)
    {
        $params =[
            'id' => [
                'param' => $param,
                'type' => PDO::PARAM_STR,
            ],
        ];
        return $this->db->findOneBy('SELECT status FROM Post WHERE id =:id;', $params);
    }

    public function changeStatus($param)
    {
        var_dump($this->getStatus($param));
        if ($this->getStatus($param))
        {
            $params =[
                'id' => [
                    'param' => $param,
                    'type' => PDO::PARAM_STR,
                ],
                'status' => [
                    'param' => 0,
                    'type' => PDO::PARAM_STR,
                ],
            ];
        }else{
            $params =[
                'id' => [
                    'param' => $param,
                    'type' => PDO::PARAM_STR,
                ],
                'status' => [
                    'param' => 1,
                    'type' => PDO::PARAM_STR,
                ],
            ];
        }

        $this->db->query('UPDATE Post SET status = :status WHERE id = :id;', $params);
    }
}