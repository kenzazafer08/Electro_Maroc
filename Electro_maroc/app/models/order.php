<?php
class Order
{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getOrder($id){
        $this->db->query('SELECT * FROM commande JOIN client on commande.id_client = client.id where id_client = :id');
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function getProducts($id){
        $this->db->query('SELECT * FROM produit_commande JOIN produit on produit_commande.id_produit = produit.id where id_commande = :id');
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function getCart($id){
        $this->db->query('SELECT * FROM card JOIN produit on card.id_product = produit.id WHERE id_client = :id');
        $this->db->bind('id' , $id);
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function vidercart(){
        $this->db->query('DELETE FROM card WHERE id_client = :id');
        $this->db->bind('id' , $_SESSION['username']->id);
        $this->db->execute();
        if($this->db->rowCount() < 1){
            return false;
        }
        return true;
    }
    public function deleteproduct($id,$id_client){
        $this->db->query('DELETE FROM card WHERE id_client = :id && id_product =  :id_produit');
        $this->db->bind('id' , $id_client);
        $this->db->bind('id_produit' , $id);
        $this->db->execute();
        if($this->db->rowCount() < 1){
            return false;
        }
        return true;
    }
    public function getSingleOrder($id){
        $this->db->query('SELECT *  from commande  JOIN categorie on client on commande.id_client = client.id WHERE id = :id');
        $this->db->bind('id' , $id);
        $this->db->execute();
        return $this->db->single();
    }
    public function addorder(){
        $this->db->query('INSERT INTO commande( id_client) VALUES (:id)');
        $this->db->bind('id' , intval($_SESSION['username']->id));
        $this->db->execute();
    }
    public function order(){
        $this->db->query('SELECT * FROM commande ORDER BY id_order DESC LIMIT 1');
        $this->db->execute();
        $order = $this->db->single();
        return $order;
    }
    public function ligncommande($data){
        $this->db->query('INSERT INTO produit_commande (quantity, prix_pc, id_commande, id_produit) VALUES  (:quantity , :prix ,:id_order , :id_produit )');
        $this->db->bind('quantity' , $data['quantity']);
        $this->db->bind('prix' , $data['prix']);
        $this->db->bind('id_order' , $data['order']);
        $this->db->bind('id_produit' , $data['id_produit']);
        $this->db->execute();
    }
}