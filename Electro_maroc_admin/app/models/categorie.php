<?php
class Categorie
{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getCategories(){
        $this->db->query('SELECT * FROM categorie');
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function addCat($name){
        $this->db->query("INSERT INTO categorie(nom) VALUES (:name)");
        $this->db->bind("name", $name);
        $this->db->execute();
        if($this->db->rowCount() < 1){
            return false;
        }
        return true;
    }
    public function getSingleCat($id){
        $this->db->query('SELECT *  from categorie WHERE id_cat = :id');
        $this->db->bind('id' , $id);
        $this->db->execute();
        return $this->db->single();
    }
    public function edit($name,$id){
        $this->db->query('UPDATE categorie SET nom = :name WHERE id_cat = :id');
        $this->db->bind('id' , $id);
        $this->db->bind("name", $name);
        $this->db->execute();
        if($this->db->rowCount() < 1){
            return false;
        }
        return true;
    }
    public function delete($id){
        $this->db->query('DELETE FROM categorie WHERE id_cat = :id');
        $this->db->bind('id' , intval($id));
        $this->db->execute();
        if($this->db->rowCount() < 1){
            return false;
        }
        return true;
    }
}