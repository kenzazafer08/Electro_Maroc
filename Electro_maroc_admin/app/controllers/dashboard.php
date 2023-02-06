<?php
  class Dashboard extends Controller {
    public $productModel;
    public $orderModel;
    public $userModel;
    public function __construct(){
        if(!isLoggedIn($_SESSION['username'])){
            redirect('/Login');
        }else{
        $this->productModel = $this->model('product');
        $this->orderModel = $this->model('order');
        $this->userModel = $this->model('client');
        }
     } 
public function index(){

  $products = $this->productModel->countproduct();
  $orders = $this->orderModel->countorder();
  $users = $this->userModel->countuser();
  $nproducts = $products['total'];
  $norders = $orders['total'];
  $nusers = $users['total'];
  $data = [
    'nproducts' => $nproducts,
    'norders' => $norders,
    'nusers' => $nusers
  ];
  $this->view('pages/dashbord', $data);
  }
  public function Products(){
    $products = $this->productModel->getProduct();
    $data = [
      'delete' =>'',
      'products' => $products
      ];
   
    $this->view('pages/products', $data);
  }
  public function clients(){
    $clients = $this->userModel->getUsers();
    $data = [
      'clients' => $clients
      ];
   
    $this->view('pages/clients', $data);
  }
  public function Orders(){
    $orders = $this->orderModel->getOrder();
    $orderProducts = $this->orderModel->getProducts();
    $data = [
      'orders' => $orders,
      'products' => $orderProducts
      ];
    $this->view('pages/orders', $data);
  }
  public function Addproduct(){
    $categorie = $this->productModel->getCategories();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $image = $_FILES['image'];
      //process form
      $image_dir = "./../public/img/upload/";
      move_uploaded_file($image['tmp_name'], $image_dir . $image['name']);
      $imagepath = $image['name'];
      $data = [
          'name' => $_POST['name'],
          'disc' => $_POST['disc'],
          'prix' => $_POST['prix'],
          'cat' => $_POST['cat'],
          'image' =>$imagepath,
          'categories' => $categorie,
          'add' => '', 
      ]; 
           if($this->productModel->addProduct($data)){
            $data = [
              'name' => '',
              'disc' => '',
              'prix' => '',
              'cat' => '',
              'image' => '',
              'categories' => $categorie,
              'add' => 'Product added succesfuly', 
          ];
          $this->view('pages/addproducts', $data);
           }
        else{
          $data['add'] = 'something went wrong !';
        $this->view('pages/addproducts', $data);
        }
   }
   $data = [
    'name' => '',
    'disc' => '',
    'prix' => '',
    'cat' => '',
    'image' => '',
    'categories' => $categorie,
    'add' => '', 
    ];

    $this->view('pages/addproducts', $data);
  }
  public function edit($id = null){
    if($id ==null || $this->productModel->getSingleProduct($id) == null){
      redirect('dashboard');
    }
    $product = $this->productModel->getSingleProduct($id);
    $categorie = $this->productModel->getcategories();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      //process form
      $data = [
        'id' => $id,
        'name' => $_POST['name'],
        'disc' => $_POST['disc'],
        'prix' => $_POST['prix'],
        'cat' => $_POST['cat'],
        'cat_name' => $product->nom,
        'image' => '',
        'categories' => $categorie,
        'add' => '',
      ];
       if(!empty($_FILES['image']['name'])){
        $image = $_FILES['image'];
      $image_dir = "./../public/img/upload/";
      move_uploaded_file($image['tmp_name'], $image_dir . $image['name']);
      $imagepath = $image['name'];
            $data += [
              'image' => $imagepath
            ];
          }else{
            $data +=[
              'image' => $product->image
            ];
          }
          $done =  $this->productModel->edit($data);
          if($done){
          $data = [
            'id' => $id,
            'name' => $product->name,
            'disc' => $product->description,
            'prix' => $product->prix,
            'cat' => $product->id_categorie,
            'cat_name' => $product->nom,
            'image' => $product->image,
            'categories' => $categorie,
            'add' => 'Product edited succesfuly',
          ];
          $this->view('pages/edit', $data);
           }else{
            $data['Add'] = 'something went wrong !';
          $this->view('pages/edit', $data);
        }
        }
    $data = [
      'id' => $id,
      'name' => $product->name,
      'disc' => $product->description,
      'prix' => $product->prix,
      'cat' => $product->id_categorie,
      'cat_name' => $product->nom,
      'image' => $product->image,
      'categories' => $categorie,
      'add' => '',
    ];
  
    $this->view('pages/edit', $data);
  }
  public function delete($id = null){
    if($id ==null || $this->productModel->getSingleProduct($id) == null){
      redirect('dashboard');
    }
    $done = $this->productModel->delete($id);
    $products = $this->productModel->getProduct();
    if($done){
      $data = [  
    'delete' => 'Product deleted succesfuly',
    'products' => $products ,
    ];
    $this->view('pages/products', $data);
    }else{
      $data=[
        'delete' => 'Something went wrong',
        'products' => $products ,
      ];
      $this->view('pages/products', $data);
    }
  }
  public function validation($id = null){
    if($id ==null || $this->orderModel->getSingleOrder($id) == null){
      redirect('dashboard');
    }
    $done = $this->orderModel->valider($id);
    $orders = $this->orderModel->getOrder();
    if($done){
      $data = [  
    'orders' => $orders ,
    ];
    $this->view('pages/orders', $data);
    }else{
      $data=[
        'products' => $orders ,
      ];
      $this->view('pages/orders', $data);
    }
  }
  public function anulation($id = null){
    if($id ==null || $this->productModel->getSingleOrder($id) == null){
      redirect('dashboard');
    }
    $done = $this->productModel->annuler($id);
    $orders = $this->productModel->getOrder();
    if($done){
      $data = [  
    'products' => $orders ,
    ];
    $this->view('pages/orders', $data);
    }else{
      $data=[
        'products' => $orders ,
      ];
      $this->view('pages/orders', $data);
    }
  }
}