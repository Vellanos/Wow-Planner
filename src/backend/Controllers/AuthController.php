<?php

require_once __DIR__ . '/../Services/Response.php';
require_once __DIR__ . '/../Repositories/UserRepository.php';

class AuthController
{
  use Response;
  private $userRepository;

  public function __construct()
  {
    $this->userRepository = new UserRepository();
  }

  public function index_Login()
  {
    echo $this->render('Login');
  }
  
  public function index_SignUp()
  {
    echo $this->render('SignUp');
  }


  public function fSignUp()
  {
    if (isset($_POST) && !empty($_POST)) {

      if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $guild = htmlspecialchars($_POST['guild']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $user = $this->userRepository->findByEmail($email);

        if (!$user) {
          $password_hash = password_hash($password, PASSWORD_DEFAULT);

          $this->userRepository->create($pseudo,$email,$password_hash, $guild);

          $message = 'SignUp';
          echo $this->render('auth', ['message' => $message]);
          exit();
        } else {
          $message = 'Email';
          echo $this->render('auth', ['message' => $message]);
          exit();
        }
      }
    } else {
      $message = "Error";
      echo $this->render('auth', ['message' => $message]);
      exit();
    }
  }
}