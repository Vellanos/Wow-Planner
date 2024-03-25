<?php

require_once __DIR__ . '/../Services/Response.php';

class AuthController
{
  use Response;

  public function index_Login()
  {
    echo $this->render('Login');
  }
  
  public function index_SignUp()
  {
    echo $this->render('SignUp');
  }
}