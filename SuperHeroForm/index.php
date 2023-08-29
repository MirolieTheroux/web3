<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super hero form</title>

</head>
<body>

<?php  
$nomErreur = "" ;
$erreur = false;
if($_SERVER["REQUEST_METHOD"]== "POST"){
    //Si on entre, on est dans l'envoi du formulaire
   

    if(emoty($_POST["name"])){
        $nomErreur = "Le nom est requis" ;
        $erreur = true;
    }
    //Il y plein d'autres choses à valider (elseif)
    else{
        $name = test_input($_POST["name"]);
    }
    $name = test_input($_POST["name"]);
    $image = test_input($_POST["image"]);

    //Inserer dans la base de données
    //Si erreurs, on réaffiche le formulaire en indiquant les erreurs survenues
}
elseif($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true){
    echo "POST = false" . $_SERVER["REQUEST_METHOD"]== "POST"
}
else{

?>
    <form action="resultats.php" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="POST">
        Nom du super-héro : <input type="text" name="name"> <br>
        URL de l'image : <input type="text" name="image">

        <input type="submit">
    </form>

    <form action="resultatsGET.php" method="GET">
        Nom du super-héro : <input type="text" name="name"> <br>
        URL : <input type="text" name="url">

        <input type="submit">
    </form>
    <?php
}

function test_input($data){
$data = trim($data);
$data = addcslashes($data); 
$data = htmlspecialchars($data);//< &lt
return $data;

}
?>
</body>
</html>