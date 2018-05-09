<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{
    private $limit;
    private $offset;
    private $page;
    private $count;
    public $error;

    public function getPosts($page = 1, $limit = 3)
    {
        $this->limit = $limit;
        $this->page = $page;
        $this->offset = ($this->page - 1 )* $this->limit;
        $this->count = $this->getCount();

        $result = $this->db->findAllBy('Select username, email, title, content, image, status from Post LIMIT '.$this->limit.' OFFSET '.$this->offset.';');
        return $result;
    }

    public function createLinks()
    {
        $html = '<div class="pagination">';
        if($this->count % 3 !== 0){
            $pages = ($this->count / 3) + 1;
        }else{
            $pages = $this->count / 3;
        }

        for ($i = 1; $i <= $pages; $i++){
            if ($i == $this->page){
                $html .=  '<a class="active" href= "/'.$i.'">'.$i.'</a>';
            }else{
                $html .=  '<a href="/'.$i.'">'.$i.'</a>';
            }
        }
        $html .= '</div>';
        return $html;
    }

    public function getCount()
    {
        return $this->db->findOneBy('Select COUNT(*) from Post');
    }

    public function postValidate($post, $type)
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
        /*
        if (empty($_FILES['image']['tmp_name']) and $type == 'create')
        {
            $this->error = 'File not selected!';
            return false;
        }*/
        return true;
    }

    public function postCreate($post)
    {
        $params = [
            'username' => $post['username'],
            'title' => $post['title'],
            'content' => $post['content'],
            'email' => $post['email'],
            'image' => '/public/images/posts/p1u1.png',
        ];
        $this->db->query('INSERT INTO post VALUES(:username,:title,:content,:email,:image)', $params);
        return $this->db->lastInsertId();
    }
}