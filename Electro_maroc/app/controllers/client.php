<?php
  class Client extends Controller {
    public $productModel;
    public $order;
    public function __construct(){
        if(!isset($_SESSION['username'])){
            $data = [
                'login' => 'LogIn First',
                'password_err' => '',
                'username_err' => '',
            ];
        
            $this->view('pages/login', $data);
          
        }else{
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
    $this->productModel->addProduct($id);
    $categorie = $this->productModel->getCategories();
    $product = $this->productModel->get4Product();
    $data = [
        'products' => $product,
        'categorie' => $categorie
    ];
    $this->view('pages/shop',$data);
  }
  public function orders(){
    $data = [
    ];

    $this->view('pages/orders', $data);
  }
  public function cart(){
    $cart = $this->order->getCart($_SESSION['username']->id);
    $data = [
       'cart' => $cart 
    ];

    $this->view('pages/cart', $data);
  }
  public function confirm($id){
    $this->order->vidercart($id);
    $cart = $this->order->getCart($_SESSION['username']->id);
    $data = [
        'cart' => $cart 
     ];
 
     $this->view('pages/cart', $data);
  }
} 