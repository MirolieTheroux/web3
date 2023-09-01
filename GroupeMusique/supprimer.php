

<?php
//Variables connexion
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "groupe_de_musique";
$id = $_GET['id'];
//Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//Check connection
if (!$conn) {
    die("Connectionfailed:" . mysqli_connect_error());
}

$sql = "DELETE from groupe where id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Le groupe a été supprimé";
} else {
    echo "Erreur";
}
header("http://localhost/web3/GroupeMusique/index.php");
$conn->close();

?>