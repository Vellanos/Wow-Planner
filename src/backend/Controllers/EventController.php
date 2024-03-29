<?php

require_once __DIR__ . '/../Services/Response.php';
require_once __DIR__ . '/../Repositories/EventRepository.php';
// require_once __DIR__ . '/../Repositories/UserRepository.php';
// require_once __DIR__ . '/../Repositories/PersonnageRepository.php';
// require_once __DIR__ . '/../Repositories/ClasseRepository.php';

class EventController
{
  use Response;
  private $eventRepositry;
//   private $userRepository;
//   private $personnageRepository;
//   private $classeRepository;

  public function __construct()
  {
    $this->eventRepositry = new EventRepository();
    // $this->userRepository = new UserRepository();
    // $this->personnageRepository = new PersonnageRepository();
    // $this->classeRepository = new ClasseRepository();
  }

  public function index()
  {
    $user_id = $_SESSION['user']->getId();
    $myEvents = $this->eventRepositry->findMyEvents($user_id);
    $_SESSION['myEvents'] = $myEvents;
    $myOldEvents = $this->eventRepositry->findMyOldEvents($user_id);
    $_SESSION['myOldEvents'] = $myOldEvents;
    echo $this->render('Events');
  }

//   public function indexCreate()
//   {
//     $allClass = $this->classeRepository->findAll();
//     $_SESSION['allClass'] = $allClass;
//     echo $this->render('CreateCharacter');
//   }

//   public function indexDetails($characterId)
//   {
//     $character = $this->personnageRepository->findOneById($characterId);
//     $_SESSION['detailsCharacter'] = $character;
//     echo $this->render('DetailsCharacter');
//   }

//   public function indexEdit()
//   {
//     $allClass = $this->classeRepository->findAll();
//     $_SESSION['allClass'] = $allClass;
//     echo $this->render('EditCharacter');
//   }

//   public function Create()
//   {
//     if (isset($_POST) && !empty($_POST)) {
//       $nom = htmlspecialchars($_POST['nom']);
//       $classe_id = htmlspecialchars($_POST['Classe']);

//       $user_id = $_SESSION['user']->getId();

//       $this->personnageRepository->create($nom, $classe_id, $user_id);

//       echo '<meta http-equiv="refresh" content="0;url=' . URL_AUTH_Profile . '/Characters">';
//     } else {
//       echo '<meta http-equiv="refresh" content="0;url=' . URL_AUTH_Profile . '/Characters/Create">';
//     }
//   }

//   public function editCharacter()
//   {
//     if (isset($_POST) && !empty($_POST)) {
//       $name = htmlspecialchars($_POST['name']);
//       $classe = htmlspecialchars($_POST['classe']);
//       $user_id = $_SESSION['user']->getId();
//       $idCharacter = $_SESSION['detailsCharacter']['id'];

//       $this->personnageRepository->update($idCharacter, $name, $classe, $user_id);

//       echo '<meta http-equiv="refresh" content="0;url=' . URL_AUTH_Profile . "/Character/Details?id=" . $_SESSION['detailsCharacter']['id'] . '">';
//     } else {
//       echo '<meta http-equiv="refresh" content="0;url=' . URL_AUTH_Profile . "/Character/Details?id=" . $_SESSION['detailsCharacter']['id'] . '">';
//     }
//   }

//   public function deleteCharacter() {
//     $idCharacter = $_SESSION['detailsCharacter']['id'];
//     $this->personnageRepository->delete($idCharacter);
//     echo '<meta http-equiv="refresh" content="0;url=' . URL_AUTH_Profile . "/Characters" . '">';
//   }
}
