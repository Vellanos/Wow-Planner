<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wow Planner</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kurale&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../src/style/profile.css">
</head>

<body>
    <h2 class="text-center section-title">My Next Events</h2>
    <div class="card-wrapper">
        <?php
        $nextEvents = $_SESSION['next_events'];
        if (empty($nextEvents)) {
            echo '<p class="text-center"> No event scheduled at the moment </p>';
        }
        foreach ($nextEvents as $event) : ?>
            <div class="card card-data" style="background-image: url('../src/assets/Raid/<?php echo $event['img']; ?>');">
                <div class="card-body text-center d-flex flex-column justify-content-center align-item-center">
                    <h3 class="card-title"><?php echo $event['nom']; ?></h3>
                    <p class="card-text"><?php echo $event['date']; ?></p>
                    <p class="card-text"><?php echo $event['horaire']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="button-container">
        <a class="button-nav" href=<?php echo URL_AUTH_Profile . "/Events"?>>View All</a>
        <a class="button-nav" href=<?php echo URL_AUTH_Profile . "/Events/Create"?>>New One</a>
    </div>
    <h2 class="text-center section-title">My Characters</h2>
    <div class="card-wrapper">
        <?php
        $threeCharacters = $_SESSION['three_characters'];
        if (empty($threeCharacters)) {
            echo '<p class="text-center"> No character available at the moment. </p>';
        }
        foreach ($threeCharacters as $character) : ?>
            <a href="<?php echo URL_AUTH_Profile . "/Characters/Details?id=" . $character['id']?>" class="card-link">
                <div class="card card-data" style="background-image: url('../src/assets/Class/<?php echo $character['icone']; ?>');">
                    <div class="card-body text-center d-flex flex-column justify-content-center align-item-center">
                        <h3 class="card-title"><?php echo $character['nom']; ?></h3>
                        <p class="card-text"><?php echo $character['name_spec']; ?></p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="button-container">
        <a class="button-nav" href=<?php echo URL_AUTH_Profile . "/Characters" ?>>View All</a>
        <a class="button-nav" href=<?php echo URL_AUTH_Profile . "/Characters/Create"  ?>>New One</a>
    </div>
    <div class="button-container">
        <a class="button-logout" href=<?php echo URL_AUTH_Profile . "/logout" ?>>Logout</a>
        <a class="button-profile" href=<?php echo URL_AUTH_Profile . "/User" ?>>Profile</a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>