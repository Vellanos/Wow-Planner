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
    <h2 class="text-center"><?php echo $_SESSION['detailsCharacter']['nom']; ?></h2>

    <div class="container">
        <?php if(isset($_SESSION['detailsCharacter'])): ?>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <ul class="list-group">
                        <li class="list-group-item">Class: <?php echo $_SESSION['detailsCharacter']['name_class']; ?></li>
                        <li class="list-group-item">Spec: <?php echo $_SESSION['detailsCharacter']['name_spec']; ?></li>
                        <li class="list-group-item">Role: <?php echo $_SESSION['detailsCharacter']['role']; ?></li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="button-container">
        <a class="button-gold" href="<?php echo URL_AUTH_Profile . "/Characters"; ?>">Back</a>
        <a class="button-gold" href="<?php echo URL_AUTH_Profile . "/Characters/Edit"; ?>">Edit Character</a>
        <a class="button-red" href="<?php echo URL_AUTH_Profile . "/Characters/Delete"; ?>">Delete Character</a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
