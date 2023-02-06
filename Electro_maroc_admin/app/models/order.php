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
    public function getOrder(){
        $this->db->query('SELECT * FROM commande JOIN client on commande.id_client = client.id');
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function getProducts(){
        $this->db->query('SELECT * FROM produit_commande JOIN produit on produit_commande.id_produit = produit.id');
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
        $this->db->query('UPDATE commande SET etas = 0 WHERE id = :id');
        $this->db->bind('id' , intval($id));
        $this->db->execute();
        if($this->db->rowCount() < 1){
            return false;
        }
        return true;
    }
    public function valider($id){
        $this->db->query('UPDATE commande SET etas = 1 WHERE id = :id');
        $this->db->bind('id' , intval($id));
        $this->db->execute();
        if($this->db->rowCount() < 1){
            return false;
        }
        return true;
    }
}