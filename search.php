<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche d'animaux disponible(s)</title>
    <link rel="stylesheet" href="style-main.css">
</head>
<body id="top">
<nav>
    <ul class="menu">
        <li><a href="Index.html" title="Visitez la page principale pour consulter les animaux disponibles">Consultation</a>
        </li>
        <li><a href="form-adoption.html"
               title="Faire un ajout dans notre liste d'animaux adoptifs">
                Mise en adoption</a></li>
        <li>
            <form action="search.php" method="POST">
                <label for="search">Recherche:</label>
                <input type="text" id="search" name="search">
                <label for="envoyer"></label>
                <input type="submit" id="envoyer" value="Valider">
            </form>
        </li>
        <li><a class="logo" href="https://github.com/Nami-R2301/INF3190_A2020"
               target="_blank"
               title="Cliquez ici pour consulté/contribué à la création du site web">
                <img alt="logo Github" height="16px" src="https://image.flaticon.com/icons/png/512/25/25231.png"
                     width="20px"></a></li>
        <li><a class="logo" href="https://etudier.uqam.ca/programme?code=7617#bloc_presentation"
               target="_blank"
               title="Cliquez ici pour visité notre établissement de travail">
                <img alt="logo université UQÀM"
                     src="https://events.grenadine.co/wp-content/uploads/UQAM-Logo.png" width="35px"></a></li>
    </ul>
</nav>
<section class="main">
    <div class="right-bg"></div>
    <div class="left-bg"></div>
    <a href="https://pixabay.com/fr/photos/animaux-chiens-cat-jouer-2222007/"
       target="_blank" title="Cliquez ici pour télécharger l'image">
        <img alt="Pleins de chiens et chat un à côté de l'autre." class="image-intro"
             src="https://cdn.pixabay.com/photo/2017/04/11/15/55/animals-2222007_960_720.jpg"></a>
</section>
<h1 class="remerciements">Animaux trouvé(s) :</h1>

<?php

$info = "";
$search = "";

$fichier = fopen( 'animaux.csv', 'r' );
$listeAnimaux = explode( "\n", fread( $fichier, filesize( 'animaux.csv' ) ) );
array_splice( $listeAnimaux, 0, 1 );
fclose( $fichier );

$search = $_POST["search"];
$infoAnimal = array();

if ( $search != "" ) {

    $search = strtoupper( $search );
    foreach ( $listeAnimaux as $infoAnimal ) {

        if ( stristr( $infoAnimal, $search ) ) {
            $infoAnimal = explode( ",", $infoAnimal, 10 );
            echo "<p class='main'>" . $infoAnimal[1] . " :  " . $infoAnimal[5] . '</p>';
        }
    }
} ?>
</body>
</html>