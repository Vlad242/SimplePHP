<?php

namespace application\models;

use application\core\Model;
use application\lib\Cutter;
use Exception;
use PDO;

class Main extends Model
{
    private $limit;
    private $page;
    private $count = 5;
    public $error;

    public function getPosts($page = 1, $limit = 3, $field = 'id', $type = 'ASC')
    {
        if (isset($_SESSION['field']) and isset($_SESSION['type']))
        {
            $field = $_SESSION['field'];
            $type = $_SESSION['type'];
        }else{
            $_SESSION['field'] = 'id';
            $_SESSION['type'] = 'ASC';
        }
        $this->limit = $limit;
        $this->page = $page;
        $this->count = $this->getCount();
        $offset = ($this->page - 1) * $this->limit;
        $params =[
            'limit' => [
                'param' => $this->limit,
                'type' => PDO::PARAM_INT,
            ],
            'offset' =>[
                'param' => $offset,
                'type' => PDO::PARAM_INT,
            ],
        ];
        $result = $this->db->findAllBy('Select username, email, title, content, image, status from Post ORDER BY '.$field.' '.$type.' LIMIT :limit OFFSET :offset ;', $params);
        return $result;
    }

    public function createLinks()
    {
        $html = '<div class="pagination">';
        if($this->count % 3 !== 0)
        {
            $pages = ($this->count / 3) + 1;
        }else{
            $pages = $this->count / 3;
        }

        for ($i = 1; $i <= $pages; $i++)
        {
            if ($i == $this->page)
            {
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

    public function postValidate($post)
    {
        $usernameLen = iconv_strlen($post['username']);
        $titleLen = iconv_strlen($post['title']);
        $contentLen = iconv_strlen($post['content']);

        if ($usernameLen < 2 or $usernameLen > 20)
        {
            $this->error = 'Username must be > 2 and < 20 symbols!';
            return false;
        }elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL))
        {
            $this->error = 'Error email(for example user@gmail.com)!';
            return false;
        }elseif ($titleLen < 2 or $titleLen > 50)
        {
            $this->error = 'Title must be > 2 and < 50 symbols!';
            return false;
        }elseif ($contentLen < 2 or $contentLen > 500)
        {
            $this->error = 'Content must be > 2 and < 500 symbols!';
            return false;
        }
        if (empty($_FILES['image']['tmp_name']))
        {
            $this->error = 'File not selected!';
            return false;
        }
        return true;
    }

    public function postCreate($post)
    {
        $params = [
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
            'image' => [
                'param' => 'public/images/posts/default.jpg',
                'type' => PDO::PARAM_STR,
            ],
        ];
        $this->db->query('INSERT INTO Post(username,title,content,email,image) VALUES(:username, :title, :content, :email, :image)', $params);
        return $this->db->lastInsertId();
    }

    public function postUploadImage($file, $id)
    {
        $image = new Cutter();
        $image->load($file);
        $image->resize(320, 240);
        $image->save('public/images/posts/'.$id.'.jpg');
        $params =[
            'image' => [
                'param' => 'public/images/posts/'.$id.'.jpg',
                'type' => PDO::PARAM_STR,
            ],
            'id' => [
                'param' => $id,
                'type' => PDO::PARAM_INT,
            ],
        ];
        $this->db->query('UPDATE Post SET image = :image WHERE id = :id', $params);
        return 0;
    }
}