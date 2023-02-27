<?php
  class Dashboard extends Controller {
    public $productModel;
    public $orderModel;
    public $userModel;
    public $categorieModel;
    public function __construct(){
        if(!isLoggedIn($_SESSION['username'])){
            redirect('/Login');
        }else{
        $this->productModel = $this->model('product');
        $this->orderModel = $this->model('order');
        $this->userModel = $this->model('client');
        $this->categorieModel = $this->model('categorie');
        }
     } 
public function index(){
  $categorie = $this->productModel->getCategories();
  $products = $this->productModel->countproduct();
  $orders = $this->orderModel->countorder();
  $users = $this->userModel->countuser();
  $nproducts = $products['total'];
  $norders = $orders['total'];
  $nusers = $users['total'];
  $data = [
    'categories' => $categorie,
    'nproducts' => $nproducts,
    'norders' => $norders,
    'nusers' => $nusers,
    'cat' => '',
    'method' => 'addcat',
    'cat' => '',
    'id' => '',
    'button' => 'Add'
  ];
  $this->view('pages/dashbord', $data);
  }
  public function addcat(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = $_POST['name_cat']; 
      $this->categorieModel->addCat($name);
      
    }
    $categorie = $this->productModel->getCategories();
    $products = $this->productModel->countproduct();
    $orders = $this->orderModel->countorder();
    $users = $this->userModel->countuser();
    $nproducts = $products['total'];
    $norders = $orders['total'];
    $nusers = $users['total'];

    $data = [
      'categories' => $categorie,
      'nproducts' => $nproducts,
      'norders' => $norders,
      'nusers' => $nusers,
      'cat' => '',
      'method' => 'addcat',
      'cat' => '',
      'id' => '',
      'button' => 'Add'
    ];
    $this->view('pages/dashbord', $data);
    }
    public function editcat($id){
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name_cat']; 
        $this->categorieModel->edit($name,$id);
        $categorie = $this->productModel->getCategories();
        $products = $this->productModel->countproduct();
        $orders = $this->orderModel->countorder();
        $users = $this->userModel->countuser();
        $nproducts = $products['total'];
        $norders = $orders['total'];
        $nusers = $users['total'];

        $data = [
          'categories' => $categorie,
          'nproducts' => $nproducts,
          'norders' => $norders,
          'nusers' => $nusers,
          'cat' => '',
          'method' => 'addcat',
          'cat' => '',
          'id' => '',
          'button' => 'Add'
        ];
        $this->view('pages/dashbord', $data);
      }else{
        $cat = $this->categorieModel->getSingleCat($id);
        $categorie = $this->productModel->getCategories();
        $products = $this->productModel->countproduct();
        $orders = $this->orderModel->countorder();
        $users = $this->userModel->countuser();
        $nproducts = $products['total'];
        $norders = $orders['total'];
        $nusers = $users['total'];
    
        $data = [
          'categories' => $categorie,
          'nproducts' => $nproducts,
          'norders' => $norders,
          'nusers' => $nusers,
          'cat' => '',
          'method' => 'editcat',
          'cat' => $cat->nom,
          'id' => $cat->id_cat,
          'button' => 'Update'
        ];
        $this->view('pages/dashbord', $data);
      }
      }
  public function deletecat($id = null){
        if($id ==null || $this->productModel->getSingleProduct($id) == null){
          redirect('dashboard');
        }
        $done = $this->categorieModel->delete($id);
        $Dproducts = $this->productModel->catdelete($id);
        $categorie = $this->productModel->getCategories();
        $products = $this->productModel->countproduct();
        $orders = $this->orderModel->countorder();
        $users = $this->userModel->countuser();
        $nproducts = $products['total'];
        $norders = $orders['total'];
        $nusers = $users['total'];

        $data = [
          'categories' => $categorie,
          'nproducts' => $nproducts,
          'norders' => $norders,
          'nusers' => $nusers,
          'cat' => '',
          'method' => 'addcat',
          'cat' => '',
          'id' => '',
          'button' => 'Add'
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
    $total = 0;
  $order = $this->orderModel->getOrder();
  $data = array();
  foreach($order as $order){
    $orderProducts = $this->orderModel->getProducts($order->id_order);
    $products = array();
    foreach( $orderProducts as  $orderProducts){
      $total = $total + $orderProducts->prix ;
      $name =  $orderProducts->name;
      array_push($products ,$name);
    }
    $orders = [
      'id' =>$order->id_order,
      'Nom' => $order->Nom,
      'total' => $total,
      'etas' => $order->etas,
      'products' => $products,
      'date' => $order->date_creation
    ];
    array_push($data,$orders);
  }
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
    if($id ==null ){
      redirect('dashboard');
    }
    $this->orderModel->valider($id);
    $total = 0;
  $order = $this->orderModel->getOrder();
  $data = array();
  foreach($order as $order){
    $orderProducts = $this->orderModel->getProducts($order->id_order);
    $products = array();
    foreach( $orderProducts as  $orderProducts){
      $total = $total + $orderProducts->prix ;
      $name =  $orderProducts->name;
      array_push($products ,$name);
    }
    $orders = [
      'id' =>$order->id_order,
      'Nom' => $order->Nom,
      'total' => $total,
      'etas' => $order->etas,
      'products' => $products,
      'date' => $order->date_creation
    ];
    array_push($data,$orders);
  }
  $this->view('pages/orders', $data);
  }
  public function anulation($id = null){
    if($id ==null ){
      redirect('dashboard');
    }
    $this->orderModel->annuler($id);
    $total = 0;
    $order = $this->orderModel->getOrder();
    $data = array();
    foreach($order as $order){
      $orderProducts = $this->orderModel->getProducts($order->id_order);
      $products = array();
      foreach( $orderProducts as  $orderProducts){
        $total = $total + $orderProducts->prix ;
        $name =  $orderProducts->name;
        array_push($products ,$name);
      }
      $orders = [
        'id' =>$order->id_order,
        'Nom' => $order->Nom,
        'total' => $total,
        'etas' => $order->etas,
        'products' => $products,
        'date' => $order->date_creation
      ];
      array_push($data,$orders);
    }
    $this->view('pages/orders', $data);
  }
  public function detailorder($id = null){
    if($id == null){
     redirect('/client');
    }
    $total = 0;
    $order = $this->orderModel->single($id);
    $orderProducts = $this->orderModel->getProducts($id);
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