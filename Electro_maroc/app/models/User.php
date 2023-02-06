<?php
class User {
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }
    public function login($username, $password){
        $this->db->query("SELECT * FROM client WHERE email = :username");
        $this->db->bind('username', $username);

        $this->db->execute();

        $row = $this->db->single();
        $userPass = $row->password;
        if( $password === $userPass){
            return $row;
        }
        return false;
    }
    public function findUserByUsername($username){
        $this->db->query('SELECT * FROM client WHERE email = :username');
        $this->db->bind('username', $username);

        $this->db->single();

        if($this->db->rowCount() > 0){
            return true;
        }
        return false;
    }
    public function register($client){
        $this->db->query("INSERT INTO client (Nom , email , tele , Adress , password ) VALUES (:Nom , :email ,:tele,:Adress , :password )");
        $this->db->bind("Nom", $client['name']);
        $this->db->bind("email", $client['email']);
        $this->db->bind("tele", $client['phone']);
        $this->db->bind("Adress", $client['adress']);
        $this->db->bind("password", $client['password']);
        $this->db->execute();
        if($this->db->rowCount() < 1){
            return false;
        }
        return true;
    }
}