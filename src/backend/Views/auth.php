<?php
if (isset($message) && !empty($message)) {
    if ($message == "SignUp" || $message == "Login") {
        echo '<meta http-equiv="refresh" content="3;url=' . URL_AUTH_Profile . '">';
    } else if ($message == 'Email') {
        echo '<meta http-equiv="refresh" content="3;url=' . URL_AUTH_Login . '">';
    } else if ($message == 'Error') {
        echo '<meta http-equiv="refresh" content="3;url=' . URL_AUTH_SignUp . '">';
    } else if ($message == 'InvalidEmail') {
        echo '<meta http-equiv="refresh" content="3;url=' . URL_AUTH_Login . '">';
    } else if ($message == 'ErrorLogin') {
        echo '<meta http-equiv="refresh" content="3;url=' . URL_AUTH_Login . '">';
    } else if ($message == 'ErrorFormLogin') {
        echo '<meta http-equiv="refresh" content="3;url=' . URL_AUTH_Login . '">';
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
            } else if ($message == 'Login') {
                echo 'You are successfully logged in. You will be redirected to your profile page!';
            } else if ($message == 'Email') {
                echo 'There is already a registered user with this email address. You will be redirected to the login page!';
            } else if ($message == 'Error' || $message == 'ErrorFormLogin') {
                echo 'Error processing the form. Please try again!';
            } else if ($message == 'InvalidEmail') {
                echo 'No account is associated with this email. Please try again!';
            } else if ($message == 'ErrorLogin') {
                echo 'Invalid credentials';
            }
        }
        ?>
    </div>
</body>

</html>