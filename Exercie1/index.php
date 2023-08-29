<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Exercice 1</title>
</head>
<body>
    <?php
 $aleatoire = random_int(0,2);
 $langue = random_int(0,1);
 $paragrapheMarvelFrancais = "Marvel Worldwide Inc., plus communément appelé Marvel Comics ou simplement Marvel, est une subdivision de Marvel Entertainment et l'une des principales maisons d'édition américaines de comics.";
 $paragrapheMarvelAnglais = "The Marvel Cinematic Universe (MCU) is an American media franchise and shared universe centered on a series of superhero films produced by Marvel Studios. The films are based on characters that appear in American comic books published by Marvel Comics.";
 $paragrapheDCFrancais = "DC Comics est l'une des principales maisons d’édition américaines de comics. DC Comics fait partie du conglomérat WarnerMedia.";
 $paragrapheDCAnglais = "DC Comics, Inc. (doing business as DC) is an American comic book publisher and the flagship unit of DC Entertainment,[6][7] a subsidiary of Warner Bros. Discovery.";
 $paragrapheXmenFrancais ="Les X-Men est le nom d'une équipe de super-héros évoluant dans l'univers Marvel de la maison d'édition Marvel Comics.";
 $paragrapheXmenAnglais = "The X-Men are a superhero team appearing in American comic books published by Marvel Comics.";
 if($aleatoire == 0 && $langue == 0){
    echo "<h1>MARVEL</h1> <br>";
    echo "<p>" . $paragrapheMarvelFrancais . "</p> <br>";
    echo "<img src='img/th.jpg' alt='personnage favori marvel'>";
 }
 elseif($aleatoire == 0 && $langue == 1){
    echo "<h1>MARVEL</h1> <br>";
    echo "<p>" . $paragrapheMarvelAnglais . "</p> <br>";
    echo "<img src='img/th.jpg' alt='personnage favori marvel'>";
 }
if($aleatoire == 1 && $langue == 0){
echo "<h1> DC </h1> <br>";
    echo "<p>" . $paragrapheDCFrancais . "</p> <br>";
    echo " <img src='img/thumb-1920-928322.jpg' alt='personnage favori dc'>";
}elseif($aleatoire == 1 && $langue == 1){
     echo "<h1> X-MEN</h1> <br>";
     echo "<p>" . $paragrapheDCAnglais . "</p> <br>";
     echo "<img src='img/thumb-1920-928322.jpg' alt='personnage favori xmen'>";
} 

if($aleatoire == 2 && $langue == 0){
    echo "<h1>X-MEN</h1> <br>";
    echo "<p>" . $paragrapheXmenFrancais . "</p> <br>";
    echo "<img src='img/3186146-xmen.jpg' alt='personnage favori xmen'>";
}
elseif($aleatoire == 2 && $langue == 1){
    echo "<h1>X-MEN</h1> <br>";
    echo "<p>" . $paragrapheXmenAnglais . "</p> <br>";
    echo "<img src='img/3186146-xmen.jpg' alt='personnage favori xmen'>";
}

 ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>