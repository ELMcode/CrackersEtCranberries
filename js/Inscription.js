/*
 * Inscription.js
 */
function init() {
  console.log("init");
  document.getElementById("email").value = "test@gmail.com";
  document.getElementById("mdp").value = "test59";
  document.getElementById("btnSubmit").addEventListener("click", (event) => {
    event.preventDefault();
    valider();
  });
}

function valider() {
  console.log("valider");
  const champs = {
    civilite1: document.getElementById("civilite1"),
    civilite2: document.getElementById("civilite2"),
    civilite3: document.getElementById("civilite3"),
    nom: document.getElementById("nom"), // TODO: regex
    prenom: document.getElementById("prenom"), // TODO: regex
    datenaissance: document.getElementById("datenaissance"),
    email: document.getElementById("email"),
    email2: document.getElementById("email2"),
    pseudo: document.getElementById("pseudo"),
    mdp: document.getElementById("mdp"), // TODO: regex
    mdp2: document.getElementById("mdp2"), // TODO: regex
    adresse: document.getElementById("adresse"),
    ville: document.getElementById("ville"),
  };

  let message = "";

  if (
    !champs.civilite1.checked &&
    !champs.civilite2.checked &&
    !champs.civilite3.checked
  ) {
    message +=
      "<p class='alert alert-danger'>Veuillez sélectionner une civilité.</p><br>";
    //les cases à cocher (<input type="checkbox">) ne possèdent pas de valeur , fonction isEmpty ne peut pas fonctionner ici.
  }

  if (isEmpty(champs.nom)) {
    message +=
      "<p class='alert alert-danger'>Le champ 'Nom' est obligatoire.</p><br>";
  }
  if (isEmpty(champs.prenom)) {
    message +=
      "<p class='alert alert-danger'>Le champ 'Prénom' est obligatoire.</p><br>";
  }
  if (isEmpty(champs.datenaissance)) {
    message +=
      "<p class='alert alert-danger'>Le champ 'Date de naissance' est obligatoire.</p><br>";
  }
  if (isEmpty(champs.email)) {
    message +=
      "<p class='alert alert-danger'>Le champ 'E-mail' est obligatoire.</p><br>";
  }
  if (isEmpty(champs.email2)) {
    message +=
      "<p class='alert alert-danger'>Le champ 'Confirmez l'e-mail' est obligatoire.</p><br>";
  }
  if (isEmpty(champs.pseudo)) {
    message +=
      "<p class='alert alert-danger'>Le champ 'Pseudo' est obligatoire.</p><br>";
  }
  if (isEmpty(champs.mdp)) {
    message +=
      "<p class='alert alert-danger'>Le champ 'Mot de passe' est obligatoire.</p><br>";
  }
  if (isEmpty(champs.mdp2)) {
    message +=
      "<p class='alert alert-danger'>Le champ 'Confirmez le mot de passe' est obligatoire.</p><br>";
  }
  if (champs.mdp.value !== champs.mdp2.value) {
    message +=
      "<p class='alert alert-danger'>Les mots de passe ne sont pas identiques.</p><br>";
  }
  if (isEmpty(champs.adresse)) {
    message +=
      "<p class='alert alert-danger'>Le champ 'Adresse' est obligatoire.</p><br>";
  }
  if (isEmpty(champs.ville)) {
    message +=
      "<p class='alert alert-danger'>Le champ 'Ville' est obligatoire.</p><br>";
  }

  document.getElementById("lblMessage").innerHTML = message;

  if (message === "") {
    document.getElementById("formSign").submit();
  }
} // function Valider
// La fonction isEmpty(field) est utilisée pour vérifier si un champ est vide en vérifiant si sa valeur trimmée est égale à une chaîne vide.
function isEmpty(field) {
  return field.value.trim() === "";
}

window.onload = init;
