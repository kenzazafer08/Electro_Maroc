<?php
class Product
{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function countproduct(){
        $this->db->query('select count(*) as total from produit');
        return $this->db->count();
    }
    public function getProduct(){
        $this->db->query('SELECT * FROM produit JOIN categorie on produit.id_categorie = categorie.id_cat');
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function getCategories(){
        $this->db->query('SELECT * FROM categorie');
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function addProduct($product){
        $this->db->query("INSERT INTO produit(name , description  , prix , id_categorie ,image) VALUES (:name , :disc  ,:prix , :cat ,:image)");
        $this->db->bind("name", $product['name']);
        $this->db->bind("disc", $product['disc']);
        $this->db->bind("prix", $product['prix']);
        $this->db->bind("cat", $product['cat']);
        $this->db->bind("image", $product['image']);
        $this->db->execute();
        if($this->db->rowCount() < 1){
            return false;
        }
        return true;
    }
    public function getSingleProduct($id){
        $this->db->query('SELECT *  from produit  JOIN categorie on produit.id_categorie = categorie.id_cat WHERE id = :id');
        $this->db->bind('id' , $id);
        $this->db->execute();
        return $this->db->single();
    }
    public function edit($product){
        $this->db->query('UPDATE produit SET name = :name , image = :image ,description = :description ,prix = :prix ,id_categorie = :cat  WHERE id = :id');
        $this->db->bind('id' , $product['id']);
        $this->db->bind("name", $product['name']);
        $this->db->bind("description", $product['disc']);
        $this->db->bind("prix", $product['prix']);
        $this->db->bind("cat", $product['cat']);
        $this->db->bind("image", $product['image']);
        $this->db->execute();
        if($this->db->rowCount() < 1){
            return false;
        }
        return true;
    }
    public function delete($id){
        $this->db->query('UPDATE produit SET Pdelete = 0 WHERE id = :id');
        $this->db->bind('id' , intval($id));
        $this->db->execute();
        if($this->db->rowCount() < 1){
            return false;
        }
        return true;
    }
    public function catdelete($id_categorie){
        $this->db->query('UPDATE produit SET Pdelete = 0 WHERE id_categorie = :id');
        $this->db->bind('id' , intval($id_categorie));
        $this->db->execute();
        if($this->db->rowCount() < 1){
            return false;
        }
        return true;
    }
}