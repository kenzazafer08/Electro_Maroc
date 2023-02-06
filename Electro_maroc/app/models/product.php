<?php
class Product
{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getProduct(){
        $this->db->query('SELECT * FROM produit JOIN categorie on produit.id_categorie = categorie.id_cat');
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function get4Product(){
        $this->db->query('SELECT * FROM produit JOIN categorie on produit.id_categorie = categorie.id_cat ORDER BY produit.id DESC LIMIT 10');
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function getProductsbycategorie($categorie){
        $this->db->query("SELECT *  from produit JOIN categorie on produit.id_categorie = categorie.id_cat WHERE produit.id_categorie = $categorie");
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function triProducts($tri){
        if($tri == 1){
          $this->db->query("SELECT * FROM `produit` ORDER BY `produit`.`prix` ASC");
        }else{
            $this->db->query("SELECT * FROM `produit` ORDER BY `produit`.`prix` DESC");
        }
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function getCategories(){
        $this->db->query('SELECT * FROM categorie');
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function addProduct($product){
        $this->db->query("SELECT * FROM client WHERE email = :email");
        $this->db->bind('email', $_SESSION['username']->email);
        $this->db->execute();
        $row = $this->db->single();
        $this->db->query("INSERT INTO card (id_client, id_product) VALUES (:id_client , :id_product )");
        $this->db->bind("id_client", $row->id);
        $this->db->bind("id_product", $product);
        $this->db->execute();
        if($this->db->rowCount() < 1){
            return false;
        }
        return true;
    }
}