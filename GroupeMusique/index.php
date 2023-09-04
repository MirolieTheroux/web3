<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Script pour Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous" defer></script>
    <script src="js/script.js" defer></script>
</head>

<body>
    <header>
        <h1 class="text-center pt-3 pb-3 mb-3 bg-info">
            Liste des groupes de musique
        </h1>
    </header>
    <main class="container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "groupe_de_musique";
        //Createconnection
        $conn = new mysqli($servername, $username, $password, $dbname);
        //Checkconnection
        if ($conn->connect_error) {
            die("Connectionfailed:" . $conn->connect_error);
        }
        // echo "Connexion réussie";

        //string de requête
        $sql = "SELECT * FROM groupe ";
        $conn->query('SET NAMES utf8');

        //L'action la query est ici
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Nombre de personnes</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $row['id'] ?></th>
                            <td><?php echo $row['nom'] ?></td>
                            <td><?php echo $row['nb_personnes'] ?></td>
                            <td><?php echo $row['genre'] ?></td>
                            <td><img src="<?php echo $row['img'] ?>" alt="image du groupe" class="w-25 rounded"></td>
                            <td><a class="btn btn-primary" href="modifier.php?id=<?php echo $row['id'] ?>">Modifier</a></td>
                            <td><a id="tSupprimer" class="btn btn-danger" href="supprimer.php?id=<?php echo $row['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg></a></td>

                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>

            <a class="btn btn-success" href="ajouter.php">Ajouter un groupe</a>

            <!-- TOASTS -->
            <!-- Contenu du toast groupe supprimé -->
            <article class="position-fixed bottom-0 start-50 translate-middle-x mb-3" style="z-index: 10">
                <div id="toast-S" class="toast bg-primary text-white" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <p class="me-auto"> Confirmation</p>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        <p class="m-0">Le groupe a bien été supprimé</p>
                    </div>
                </div>
            </article> <!-- Fin toast -->

         

            <!-- TOASTS -->
            <!-- Contenu du toast groupe modifié -->
            <article class="position-fixed bottom-0 start-50 translate-middle-x mb-3" style="z-index: 10">
                <div id="toast-M" class="toast bg-primary text-white" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <p class="me-auto"> Confirmation</p>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        <p class="m-0">Le groupe a bien été modifié</p>
                    </div>
                </div>
            </article> <!-- Fin toast -->
        <?php
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>


    </main>

    <?php
    // Emplacement de votre fichier SCSS et CSS
    $scssFile = 'css/styles.scss';
    $cssFile = 'css/styles.css';

    // Commande pour compiler SCSS en CSS
    $command = "sass $scssFile $cssFile";

    // Exécutez la commande SCSS depuis PHP
    shell_exec($command);

    // Inclure le fichier CSS généré dans votre HTML
    echo '<link rel="stylesheet" href="' . $cssFile . '">';

    // Reste de votre code PHP
    ?>

</body>

</html>