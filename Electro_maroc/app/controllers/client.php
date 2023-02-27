<?php
  class Client extends Controller {
    public $productModel;
    public $order;
    public $id;
public function __construct(){
        if(!isset($_SESSION['username'])){
            $data = [
                'login' => 'LogIn First',
                'password_err' => '',
                'username_err' => '',
            ];
        
            $this->view('pages/login', $data);
          
        }else{
        $this->id = $_SESSION['username']->id;
        $this->productModel = $this->model('product');
        $this->order = $this->model('order');
    }
  }
public function index(){
    $product = $this->productModel->get4Product();
    $data = [
      'login' =>'',
      'products' => $product
    ];
    $this->view('pages/index',$data);
  }
public function shop(){
    $product = $this->productModel->getProduct();
    $categorie = $this->productModel->getCategories();
    $data = [
      'login' =>'',
      'products' => $product,
      'categorie' => $categorie
    ];
    $this->view('pages/shop',$data);
  }
public function Addtocart($id){
    $pro = $this->productModel->getSingle($id);
    $data = [
      'id_client' => $_SESSION['username']->id,
      'id_produit' => $id,
      'prix' => $pro->prix,
    ];
    $this->productModel->addProduct($data);
    $categorie = $this->productModel->getCategories();
    $product = $this->productModel->getProduct();
    $data = [
        'products' => $product,
        'categorie' => $categorie
    ];
    $this->view('pages/shop',$data);
  }
public function orders(){
  $total = 0;
  $order = $this->order->getOrder($this->id);
  $data = array();
  foreach($order as $order){
    $orderProducts = $this->order->getProducts($order->id_order);
    $products = array();
    foreach( $orderProducts as  $orderProducts){
      $total = $total + $orderProducts->prix;
      $product = [
        'name' => $orderProducts->name,
      ];
      array_push($products ,$product);
    }
    $orders = [
      'id' => $order->id_order,
      'total' => $total,
      'etas' => $order->etas,
      'products' => $products,
      'date' => $order->date_creation
    ];
    array_push($data,$orders);
  }
  $this->view('pages/orders', $data);
  }
public function cart(){
    $cart = $this->order->getCart($_SESSION['username']->id);
    $totalproduit = 0;
    foreach($cart as $produit) {
      $totalproduit = $produit->prix_q + $totalproduit;
    }
    $data = [
       'cart' => $cart ,
       'total' => $totalproduit
    ];
    $this->view('pages/cart', $data);
  }
public function confirm(){
        $this->order->addorder();
        $order = $this->order->order();
        $data = [
          'client' => $this->id
        ];
        $products = $this->productModel->productsCARD($data); 
        foreach($products as $product){
          $data = [
            'order' => $order->id_order,
            'prix' => $product->prix_q,
            'id_produit' => $product->id,
            'quantity' => $product->quantity,
          ];
          $this->order->ligncommande($data);
        }
        $this->order->vidercart();
        redirect('/client/orders');
  }
public function deleteproduct($id){
    $this->order->deleteproduct($id,$_SESSION['username']->id);
    $cart = $this->order->getCart($_SESSION['username']->id);
    $data = [
        'cart' => $cart,
        'total' => '' 
     ];
 
     $this->view('pages/cart', $data);
  }
public function details($id = null){
    if($id == null){
      redirect('/client');
    }
    $product = $this->productModel->getSingle($id);
    $data = [
      'product' => $product
    ];
    $this->view('pages/details', $data);
  }

public function detailorder($id = null){
 if($id == null){
  redirect('/client');
 }
 $total = 0;
 $order = $this->order->single($id);
 $orderProducts = $this->order->getProducts($id);
 $products = array();
 foreach( $orderProducts as  $orderProducts){
   $total = $total + $orderProducts->prix_q;
   $product = [
     'name' => $orderProducts->name,
     'image' => $orderProducts->image,
     'quantity' => $orderProducts->quantity,
     'prix' => $orderProducts->prix_q
   ];
   array_push($products ,$product);
 }
 $data = [
    'Nom' => $order->Nom, 
    'email' => $order->email, 
    'tele' => $order->tele,
    'Adress' => $order->Adress,
   'id' => $id,
   'total' => $total,
   'etas' => $order->etas,
   'products' => $products,
   'date' => $order->date_creation
 ];
  
  $this->view('pages/detailorder', $data);
  }
} 