<?php

namespace application\lib;

use PDO;

class DataBase
{
    protected $db;

    public function __construct()
    {
        $config =require 'application/config/db.php';
        $this->db = new PDO('mysql:dbname='.$config['dbname'].';host='.$config['host'].'', $config['user'], $config['password']);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql, $params = [])
    {
        $stat = $this->db->prepare($sql);
        if (!empty($params))
        {
            foreach ($params as $key => $val)
            {
                $stat->bindValue(':'.$key, $val['param'], $val['type']);
            }
        }
        $stat->execute();
        return $stat;
    }

    public function findOneBy($sql,$params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }

    public function findAllBy($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }
}