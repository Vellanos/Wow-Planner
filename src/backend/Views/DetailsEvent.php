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
    <link rel="stylesheet" href="../../../src/style/user.css">
</head>

<body>
    <h2 class="text-center">Edit Event</h2>

    <div class="container">
        <?php if(isset($_SESSION['detailsEvent'])): ?>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <ul class="list-group">
                        <li class="list-group-item">Date: <?php echo $_SESSION['detailsEvent']['date']; ?></li>
                        <li class="list-group-item">Time: <?php echo $_SESSION['detailsEvent']['horaire']; ?></li>
                        <li class="list-group-item">Raid: <?php echo $_SESSION['detailsEvent']['nom']; ?></li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="button-container">
        <a class="button-gold" href="<?php echo URL_AUTH_Profile . "/Events"; ?>">Back</a>
        <a class="button-gold" href="<?php echo URL_AUTH_Profile . "/Events/Edit"; ?>">Edit Event</a>
        <a class="button-red" href="<?php echo URL_AUTH_Profile . "/Events/Delete"; ?>">Delete Event</a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
