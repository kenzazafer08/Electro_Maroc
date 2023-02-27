<?php
  class Pages extends Controller {
    public $productModel;
    public $userModel;
    public $order;
    public function __construct(){
      $this->productModel = $this->model('product');
      $this->userModel = $this->model('user');
      $this->order = $this->model('order');
    }
    
    public function index(){
      $product = $this->productModel->get4Product();
      $data = [
        'login' =>'',
        'products' => $product
      ];
      $this->view('pages/index',$data);
    }

    public function login(){
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = [
            'username' => $_POST['email'],
            'password' => $_POST['password'],
            'username_err' => '',
            'password_err' => '', 
            'login' => ''
        ];
          if(!$this->userModel->findUserByUsername($data['username'])){
              $data['username_err'] = 'User not found';
          }
 
          if (empty($data['username_err']) && empty($data['password_err'])) {
              $loggedInUser = $this->userModel->login($data['username'], $data['password']);
              if($loggedInUser){
                  $this->createUserSession($loggedInUser);
              }else{
                  $data['password_err'] = "Password is incorrect";
                  $this->view('pages/index',$data);
              }
          } else {
              $this->view('pages/login', $data);
          }
      } else {
          $data = [
              'username' => '',
              'password' => '',
              'username_err' => '',
              'password_err' => '',
              'login' => ''
          ];
          $this->view('pages/login', $data);
      }
    }
    public function register(){
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = [
            'name' => $_POST['nom'],
            'password' => $_POST['password'],
            'email' => $_POST['email'],
            'adress' => $_POST['Adress'],
            'phone' => $_POST['phone'],
            'confirm_password' => $_POST['confirm_password'],
            'password_err' => '', 
            'confirm_password_err' => '', 
        ];
        if($data['confirm_password'] != $data['password']){
          $data['confirm_password_err'] = "Passwords doesn't match";
        }
        if(strlen($data['password']) < 8){
          $data['password_err'] = "password must contain more then 8 characters";
        }
        if($data['password_err'] == null && $data['confirm_password_err'] == null){
           if($this->userModel->register($data)){
            $data = [
              'login' => 'Registered succesfuly Login !'
            ];
            $this->view('pages/login', $data);
           }
        }else{
          $this->view('pages/register', $data);
        }
      }else{
        $data = [
          'name' => '',
          'password' => '',
          'email' => '',
          'adress' => '',
          'phone' => '',
          'confirm_password' => '',
          'password_err' => '', 
          'confirm_password_err' => '',  
        ];
  
        $this->view('pages/register', $data);
      }
      
    }
    public function createUserSession($username)
    {
        $_SESSION['username'] = $username;
        redirect('client');
    }
    public function logout(){
      unset($_SESSION['username']);
      session_destroy();
      redirect('Pages');
   }
   public function categorie($name = 0){
    if($name > 0){
      $product = $this->productModel->getProductsbycategorie($name);  
    }else{
      $product = $this->productModel->getProducts();  
    }

    $data = json_encode($product);
    echo $data;
    
  }
  public function Tri($tri = 0){
    if($tri > 0){
      $product = $this->productModel->triProducts($tri);  
    }else{
      $product = $this->productModel->getProducts();  
    }

    $data = json_encode($product);
    echo $data;
  }
  public function quantity(){
      $test = json_decode(file_get_contents("php://input"));
      $product = $this->productModel->getSingle($test->produit);
      $data = [
        'produit' => $test->produit,
        'client' => $test->client,
        'quantity' => $test->quantity,
        'prix' => $product->prix * $test->quantity
      ];
      $this->order->updatecart($data);
      $product = $this->order->getCart($_SESSION['username']->id); 
      echo json_encode($product);
  }
  }