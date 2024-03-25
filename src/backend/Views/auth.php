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
            echo "<p> $message </p>";
        }
        ?>
    </div>
</body>

</html>