function validateForm() {
  var pseudo = document.getElementById("pseudo").value;
  var guild = document.getElementById("guild").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirmPassword").value;

  var isValid = true;

  // Réinitialiser les messages d'erreur
  document.getElementById("pseudoError").innerHTML = "";
  document.getElementById("guildError").innerHTML = "";
  document.getElementById("emailError").innerHTML = "";
  document.getElementById("passwordError").innerHTML = "";
  document.getElementById("confirmPasswordError").innerHTML = "";

  // Validation pseudo
  if (pseudo.length < 3 || pseudo.length > 50) {
    document.getElementById("pseudoError").innerHTML =
      "Le prénom doit contenir entre 3 et 50 caractères.";
    isValid = false;
  }

  // Validation du nom guilde
  if (guild === "") {
    isValid = true;
  } else if ((guild.length < 3 && guild.length > 0) || guild.length > 50) {
    document.getElementById("guildError").innerHTML =
      "Le commentaire doit contenir entre 3 et 50 caractères.";
  }

  // Validation de l'email
  if (!/^.{3,80}$/.test(email) || !/\S+@\S+\.\S+/.test(email)) {
    document.getElementById("emailError").innerHTML =
      "Veuillez entrer une adresse email valide contenant entre 3 et 80 caractères.";
    isValid = false;
  }

  // Validation password
  if (password.length <= 7) {
    document.getElementById("passwordError").innerHTML =
      "Le password doit contenir plus de 7 caractères.";
    isValid = false;
  }

  // Validation password
  if (password != confirmPassword) {
    document.getElementById("confirmPasswordError").innerHTML =
      "Passwords not identical.";
    isValid = false;
  }

  return isValid;
}

function submitForm() {
  if (validateForm()) {
    document.querySelector("form").submit();
  }
}
