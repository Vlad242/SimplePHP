<?php

namespace application\models;

use application\core\Model;

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
}