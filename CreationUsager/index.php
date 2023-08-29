<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
  <?php
  //On crée les variables du formulaire vide
  $nomUsager = "";
  $mdp = "";
  $confirmationMdp = "";
  $courriel = "";
  $avatar = "";
  $genre = "";
  $ddn = "";
  $moyenDeTransport = "";


  //On crée les variables d'erreurs vides
  $nomUsagerErreur = "";
  $mdpErreur = "";
  $confirmationMdpErreur = "";
  $courrielErreur = "";
  $avatarErreur = "";
  $genreErreur = "";
  $ddnErreur = "";
  $moyenDeTransportErreur = "";

  //La variable qui permet de savoir s'il y a au moins une erreur dans le formulaire
  $erreur = false;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "POST";
    //Si on entre, on est dans l'envoie du formulaire

    if (empty($_POST['nomUsager'])) {
      $nomUsagerErreur = "Le nom est requis";
      $erreur = true;
    } elseif (empty($_POST['mdp'])) {
      $mdpErreur = "Le mot de passe est requis";
      $erreur = true;
    } elseif (empty($_POST['confirmationMdp'])) {
      $confirmationMdpErreur = "Le mot de passe est requis";
      $erreur = true;
    } elseif (empty($_POST['courriel'])) {
      $courrielErreur = "Le courriel est requis";
      $erreur = true;
    } elseif (empty($_POST['avatar'])) {
      $avatarErreur = "Le lien pour un avatar est requis";
      $erreur = true;
    } elseif (empty($_POST['genre'])) {
      $genreErreur = "Le genre est requis";
      $erreur = true;
    } elseif (empty($_POST['ddn'])) {
      $ddbErreur = "La date de naissance est requise";
      $erreur = true;
    } elseif (empty($_POST['moyenDeTransport'])) {
      $moyenDeTransportErreur = "Le mot de passe est requis";
      $erreur = true;
    } else {
      $nomUsager = test_input($_POST["nomUsager"]);
      $mdp = test_input($_POST["mdp"]);
      $confirmationMdp = test_input($_POST["confirmationMdp"]);
      $courriel = test_input($_POST["courriel"]);
      $avatar = test_input($_POST["avatar"]);
      $genre = test_input($_POST["genre"]);
      $ddn = test_input($_POST["ddn"]);
      $moyenDeTransport = test_input($_POST["moyenDeTransport"]);
    }
   
    // Inserer dans la base de données
    //SI erreurs, on réaffiche le formulaire 
  }
  if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {
    echo "Erreur ou 1ere fois";

  ?>
    <form class="row g-3 needs-validation" novalidate>
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Nom d'usager</label>
        <input type="text" class="form-control" name="nomUsager" required>

      </div>
      <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" name="mdp" required>
        <div class="valid-feedback">
          Looks good!
          <!-- mettre ma variable -->
        </div>

      </div>

      <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Confirmation du mot de passe</label>
        <input type="password" class="form-control" name="confirmationMdp" required>
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
      <div class="col-md-4">
        <label for="validationCustomUsername" class="form-label">Courriel</label>
        <div class="input-group has-validation">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
          <input type="email" class="form-control" name="courriel" aria-describedby="inputGroupPrepend" required>
          <div class="invalid-feedback">
            Veuillez entrer votre mot de passe
          </div>
        </div>

      </div>
      <div class="col-md-6">
        <label for="validationCustom03" class="form-label">Avatar</label>
        <input type="text" class="form-control" name="avatar" required>
        <div class="invalid-feedback">
          Veuillez insérer un lien pour votre avatar.
        </div>
      </div>
      <div class="col-md-3">

        <fieldset>
          <div>
            <label for="validationCustom04" class="form-label">Genre</label>
          </div>
          <div>
            <label for="">Féminin</label>
            <input type="radio" name="genre" id="Feminin">
          </div>

          <div>
            <label for="">Masculin</label>
            <input type="radio" name="genre" id="Masculin">
          </div>
          <div>
            <label for="">Non-genré</label>
            <input type="radio" name="genre" id="Non-genre">
          </div>

          <div class="invalid-feedback">
            Veuillez sélectionner un genre.
          </div>
        </fieldset>
      </div>
      <div class="col-md-3">
        <label for="validationCustom05" class="form-label">Date de naissance</label>
        <input type="date" class="form-control" name="ddn" required>
        <div class="invalid-feedback">
          Veuillez entrer une date de naissance
        </div>
      </div>

      <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Moyen de transport</label>
        <select class="form-select" name="moyenDeTransport" required>
          <option selected disabled value="">...</option>
          <option value="1">Voiture</option>
          <option value="2">Autobus</option>
          <option value="3">Marche</option>
          <option value="4">Vélo</option>
        </select>
        <div class="invalid-feedback">
          Veuillez sélectionner un moyen de transport.
        </div>
      </div>


      <div class="col-12">
        <input type="submit" value="Créer votre compte">
      </div>
    </form>
  <?php
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = addslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  ?>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>