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
    $_SESSION['user'] = $user;
    $user_id = $user->getId();
    $nextEvents = $this->userRepository->findNextEvents($user_id);
    $_SESSION['next_events'] = $nextEvents;
    $threeCharacters = $this->userRepository->findThreeCharacters($user_id);
    $_SESSION['three_characters'] = $threeCharacters;
    echo $this->render('Profile');
  }

  public function indexUser()
  {
    echo $this->render('User');
  }

  public function indexUserEdit()
  {
    echo $this->render('Edit');
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

  public function editProfile()
  {
    if (isset($_POST) && !empty($_POST)) {
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $email = htmlspecialchars($_POST['email']);
      $password = htmlspecialchars($_POST['password']);
      $guild = htmlspecialchars($_POST['guild']);

      $oldEmail = $_SESSION['user']->getMail();
      $user_id = $_SESSION['user']->getId();

      if (empty($password)) {
        $password_hashed = $_SESSION['user']->getMdp();
      } else if (strlen($password) <= 7) {
        $password_hashed = $_SESSION['user']->getMdp();
      } else {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
      }

      if ($oldEmail == $email) {
        $this->userRepository->update($user_id, $pseudo, $email, $password_hashed, $guild);
        echo '<meta http-equiv="refresh" content="0;url=' . URL_AUTH_Profile . '">';
      } else {
        $this->userRepository->update($user_id, $pseudo, $email, $password_hashed, $guild);
        session_destroy();
        echo '<meta http-equiv="refresh" content="0;url=' . URL_HOMEPAGE . '">';
      }
    } else {
      echo '<meta http-equiv="refresh" content="0;url=' . URL_AUTH_Profile . '">';
    }
  }

  public function deleteProfile() {
    $user_id = $_SESSION['user']->getId();
    $this->userRepository->delete($user_id);
    session_destroy();
    echo '<meta http-equiv="refresh" content="0;url=' . URL_HOMEPAGE . '">';
  }
}
