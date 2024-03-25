function validateForm() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
  
    var isValid = true;
  
    // Réinitialiser les messages d'erreur
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";
  
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
  
    return isValid;
  }
  
  function submitForm() {
    if (validateForm()) {
      document.querySelector("form").submit();
    }
  }
  