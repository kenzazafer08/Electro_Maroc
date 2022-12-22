<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
     
      $this->view('pages/index');
    }

    public function login(){
      $data = [
      ];

      $this->view('pages/login', $data);
    }
    public function register(){
      $data = [
      ];

      $this->view('pages/register', $data);
    }
  }