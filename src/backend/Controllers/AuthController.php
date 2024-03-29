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
        $confirmPassword = htmlspecialchars($_POST['Confirmpassword']);

        if ($password === $confirmPassword) {
          $user = $this->userRepository->findByEmail($email);

          if (!$user) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $this->userRepository->create($pseudo, $email, $password_hash, $guild);

            $message = 'SignUp';
            $_SESSION['authenticated_user'] = $email;
            echo $this->render('auth', ['message' => $message]);
            exit();
          } else {
            $message = 'Email';
            echo $this->render('auth', ['message' => $message]);
            exit();
          }
        } else {
          $message = "Password";
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

  public function fLogin()
  {
    if (isset($_POST) && !empty($_POST)) {

      if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $user = $this->userRepository->findByEmail($email);
        if (!$user) {
          $message = "InvalidEmail";
          echo $this->render('auth', ['message' => $message]);
          exit();
        }

        $password_hash = $user->getMdp();

        if (session_status() !== PHP_SESSION_ACTIVE) {
          session_start();
        }

        if (password_verify($password, $password_hash)) {
          $_SESSION['authenticated_user'] = $user->getMail();
          $message = 'Login';
          echo $this->render('auth', ['message' => $message]);
          exit();
        } else {
          $_SESSION['authenticated_user'] = null;
          $message = 'ErrorLogin';
          echo $this->render('auth', ['message' => $message]);
          exit();
        }
      } else {
        $message = "ErrorFormLogin";
        echo $this->render('auth', ['message' => $message]);
        exit();
      }
    } else {
      $message = "ErrorFormLogin";
      echo $this->render('auth', ['message' => $message]);
      exit();
    }
  }
}
