<?php

require_once __DIR__ . '/../Services/Response.php';
require_once __DIR__ . '/../Repositories/UserRepository.php';
require_once __DIR__ . '/../Repositories/PersonnageRepository.php';
require_once __DIR__ . '/../Repositories/ClasseRepository.php';

class PersonnageController
{
  use Response;
  private $userRepository;
  private $personnageRepository;
  private $classeRepository;

  public function __construct()
  {
    $this->userRepository = new UserRepository();
    $this->personnageRepository = new PersonnageRepository();
    $this->classeRepository = new ClasseRepository();
  }

  public function index()
  {
    $user_id = $_SESSION['user']->getId();
    $allCharacters = $this->personnageRepository->findAll($user_id);
    $_SESSION['allCharacters'] = $allCharacters;
    echo $this->render('Characters');
  }

  public function indexCreate()
  {
    $allClass = $this->classeRepository->findAll();
    $_SESSION['allClass'] = $allClass;
    echo $this->render('CreateCharacter');
  }

  public function Create()
  {
    if (isset($_POST) && !empty($_POST)) {
      $nom = htmlspecialchars($_POST['nom']);
      $classe_id = htmlspecialchars($_POST['Classe']);

      $user_id = $_SESSION['user']->getId();

      $this->personnageRepository->create($nom, $classe_id, $user_id);

      echo '<meta http-equiv="refresh" content="0;url=' . URL_AUTH_Profile . '/Characters">';

     
    } else {
      echo '<meta http-equiv="refresh" content="0;url=' . URL_AUTH_Profile . '/Characters/Create">';

    }
  }

  

}
