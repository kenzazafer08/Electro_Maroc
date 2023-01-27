<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){

      $data = [
        ];
     
      $this->view('pages/index', $data);
    }
    public function dashbord(){

      $data = [
        ];
     
      $this->view('pages/dashbord', $data);
    }
    public function Products(){

      $data = [
        ];
     
      $this->view('pages/products', $data);
    }
    public function Addprices(){

      $data = [
        ];
     
      $this->view('pages/addprices', $data);
    }
    public function Orders(){

      $data = [
        ];
     
      $this->view('pages/orders', $data);
    }
    public function clients(){

      $data = [
        ];
     
      $this->view('pages/clients', $data);
    }
  }