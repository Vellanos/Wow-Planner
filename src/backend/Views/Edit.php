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
    <link rel="stylesheet" href="../../../src/style/edit.css">
</head>

<body>
    <h2 class="text-center">Edit My Profile</h2>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="<?php echo URL_AUTH_Profile . "/User/Edit/treatment" ?>" method="POST">
                    <div class="form-group">
                        <label for="pseudo">Pseudo:</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?php echo $_SESSION['user']->getPseudo(); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['user']->getMail(); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="guild">Guild:</label>
                        <input type="text" class="form-control" id="guild" name="guild" value="<?php echo $_SESSION['user']->getGuild(); ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="Confirmpassword">Confirm password:</label>
                        <input type="password" class="form-control" id="Confirmpassword" name="Confirmpassword">
                    </div>
                    <div class="text-center d-flex justify-content-center align-items-center">
                        <div class="button-container">
                            <button type="submit" class="button-gold">Edit</button>
                            <a class="button-red" href="<?php echo URL_AUTH_Profile . "/User" ?>">Cancel</a>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>