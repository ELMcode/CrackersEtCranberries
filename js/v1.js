// Authentification.js
// Authentification.js -> AuthentificationCTRL.php -> AuthentificationView.php

function init() {
  console.log("init");
  // Pré-remplissage des champs de saisie pour faciliter les tests
  document.getElementById("emailClient").value = "test@gmail.com";
  document.getElementById("mdpClient").value = "test59";

  // Ajout des écouteurs d'événements sur les éléments du formulaire
  document
    .getElementById("chkPwdVisible")
    .addEventListener("click", afficherMasquerMdp);
  document.getElementById("btConnect").addEventListener("click", valider);
}

function afficherMasquerMdp() {
  // Affiche ou masque le mot de passe en fonction de l'état de la case à cocher
  if (document.getElementById("chkPwdVisible").checked) {
    document.getElementById("mdpClient").type = "text";
  } else {
    document.getElementById("mdpClient").type = "password";
  }
}

function valider() {
  console.log("valider");
  // Récupération des valeurs des champs de saisie
  let email = document.getElementById("emailClient").value;
  let mdp = document.getElementById("mdpClient").value;

  // Vérification si les champs sont vides
  if (email === "" || mdp === "") {
    document.getElementById("lblMessage").innerHTML =
      "<p class='alert alert-danger mt-3'>Toutes les saisies sont obligatoires.</p>";
  } else {
    // Création de l'objet FormData avec les données du formulaire
    let formData = new FormData();
    formData.append("emailClient", email);
    formData.append("mdpClient", mdp);
    formData.append("btConnectHidden", "true");

    // Envoi de la requête AJAX pour la validation de l'authentification du back (AuthentificationCTRL.php)
    fetch("../controllers/AuthentificationCTRL.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        // echo json_encode($response); dans AuthentificationCTRL.php

        if (response.ok) {
          return response.json();
        } else {
          throw new Error("Erreur lors de la requête AJAX");
        }
      })
      .then((data) => {
        // Affichage d'un message de succès si l'authentification réussit (lblMessage dans AuthentificationView.php)
        if (data.success) {
          document.getElementById("lblMessage").innerHTML =
            "<p class='alert alert-success mt-3'>Connexion réussie.</p>";

          // Soumission du formulaire pour que les données soient traitées côté serveur
          document.getElementById("formLogin").submit();

          // Redirection vers AuthentificationCodeCTRL.php après que le formulaite a été soumis (si redirection dans AuthentificationCTRL.php, erreur Ajax JSON)

          window.location.href = "../controllers/AuthentificationCodeCTRL.php";
        } else {
          // Affichage d'un message d'erreur si l'authentification échoue
          document.getElementById("lblMessage").innerHTML =
            "<p class='alert alert-danger mt-3'>Problème de connexion, vérifiez vos identifiants.</p>";
        }
      })
      .catch((error) => {
        console.error("Erreur lors de la requête AJAX :", error);
      });
  }
  event.preventDefault(); // Empêche le comportement par défaut du formulaire, car on veut gérer ca via requete AJAX
}

window.onload = init;
