<?php
if (isset($message) && !empty($message)) {
    if ($message == "SignUp") {
        echo '<meta http-equiv="refresh" content="5;url=' . URL_AUTH_Profile . '">';
    } else if ($message == 'Email') {
        echo '<meta http-equiv="refresh" content="5;url=' . URL_AUTH_Login . '">';
    } else if ($message == 'Error') {
        echo '<meta http-equiv="refresh" content="5;url=' . URL_AUTH_SignUp . '">';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wow Planner</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../src/style/auth.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <?php
        if (isset($message) && !empty($message)) {
            if ($message == "SignUp") {
                echo 'You are successfully registered. You will be redirected to your profile page!';
            } else if ($message == 'Email') {
                echo 'There is already a registered user with this email address. You will be redirected to the login page!';
            } else if ($message == 'Error') {
                echo 'Error processing the form. Please try again!';
            }
        }
        ?>
    </div>
</body>

</html>
