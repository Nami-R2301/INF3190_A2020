<?php
require 'form-adoption.html';

$nomAnimal = "";
$typeAnimal = "";
$race = "";
$ageAnimal = "";
$descriptionT = "";
$courrielProp = "";
$adresseAnimal = "";

$valide = true;
$message = "";
$log = "";

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

    if ( !isset( $nomAnimal ) || !isset( $typeAnimal ) || !isset( $race ) || !isset( $ageAnimal )
        || !isset( $descriptionT ) || !isset( $courrielProp ) || !isset( $adresseAnimal ) ) {
        http_response_code( 400 );
        exit;
    }

    $nomAnimal = $_POST["nomAnimal"];
    $typeAnimal = $_POST["typeAnimal"];
    $race = $_POST["race"];
    $ageAnimal = intval( $_POST["ageAnimal"] );
    $descriptionT = $_POST["description"];
    $courrielProp = $_POST["courrielProp"];
    $adresseAnimal = $_POST["adresseAnimal"];


    $log = "Parent: " . $nomAnimal . ", " . "Enfant: " . $typeAnimal . ", " . "Age: " .
        $descriptionT . ", " . "Ecole " . $race . " ," . $courrielProp . " ," . $adresseAnimal . ".\n";


    if ( !empty( $nomAnimal ) && !empty( $typeAnimal ) && !empty( $race ) && !empty( $ageAnimal )
        && !empty( $courrielProp ) && !empty( $adresseAnimal ) ) {
        $valide = false;
    } else if ( strpos( $nomAnimal, ',' ) !== false || strpos( $typeAnimal, ',' ) !== false
        || strpos( $race, ',' ) !== false || strpos( $ageAnimal, ',' ) !== false
        || strpos( $courrielProp, ',' ) !== false || strpos( $adresseAnimal, ',' ) !== false ) {
        $valide = false;
    } else if ( strlen( $nomAnimal ) < 3 || strlen( $nomAnimal ) > 20 ) {
        $valide = false;
    } else if ( $ageAnimal > 0 || $ageAnimal < 30 ) {
        $valide = false;
    }

    if ( $valide ) {
        $fichier = fopen("plaintes.txt", "a");
        fwrite($fichier, $log);
        fclose($fichier);
        header("Location: confirmation.php?nom={$typeAnimal}&prenom={$nomAnimal}", true, 303);
        exit;
    } else {
        http_response_code( 307 );
    }
}