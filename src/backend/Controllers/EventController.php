<?php

require_once __DIR__ . '/../Services/Response.php';
require_once __DIR__ . '/../Repositories/EventRepository.php';
// require_once __DIR__ . '/../Repositories/UserRepository.php';
// require_once __DIR__ . '/../Repositories/PersonnageRepository.php';
// require_once __DIR__ . '/../Repositories/ClasseRepository.php';

class EventController
{
  use Response;
  private $eventRepository;
//   private $userRepository;
//   private $personnageRepository;
//   private $classeRepository;

  public function __construct()
  {
    $this->eventRepository = new EventRepository();
    // $this->userRepository = new UserRepository();
    // $this->personnageRepository = new PersonnageRepository();
    // $this->classeRepository = new ClasseRepository();
  }

  public function index()
  {
    $user_id = $_SESSION['user']->getId();
    $myEvents = $this->eventRepository->findMyEvents($user_id);
    $_SESSION['myEvents'] = $myEvents;
    $myOldEvents = $this->eventRepository->findMyOldEvents($user_id);
    $_SESSION['myOldEvents'] = $myOldEvents;
    echo $this->render('Events');
  }

  public function indexCreate()
  {
    $allRaids = $this->eventRepository->findAllRaids();
    $_SESSION['allRaids'] = $allRaids;
    echo $this->render('CreateEvent');
  }

  public function indexDetails($eventId)
  {
    $event = $this->eventRepository->findOneById($eventId);
    $_SESSION['detailsEvent'] = $event;
    $user_id = $_SESSION['user']->getId();
    $isOld = $this->eventRepository->findIfOld($eventId, $user_id);
    if (!empty($isOld)) {
      echo $this->render('DetailsEvent');
    } else {
      echo '<meta http-equiv="refresh" content="0;url=' . URL_AUTH_Profile . '/Events">';
    }
    
  }

  public function indexEdit()
  {
    $allRaids = $this->eventRepository->findAllRaids();
    $_SESSION['allRaids'] = $allRaids;
    echo $this->render('EditEvent');
  }

  public function Create()
  {
    if (isset($_POST) && !empty($_POST)) {
      $date = htmlspecialchars($_POST['date']);
      $horaire = htmlspecialchars($_POST['horaire']);
      $raid_id = htmlspecialchars($_POST['raid']);

      $user_id = $_SESSION['user']->getId();

      $this->eventRepository->create($date, $horaire, $raid_id, $user_id);

      echo '<meta http-equiv="refresh" content="0;url=' . URL_AUTH_Profile . '/Events">';
    } else {
      echo '<meta http-equiv="refresh" content="0;url=' . URL_AUTH_Profile . '/Events/Create">';
    }
  }

  public function editEvent()
  {
    if (isset($_POST) && !empty($_POST)) {
      $date = htmlspecialchars($_POST['date']);
      $horaire = htmlspecialchars($_POST['horaire']);
      $raid_id = htmlspecialchars($_POST['raid']);
      $user_id = $_SESSION['user']->getId();
      $idEvent = $_SESSION['detailsEvent']['id'];

      $this->eventRepository->update($idEvent, $date, $horaire, $raid_id, $user_id);

      echo '<meta http-equiv="refresh" content="0;url=' . URL_AUTH_Profile . "/Events/Details?id=" . $_SESSION['detailsEvent']['id'] . '">';
    } else {
      echo '<meta http-equiv="refresh" content="0;url=' . URL_AUTH_Profile . "/Events/Details?id=" . $_SESSION['detailsEvent']['id'] . '">';
    }
  }

  public function deleteEvent() {
    $eventId = $_SESSION['detailsEvent']['id'];
    $this->eventRepository->delete($eventId);
    echo '<meta http-equiv="refresh" content="0;url=' . URL_AUTH_Profile . "/Events" . '">';
  }
}
