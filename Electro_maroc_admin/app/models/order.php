<?php
class Order
{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function countorder(){
        $this->db->query('select count(*) as total from commande');
        return $this->db->count();
    }
    public function single($id){
        $this->db->query('SELECT * FROM commande JOIN client on commande.id_client = client.id where id_order = :id');
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->single();
    }
    public function getOrder(){
        $this->db->query('SELECT * FROM commande JOIN client on commande.id_client = client.id ');
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function getProducts($id){
        $this->db->query('SELECT * FROM produit_commande JOIN produit on produit_commande.id_produit = produit.id where id_commande = :id');
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function getSingleOrder($id){
        $this->db->query('SELECT *  from commande  JOIN categorie on client on commande.id_client = client.id WHERE id = :id');
        $this->db->bind('id' , $id);
        $this->db->execute();
        return $this->db->single();
    }
    public function annuler($id){
        $a = 0;
        $this->db->query('UPDATE commande SET etas = :etas WHERE id_order = :id');
        $this->db->bind('etas' , $a);
        $this->db->bind('id' , intval($id));
        $this->db->execute();
        if($this->db->rowCount() < 1){
            return false;
        }
        return true;
    }
    public function valider($id){
        $v = 1;
        $this->db->query('UPDATE commande SET etas = :etas WHERE id_order = :id');
        $this->db->bind('etas' , $v);
        $this->db->bind('id' , $id);
        $this->db->execute();
        if($this->db->rowCount() < 1){
            return false;
        }
        return true;
    }
}