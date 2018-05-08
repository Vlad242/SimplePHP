<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{
    private $limit;
    private $offset;
    private $page;
    private $count;

    public function getPosts($limit = 3, $page = 1)
    {
        $this->limit = $limit;
        $this->page = $page;
        $this->offset = ($this->page - 1 )* $this->limit;
        $this->count = $this->getCount();

        $result = $this->db->findAllBy('Select username, email, title, content, image from Post LIMIT '.$this->limit.' OFFSET '.$this->offset.';');
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
}