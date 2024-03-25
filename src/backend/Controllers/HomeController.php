<?php

require_once __DIR__ . '/../Services/Response.php';

class HomeController
{
  use Response;

  public function index()
  {
    echo $this->render('home');
  }

  public function not_found_404()
  {
    echo $this->render('404');
  }
}