<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db = "chiens";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);
    }
    echo "Connected successfully";

    $sql = "SELECT id, marque FROM autos";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Marque: " . $row["marque"].  "<br>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>
    

    ?>



</body>

</html>