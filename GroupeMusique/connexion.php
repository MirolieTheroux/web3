<?php
//Démarre la session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <main class="container">


        <?php
        //Variables d'erreurs vides
        $courrielOuUserErreur = "";
        $mdpErreur = "";
        //La variable qui permet de savoir s'il y a au moins une erreur dans le formulaire
        $erreur = false;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


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

            //vérication champs 
            if (empty($_POST['courrielOuUser'])) {
                $courrielOuUserErreur = "Veuillez entrer votre courriel ou nom d'usager";
                $erreur = true;
            } else
                $user = test_input($_POST['courrielOuUser']);
            $email = test_input($_POST['courrielOuUser']);
            if (empty($_POST['mdp'])) {
                $mdpErreur = "Veuillez entrer votre mot de passe";
                $erreur = true;
            } else
                $password = test_input($_POST['mdp']);

            $user = $_POST['courrielOuUser'];
            $email = $_POST['courrielOuUser'];
            $password = $_POST['mdp'];

            $password = sha1($password, false);

            //Vérification si les identifiants sont dans la base de données
            $sql = "SELECT * from usagers where user ='$user' OR email = '$email' AND password='$password'";
            echo $sql;
            $result = $conn->query($sql);

            if (isset($result)) {
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $_SESSION["connexion"] = true;
                    header("Location: index.php");
                    $_SESSION["connexion"] = true;
                    
                } else {
                    echo "<p> Nom d'usager ou mot de passe invalide</p>";
                    $erreur = true;
                }
            }
            $conn->close();
        }

        if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {
        ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <h1>Se connecter</h1>
                <!-- Email ou Username -->
                <div class="form-outline mb-4">
                    <input type="text" id="form2Example1" class="form-control" name="courrielOuUser" placeholder="Courriel ou nom d'usager">
                    <span class="text-danger"><?php echo $courrielOuUserErreur; ?></span>
                </div>

                <!-- Password -->
                <div class="form-outline mb-4">
                    <input type="password" id="form2Example2" class="form-control" name="mdp" placeholder="Mot de passe">
                    <span class="text-danger"><?php echo $mdpErreur; ?></span>
                </div>

                <div class="col">
                    <!-- Lien mdp oublié -->
                    <a href="#!">Mot de passe oublié?</a>
                </div>
                </div>

                <!-- Se connecter submit -->
                <input class="btn btn-primary" type="submit" value="Se connecter">

                <!-- Créer un compte bouton-->
                <div class="text-center">
                    <p><a href="#!">Créer un compte</a></p>
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
    </main>
</body>

</html>