<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="container">

    <?php
    //On crée les variables du formulaire vide
    $nom = "";
    $nb_personnes = "";
    $genre = "";
    $image = "";

    //On crée les variables d'erreurs vides
    $nomUsagerErreur = "";
    $nb_personnesErreur = "";
    $genreErreur = "";
    $imageErreur = "";

    //La variable qui permet de savoir s'il y a au moins une erreur dans le formulaire
    $erreur = false;

    //Variables connexion
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "groupe_de_musique";
    //Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    //Check connection
    if (!$conn) {
        die("Connectionfailed:" . mysqli_connect_error());
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['nom'])) {
            $nomUsagerErreur = "Le nom est requis";
            $erreur = true;
        } elseif (empty($_POST['nbPersonnes'])) {
            $avatarErreur = "Le lien pour un avatar est requis";
            $erreur = true;
        } elseif (empty($_POST['genre'])) {
            $genreErreur = "Le genre est requis";
            $erreur = true;
        } elseif (empty($_POST['image'])) {
            $ddbErreur = "La date de naissance est requise";
            $erreur = true;
        } else {
            $nom = test_input($_POST["nom"]);
            $nb_personnes= test_input($_POST["nbPersonnes"]);
            $genre = test_input($_POST["genre"]);
            $image = test_input($_POST["image"]);
        }
    }
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {
    ?>
        <form action="" method="POST">
            <label for="">Nom du groupe :</label>
            <input type="text" class="form-control" name="nom">

            <label for="">Nombre de personnes :</label>
            <input type="number" name="nbPersonnes" id="" class="form-control">

            <label for="">Genre : </label>
            <input type="text" class="form-control" name="genre">

            <label for="">Image:</label>
            <input type="text" class="form-control" name="image">

        </form>
    <?php
        $sql = "INSERT INTO groupe (nom,nb_personnes, genre, img)
    VALUES ('" . $_POST['nom'] . "', '" . $_POST['nbPersonnes'] . "', '" . $_POST['genre'] . "', '" . $_POST['image'] . "')";
        echo $sql;
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = addslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (mysqli_query($conn, $sql)) {
        echo "Enregistrement réussi";
    } else {
        echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    ?>

</body>

</html>