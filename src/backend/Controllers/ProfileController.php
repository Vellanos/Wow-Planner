<?php

require_once __DIR__ . '/../Services/Response.php';

class ProfileController
{
  use Response;

  public function index()
  {
    echo $this->render('Profile');
  }

  public function not_found_404()
  {
    echo $this->render('404');
  }
}