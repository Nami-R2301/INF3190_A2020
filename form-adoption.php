<?php
$nomAnimal = "";
$typeAnimal = "";
$race = "";
$ageAnimal = "";
$descriptionT = "";
$courrielProp = "";
$adresse = "";
$adresseCivique = "";
$adresseVille = "";
$adresseCp = "";
$valide = true;
$message = "";
$log = "";

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

    if ( !isset( $nomAnimal ) || !isset( $typeAnimal ) || !isset( $race ) || !isset( $ageAnimal )
        || !isset( $descriptionT ) || !isset( $courrielProp ) || !isset( $adresse ) ) {
        http_response_code( 400 );
        exit;
    }

    $nomAnimal = $_POST["nomAnimal"];
    $typeAnimal = $_POST["typeAnimal"];
    $race = $_POST["race"];
    $ageAnimal = intval( $_POST["ageAnimal"] );
    $descriptionT = $_POST["descriptionT"];
    $courrielProp = $_POST["courrielProp"];
    $adresse = $_POST["adresseAnimal"];

    if ( empty( $nomAnimal ) || empty( $typeAnimal ) || empty( $race ) || empty( $ageAnimal )
        || empty( $courrielProp ) || empty( $adresse ) ) {
        $valide = false;
    } else if ( strpos( $nomAnimal, ',' ) !== false || strpos( $typeAnimal, ',' ) !== false
        || strpos( $race, ',' ) !== false || strpos( $ageAnimal, ',' ) !== false
        || strpos( $courrielProp, ',' ) !== false || strpos( $adresse, ',' ) !== false ) {
        $valide = false;
    } else if ( strlen( $nomAnimal ) < 3 || strlen( $nomAnimal ) > 20 ) {
        $valide = false;
    } else if ( $ageAnimal < 0 || $ageAnimal > 30 ) {
        $valide = false;
    }


    if ( empty( $adresse ) || preg_match('([0-9]{1,6}\040([A-Za-z\-]*\040)+[HJG][0-9][A-Z]\040*[0-9][A-Z][0-9])', $adresse) == 0 ) {
        $valide = true;
    } else {
        $adresseCivique = substr( $adresse, 0,strpos( $adresse, "\040" ) - 1 );
        $adresseVille = substr( $adresse, strpos( $adresse, "\040" ) + 1, strlen( $adresse ) - 1 );
        $adresseCp = substr( $adresse, strrpos( $adresse, "\040") + 1, strlen( $adresse ) - 1 );
    }

    $log = $nomAnimal . "," . $typeAnimal . "," . $race . "," . $ageAnimal . "," .
        $descriptionT . "," . $courrielProp . "," . $adresseCivique . "," . $adresseVille . "," . $adresseCp . ".\n";

    if ( $valide ) {
        $fichier = fopen("animaux.csv", "a");
        fwrite($fichier, $log);
        fclose($fichier);
        header("Location: Confirmation.php?nomAnimal={$nomAnimal}&typeAnimal={$nomAnimal}", true, 303);
        exit;
    } else {
        http_response_code( 307 );
    }
}