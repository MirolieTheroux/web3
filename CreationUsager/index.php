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
  <header>
    <h1 class="text-center pt-3 pb-3 mb-3 bg-info">
      Création de votre usager
    </h1>
  </header>

  <main class="container">


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

    //Variables autres erreurs
    $SLAY = "Shany";
    $dateAujourdhui = date("Y-m-d");
    $regexDate = "^[0-9]{4}-(((0[13578]|(10|12))-(0[1-9]|[1-2][0-9]|3[0-1]))|(02-(0[1-9]|[1-2][0-9]))|((0[469]|11)-(0[1-9]|[1-2][0-9]|30)))^$";

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
      // echo "POST";
      //Si on entre, on est dans l'envoie du formulaire

      //Vérification si le champ est vide et si l'usager shany est déjà pris case non sensible 
      if (empty($_POST['nomUsager'])) {
        $nomUsagerErreur = "Le nom est requis";
        $erreur = true;
      } elseif (strtolower($_POST['nomUsager']) == strtolower($SLAY)) {
        $nomUsagerErreur = "Ce nom d'usager est déjà pris";
        $erreur = true;
      } else {
        $nomUsager = test_input($_POST["nomUsager"]);
      }

      //Vérification si les champs mdp sont vides et si les 2 sont identiques
      if (empty($_POST['mdp'])) {
        $mdpErreur = "Le mot de passe est requis";
        $erreur = true;
      } else {
        $mdp = test_input($_POST["mdp"]);
      }

      if (empty($_POST['confirmationMdp'])) {
        $confirmationMdpErreur = "Le mot de passe est requis";
        $erreur = true;
      } elseif ($_POST['mdp'] != $_POST['confirmationMdp']) {
        $confirmationMdpErreur = "Les mots de passe ne sont pas identiques";
        $erreur = true;
      } else {
        $confirmationMdp = test_input($_POST["confirmationMdp"]);
      }


      //Vérification si le champ courriel est vide et s'il contient bien un @
      if (empty($_POST['courriel'])) {
        $courrielErreur = "Le courriel est requis";
        $erreur = true;
      } elseif (!filter_var($_POST['courriel'], FILTER_VALIDATE_EMAIL)) {
        $courrielErreur = "Le format du courriel est invalide";
      } else {
        $courriel = test_input($_POST["courriel"]);
      }

      //Vérification si les autres champs sont vides
      if (empty($_POST['avatar'])) {
        $avatarErreur = "Le lien pour un avatar est requis";
        $erreur = true;
      } else {
        $avatar = test_input($_POST["avatar"]);
      }

      if (empty($_POST['genre'])) {
        $genreErreur = "Le genre est requis";
        $erreur = true;
      } else {
        $genre = test_input($_POST["genre"]);
      }
      if (empty($_POST['ddn'])) {
        $ddnErreur = "La date de naissance est requise";
        $erreur = true;
      } elseif ($_POST['ddn'] > $dateAujourdhui) {
        $ddnErreur = "La date de naissance est invalide";
        $erreur = true;
      } elseif (preg_match('/' . $regexDate . '/', $_POST['ddn'])) {
        $ddnErreur = "La date de naissance est invalide";
        $erreur = true;
      } else {
        $ddn = test_input($_POST["ddn"]);
      }

      if (empty($_POST['moyenDeTransport'])) {
        $moyenDeTransportErreur = "Le moyen de transport est requis";
        $erreur = true;
      } else {
        $moyenDeTransport = test_input($_POST["moyenDeTransport"]);
      }

      // Inserer dans la base de données
      //SI erreurs, on réaffiche le formulaire 
    }

    if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {
      // echo "Erreur ou 1ere fois";

    ?>
      <form class="row g-3 needs-validation" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="col-md-4">
          <label for="validationCustom01" class="form-label">Nom d'usager</label>
          <input type="text" class="form-control" name="nomUsager" value="<?php echo $nomUsager; ?>" maxlength="25" required>
          <span class="text-danger"><?php echo $nomUsagerErreur; ?></span>

        </div>
        <div class="col-md-4">
          <label for="validationCustom02" class="form-label">Mot de passe</label>
          <input type="password" class="form-control" name="mdp" required>
          <span class="text-danger"><?php echo $mdpErreur; ?></span>
        </div>

        <div class="col-md-4">
          <label for="validationCustom02" class="form-label">Confirmation du mot de passe</label>
          <input type="password" class="form-control" name="confirmationMdp" required>
          <span class="text-danger"><?php echo $confirmationMdpErreur; ?></span>
        </div>

        <div class="col-md-6">
          <label for="validationCustomUsername" class="form-label">Courriel</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="email" class="form-control" name="courriel" value="<?php echo $courriel; ?>" aria-describedby="inputGroupPrepend" required>
            <span class="text-danger"><?php echo $courrielErreur; ?></span>
          </div>

        </div>
        <div class="col-md-6">
          <label for="validationCustom03" class="form-label">Avatar</label>
          <input type="text" class="form-control" name="avatar" value="<?php echo $avatar; ?>" required>
          <span class="text-danger"><?php echo $avatarErreur; ?></span>
        </div>

        <div class="col-md-4">
          <div>
            <label for="validationCustom04" class="form-label">Genre</label>
          </div>

          <input type="radio" name="genre" <?php if (isset($_POST['genre']) && $_POST['genre'] == "Feminin") echo "checked"; ?> value="Feminin" id="Feminin">
          <label for="Feminin">Féminin</label>

          <input type="radio" name="genre" <?php if (isset($_POST['genre']) && $_POST['genre'] == "Masculin") echo "checked"; ?> value="Masculin" id="Masculin">
          <label for="Masculin">Masculin</label>

          <input type="radio" name="genre" <?php if (isset($_POST['genre']) && $_POST['genre'] == "NonGenre") echo "checked"; ?> value="NonGenre" id="NonGenre">
          <label for="NonGenre">Non-genré</label><br>
          <span class="text-danger"><?php echo $genreErreur; ?></span>

        </div>


        <div class="col-md-4">
          <label for="validationCustom05" class="form-label">Date de naissance</label>
          <input type="date" class="form-control" name="ddn" value="<?php echo $ddn; ?>" required>
          <span class="text-danger"><?php echo $ddnErreur; ?></span>
        </div>

        <div class="col-md-4">
          <label for="validationCustom04" class="form-label">Moyen de transport</label>
          <select class="form-select" name="moyenDeTransport" required>
            <option selected disabled value="">...</option>
            <option value="Voiture" <?php if (isset($_POST['moyenDeTransport']) && $_POST['moyenDeTransport'] == "Voiture") echo "selected"; ?>>Voiture</option>
            <option value="Autobus" <?php if (isset($_POST['moyenDeTransport']) && $_POST['moyenDeTransport'] == "Autobus") echo "selected"; ?>>Autobus</option>
            <option value="Marche" <?php if (isset($_POST['moyenDeTransport']) && $_POST['moyenDeTransport'] == "Marche") echo "selected"; ?>>Marche</option>
            <option value="Vélo" <?php if (isset($_POST['moyenDeTransport']) && $_POST['moyenDeTransport'] == "Vélo") echo "selected"; ?>>Vélo</option>
          </select>
          <span class="text-danger"><?php echo $moyenDeTransportErreur; ?></span>
        </div>

        <div class="col-12">

          <input type="submit" value="Créer un nouvel usager">


        </div>
      </form>

    <?php
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && $erreur == false) {
    ?>
      <div class="card" style="width: 18rem;">
        <img src="<?php echo $avatar; ?>" class="card-img-top" alt="avatar de l'utilisateur">
        <div class="card-body">
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"> Nom d'usager : <?php echo $nomUsager; ?></li>
          <li class="list-group-item"> Courriel : <?php echo $courriel; ?></li>
          <li class="list-group-item">Genre: <?php echo $genre; ?></li>
          <li class="list-group-item">Date de naissance : <?php echo $ddn; ?></li>
          <li class="list-group-item">Moyen de transport : <?php echo $moyenDeTransport; ?></li>

        </ul>

      </div>


      <a href="index.php">
        <button class="btn btn-primary mt-4">
          Créer un nouvel usager
        </button>
      </a>


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



  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>