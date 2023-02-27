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
    public function getSingle($id){
        $this->db->query('SELECT * FROM produit JOIN categorie on produit.id_categorie = categorie.id_cat where id = :id');
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->single();
    }
    public function get4Product(){
        $this->db->query('SELECT * FROM produit JOIN categorie on produit.id_categorie = categorie.id_cat where Pdelete = 1 ORDER BY produit.id DESC LIMIT 4');
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
    public function addProduct($data){
        $this->db->query("SELECT * from card WHERE id_client = :id && id_product =  :id_produit");
        $this->db->bind('id' , $data['id_client']);
        $this->db->bind('id_produit' , $data['id_produit']);
        $this->db->execute();
        if($this->db->rowCount() < 1){
        $this->db->query("INSERT INTO card (id_client ,id_product , prix_q) VALUES (:id_client, :id_product ,:prix)");
        $this->db->bind("id_client", $data['id_client']);
        $this->db->bind("id_product", $data['id_produit']);
        $this->db->bind("prix", $data['prix']);
        $this->db->execute();
        if($this->db->rowCount() < 1){
            return false;
        }
        return true;
        }
    }
    public function productsCARD($data){
        $this->db->query("SELECT * from card JOIN produit on produit.id = card.id_product WHERE id_client = :id");
        $this->db->bind('id' , $data['client']);
        $this->db->execute();
        return $this->db->resultSet();
    }
}