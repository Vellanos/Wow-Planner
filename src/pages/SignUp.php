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
  <link rel="stylesheet" href="../style/signUp.css">
</head>

<body>
  <div class="container">
    <div class="row center-screen">
      <div class="col-md-4">
        <form method="POST" action="../backend/treatment/treatmentSignUp.php" onsubmit="return submitForm()">
          <h2 class="mb-5 text-center">Sign Up</h2>
          <div class="form-group mb-4 text-center">
            <input type="text" class="form-control" id="pseudo" placeholder="pseudo" required>
            <small id="pseudoError" class="form-text text-danger "></small>
          </div>
          <div class="form-group mb-4 text-center">
            <input type="text" class="form-control" id="guild" placeholder="guild's name">
            <small id="guildError" class="form-text text-danger"></small>
          </div>
          <div class="form-group mb-4 text-center">
            <input type="email" class="form-control" id="email" placeholder="email" required>
            <small id="emailError" class="form-text text-danger"></small>
          </div>
          <div class="form-group mb-4 text-center">
            <input type="password" class="form-control" id="password" placeholder="password" required>
            <small id="passwordError" class="form-text text-danger"></small>
          </div>
          <div class="form-group mb-4 text-center">
            <input type="password" class="form-control" id="confirmPassword" placeholder="confirm password" required>
            <small id="confirmPasswordError" class="form-text text-danger"></small>
          </div>
          <div class="text-center d-flex gap-3 justify-content-center">
            <a id="BackHome" href="../../index.php">Back Home</a>
            <button id="Login" type="submit" class="btn btn-block" onclick="return validateForm()">Sign Up</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  <script src="../script/signUp.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>