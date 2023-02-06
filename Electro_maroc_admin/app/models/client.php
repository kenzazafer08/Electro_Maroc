<?php
class Client
{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function countuser(){
        $this->db->query('select count(*) as total from client');
        return $this->db->count();
    }
    public function getUsers(){
        $this->db->query('SELECT * FROM client');
        $this->db->execute();
        return $this->db->resultSet();
    }
}