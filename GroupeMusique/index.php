<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="container">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "groupe_de_musique";
    //Createconnection
    $conn = new mysqli($servername, $username, $password, $dbname);
    //Checkconnection
    if ($conn->connect_error) {
        die("Connectionfailed:" . $conn->connect_error);
    }
    echo "Connexion réussie";

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
                        <th scope="row"><?php echo $row["id"] ?></th>
                        <td><?php echo $row["nom"] ?></td>
                        <td><?php echo $row["nb_personnes"] ?></td>
                        <td><?php echo $row["genre"] ?></td>
                        <td><img src="<?php echo $row["img"] ?>" alt="image duu groupe" class="w-25 rounded"></td>

                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>

        <a class="btn btn-success" href="ajouter.php">Ajouter</a>

    <?php
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>

</body>

</html>