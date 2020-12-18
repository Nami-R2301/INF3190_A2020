<?php
$nomAnimal = "";
$typeAnimal = "";
$race = "";
$ageAnimal = "";
$description = "";
$courrielProp = "";
$adresseAnimal = "";

$message = "";
$log = "";
$success = false;

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

    if ( !isset( $nomAnimal ) || !isset( $typeAnimal ) || !isset( $race ) || !isset( $ageAnimal )
        || !isset( $description ) || !isset( $courrielProp ) || !isset( $adresseAnimal ) ) {
        http_response_code( 400 );
        exit;
    }

    $nomAnimal = $_POST["nomParent"];
    $typeAnimal = $_POST["nomEnfant"];
    $description = $_POST["ageEnfant"];
    $race = $_POST["ecoleEnfant"];
    $courrielProp = $_POST["courrielProp"];
    $adresseAnimal = $_POST["adresseAnimal"];


    $log = "Parent: " . $nomAnimal . ", " . "Enfant: " . $typeAnimal . ", " . "Age: " .
        $description . ", " . "Ecole " . $race . " ," . $courrielProp . " ," . $adresseAnimal . ".\n";


    if ( !empty( $nomAnimal ) && !empty( $typeAnimal ) && !empty( $race ) && !empty( $ageAnimal )
        && !empty( $courrielProp ) && !empty( $adresseAnimal )
        && strpos( $nomAnimal, ',' ) === false
        && strpos( $typeAnimal, ',' ) === false
        && strpos( $race, ',' ) === false
        && strpos( $ageAnimal, ',' ) === false
        && strpos( $courrielProp, ',' ) === false
        && strpos( $adresseAnimal, ',' ) === false ) {

        $success = true;
    }

    if ($success) {
        $fichier = fopen("plaintes.txt", "a");
        fwrite($fichier, $log);
        fclose($fichier);
        header("Location: confirmation.php?nom={$typeAnimal}&prenom={$nomAnimal}", true, 303);
        exit;
    }

} ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire d'adoption</title>
    <link rel="stylesheet" id="style" href="style-form-adoption.css">
    <link rel="icon" href="favicon-32x32.png">
    <script src="Animaux.js"></script>
</head>
<body id="top">
<nav>
    <ul class="menu">
        <li><a href="Index.html" title="Visitez la page principale pour consulter les mis à jours">Page principale</a>
        </li>
        <li><a href="Informations.html" title="Allez vers la page qui informe comment utilisé les services">
                Informations</a></li>
        <li><a href="Contact.html" title="Contactez-nous en cliquant sur ce lien">Contact</a></li>
        <li><a href="form-adoption.php"
               title="Faire une demande de remboursement ou faire une requête d'un nouveau service">
                Adoption</a></li>
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
    <div class="left-bg"></div>
    <div class="right-bg"></div>
    <a href="https://pixabay.com/photos/menu-pizza-pasta-vegetables-eat-3206749/"
       title="Cliquez ici pour télécharger l'image."
       target="_blank"> <img class="image-intro"
                             src="https://cdn.pixabay.com/photo/2018/03/07/18/42/menu-3206749_960_720.jpg"
                             alt="Un bloc note avec une page brune sur le dessus avec le mot menu écrit."></a>
    <h1 id="description">Prêt à commander le repas? </h1>
    <section class="description">
        <a href="https://pixabay.com/vectors/plate-dinner-restaurant-food-lunch-303475/"
           title="Cliquez ici pour télécharger l'image."
           target="_blank"> <img class="image-description-right"
                                 src="https://cdn.pixabay.com/photo/2014/04/02/10/19/plate-303475_960_720.png"
                                 alt="Une assiette blanche vide avec des ustensiles sur les côtés."></a>
        <p>D'abord, pourquoi faire des requêtes de repas écolier? La réponse est simple, parce que
            nous voulons nous assurez que tous les enfants aillent des lunchs équitable et sain pour
            les aider à mieux se concentrer en classe! Si jamais vous avez des plaintes concernant la
            qualité de nos repas ainsi que nos habitude d'hygiène et gestion en cuisine, veuillez visiter
            la section <a class="lien-textuel" href="Contact.html" title="Contactez nous en cliquant ce lien">
                contact</a> de notre site web.</p>
    </section>
    <a href="https://cdn.pixabay.com/photo/2016/08/26/15/54/checklist-1622517_960_720.png"
       title="Cliquez ici pour télécharger l'image." target="_blank"> </a>
    <h2 id="form" class="form-titre">Formulaire à remplir :</h2>
    <form name="form" action="form-adoption.php#form" method="POST" onsubmit="return main()">
        <p id="erreurchampsUn"></p>
        <label for="nomParent">Nom du parent :<span class="asterix"> * </span></label>
        <input type='text' id="nomParent" name="nomParent" value=""
               maxlength='40' minlength='2' placeholder='EX: XXXX-XXXX' title='Veuillez inscrire votre nom, svp'>
        <br>
        <p id="erreurchampsDeux"></p>
        <label for="nomEnfant">Nom de l'enfant :<span class="asterix"> * </span></label>
        <?php echo "<input type='text' id='nomEnfant' name='nomEnfant' value='$typeAnimal'
               maxlength='40' minlength='2' placeholder='EX:XXXX-XXXX' title='Veuillez inscrire le nom de lenfant, svp'>"
        ?>
        <br>
        <label for="ageEnfant">Âge de l'enfant<span class="asterix"> * </span></label>
        <select id='ageEnfant' name='ageEnfant' title='Veuillez entrez une âge, svp.'>
            <?php echo "<option value='4' selected>Défault (4)</option>";
            for ( $i = 4 ; $i < 13 ; $i++ ) {
                if ( $i == $description ) {
                    $placeholder = "selected='selected'";
                    echo "<option value='$i' $placeholder>$i</option>";
                } else {
                    echo "<option value='$i'>$i</option>";
                }
            }
            ?>
        </select>
        <br>
        <p id="erreurchampsTrois"></p>
        <label for="ecoleEnfant">Nom de l'école de l'enfant<span class="asterix"> * </span></label>
        <input type='text' id='ecoleEnfant' name='ecoleEnfant' value=''
               placeholder='Ex: École De-la-Rive' title='Veuillez inscrire dans quel école votre enfant est, svp.'>
        <br>
        <label for="envoyer"></label>
        <input type='submit' id='envoyer' value='Envoyer'><br><br>
    </form>
    <p class="remerciements">
        Merci infiniement de votre soutien! Nous vous assurons que votre formulaire sera évalué le plus rapidement
        possible.
    </p>
</section>
<footer>
    <ul>
        <li><a href="#top">Revenir au début de page</a></li>
        <li><a href="#description">Revenir à la description</a></li>
        <li><a href="#form">Revenir au début de formulaire</a></li>
        <li>&copy; Copyright 2020 Lunch Écolier&trade; All Rights Reserved</li>
    </ul>
</footer>
</body>
</html>


