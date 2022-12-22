<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      $data = [
      ];
     
      $this->view('pages/index', $data);
    }

    public function login(){
      $data = [
      ];

      $this->view('pages/login', $data);
    }
  }