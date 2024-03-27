<?php

require_once __DIR__ . '/../Services/Response.php';
require_once __DIR__ . '/../Repositories/UserRepository.php';

class ProfileController
{
  use Response;
  private $userRepository;

  public function __construct()
  {
    $this->userRepository = new UserRepository();
  }

  public function index()
  {
    $email = $_SESSION['authenticated_user'];
    $user = $this->userRepository->findByEmail($email);
    $user_id = $user ->getId();
    $nextEvents = $this->userRepository->findNextEvents($user_id);
    $_SESSION['next_events'] = $nextEvents;
    $threeCharacters = $this->userRepository->findThreeCharacters($user_id);
    $_SESSION['three_characters'] = $threeCharacters;
    echo $this->render('Profile');
  }

  public function isLogged()
  {
    if (isset($_SESSION['authenticated_user']) && !empty($_SESSION['authenticated_user'])) {
      $email = $_SESSION['authenticated_user'];

      $user = $this->userRepository->findByEmail($email);
      if (!$user) {
        $_SESSION['authenticated_user'] = null;
        echo '<meta http-equiv="refresh" content="0;url=' . URL_HOMEPAGE . '">';
        exit();
      }
    } else {
      $_SESSION['authenticated_user'] = null;
      echo '<meta http-equiv="refresh" content="0;url=' . URL_HOMEPAGE . '">';
      exit;
    }
  }

  public function logout()
  {
    session_destroy();
    echo '<meta http-equiv="refresh" content="0;url=' . URL_HOMEPAGE . '">';
    exit;
  }
    
}
