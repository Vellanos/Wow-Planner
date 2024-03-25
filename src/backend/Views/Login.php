<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wow planner</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kurale&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../src/style/login.css">
</head>

<body>
  <div class="container">
  <div class="row center-screen text-center">
    <div class="col-md-4">
      <form method="POST" action="<?php  echo URL_AUTH_Login?>/treatment" onsubmit="return submitForm()">
        <h2 class="mb-5 text-center">Login</h2> 
        <div class="form-group mb-4">
          <input type="email" name="email" class="form-control" id="email" placeholder="email">
          <small id="emailError" class="form-text text-danger "></small>
        </div>
        <div class="form-group mb-4">
          <input type="password" name="password" class="form-control" id="password" placeholder="password">
          <small id="passwordError" class="form-text text-danger"></small>
        </div>
        <div class="text-center">
        <a id="BackHome" href=<?php  echo URL_HOMEPAGE?>>Back Home</a>
        <button id="Login" type="submit" class="btn btn-block" onclick="return validateForm()">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
    <script src="../src/script/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>