<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="container mt-5">

    <?php
    //On crée les variables du formulaire vide
    $nom = "";
    $nbPersonnes = "";
    $genre = "";
    $image = "";

    //On crée les variables d'erreurs vides
    $nomErreur = "";
    $nbPersonnesErreur = "";
    $genreErreur = "";
    $imageErreur = "";

    //Autres variables pour gérer les erreurs
    $regexLettres = "^[a-zA-z]+ ( [\s] [a-zA-Z]+)^$";

    //La variable qui permet de savoir s'il y a au moins une erreur dans le formulaire
    $erreur = false;

    //Variables connexion
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "groupe_de_musique";
    //Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    //Check connection
    if (!$conn) {
        die("Connectionfailed:" . mysqli_connect_error());
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['nom'])) {
            $nomErreur = "Le nom est requis";
            $erreur = true;
        } else {
            $nom = test_input($_POST['nom']);
        }

        if (empty($_POST['nbPersonnes'])) {
            $nbPersonnesErreur = "Le nombre de personnes est requis";
            $erreur = true;
        } elseif ($nbPersonnes <= 1 || preg_match('/' . $regexLettres . '/', $_POST['nbPersonnes'])) {
            $nbPersonnesErreur = "Veuillez inscrire un nombre de personnes supérieur à 1";
        } else {
            $nbPersonnes = test_input($_POST['nbPersonnes']);
        }

        if (empty($_POST['genre'])) {
            $genreErreur = "Le genre est requis";
            $erreur = true;
        } else {
            $genre = test_input($_POST['genre']);
        }
        if (empty($_POST['image'])) {
            $imageErreur = "Le lien pour un avatar est requis";
            $erreur = true;
        } else {
            $image = test_input($_POST['image']);
        }
        if (!$erreur) {
            $sql = "INSERT INTO groupe (nom,nb_personnes, genre, img)
        VALUES ('" . $_POST['nom'] . "', " . $_POST['nbPersonnes'] . ", '" . $_POST['genre'] . "', '" . $_POST['image'] . "')";
            if (mysqli_query($conn, $sql)) {
                echo "Enregistrement réussi";
                header("Location: ajouter.php");
    ?>
                <!-- TOASTS -->
                <!-- Contenu du toast groupe supprimé -->
                <article class="position-fixed bottom-0 start-50 translate-middle-x mb-3" style="z-index: 10">
                    <div id="toast" class="toast bg-primary text-white" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <p class="me-auto"> Confirmation</p>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <p class="m-0">Le groupe a bien été ajouté</p>
                        </div>
                    </div>
                </article> <!-- Fin toast -->
                </div>
        <?php
            } else {
                echo "Error:" . $sql . "<br>" . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }



    if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div>
                <label for="">Nom du groupe :</label>
                <input type="text" class="form-control" name="nom" value="<?php echo $nom; ?>">
                <span class="text-danger"><?php echo $nomErreur; ?></span>
            </div>

            <div>
                <label for="">Nombre de personnes :</label>
                <input type="number" name="nbPersonnes" class="form-control" value="<?php echo $nbPersonnes; ?>">
                <span class="text-danger"><?php echo $nbPersonnesErreur; ?></span>
            </div>

            <div>
                <label for="">Genre : </label>
                <input type="text" class="form-control" name="genre" value="<?php echo $genre; ?>">
                <span class="text-danger"><?php echo $genreErreur; ?></span>

            </div>

            <div>

                <label for="">Image:</label>
                <input type="text" class="form-control" name="image" value="<?php echo $image; ?>">
                <span class="text-danger"><?php echo $imageErreur; ?></span>
            </div>


            <div class="col-6 mt-5">
                <input id="ajouter" class="btn btn-primary" type="submit" value="Ajouter le groupe">
            </div>
        </form>
        <div class="col-6 mt-5">
            <a class="btn btn-success" href="index.php">Retour</a>
        </div>

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
</body>

</html>