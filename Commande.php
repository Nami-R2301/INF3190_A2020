<?php
$nomParent = "";
$nomEnfant = "";
$ecoleEnfant = "";
$ageEnfant = 0;
$placeholder = "";
$choixRepasLundi = "";
$choixRepasMardi = "";
$choixRepasMercredi = "";
$choixRepasJeudi = "";
$choixRepasVendredi = "";
$erreurNomParent = "";
$erreurNomEnfant = "";
$erreurEcoleEnfant = "";
$erreurRepasUn = "";
$erreurRepasDeux = "";
$erreurRepasTrois = "";
$erreurRepasQuatre = "";
$erreurRepasCinq = "";
$message = "";
$log = "";
$success = false;

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

    if ( !isset( $nomParent ) || !isset( $nomEnfant ) || !isset( $ecoleEnfant ) || !isset( $ageEnfant )
        || !isset( $choixRepasLundi ) || !isset( $choixRepasMardi ) || !isset( $choixRepasMercredi )
        || !isset( $choixRepasJeudi ) || !isset( $choixRepasVendredi ) ) {
        http_response_code( 400 );
        exit;
    }

    $nomParent = $_POST["nomParent"];
    $nomEnfant = $_POST["nomEnfant"];
    $ageEnfant = $_POST["ageEnfant"];
    $ecoleEnfant = $_POST["ecoleEnfant"];
    $choixRepasLundi = intval( $_POST["choixRepasLundi"] );
    $choixRepasMardi = intval( $_POST["choixRepasMardi"] );
    $choixRepasMercredi = intval( $_POST["choixRepasMercredi"] );
    $choixRepasJeudi = intval( $_POST["choixRepasJeudi"] );
    $choixRepasVendredi = intval( $_POST["choixRepasVendredi"] );
    $log = $nomParent . ", " . $nomEnfant . ", " . $ageEnfant . ", " . $ecoleEnfant . ", "
        . $choixRepasLundi . $choixRepasMardi . $choixRepasMercredi . $choixRepasJeudi .
        $choixRepasVendredi . "\n";


    if ( !empty( $nomParent ) && !empty( $nomEnfant ) && !empty( $ecoleEnfant ) &&
        $choixRepasLundi != 0 && $choixRepasMardi != 0 && $choixRepasMercredi != 0
        && $choixRepasJeudi != 0 && $choixRepasVendredi != 0 ) {
        $success = true;
    }

    if ( empty( $nomParent ) || strpos( $nomParent, ',' ) !== false ) {
        $erreurNomParent = "\tLe champs 'Nom complet du parent' est invalide! Virgules non-permises!";
    }

    if ( empty( $nomEnfant ) || strpos( $nomEnfant, ',' ) !== false ) {
        $erreurNomEnfant = "\tLe champs 'Nom complet de l'enfant' est invalide! Virgules non-permises!";
    }

    if ( empty( $ecoleEnfant ) || strpos( $ecoleEnfant, ',' ) !== false ) {
        $erreurEcoleEnfant = "\tLe champs 'École de l'enfant' est invalide! Virgules non-permises!";
    }

    if ( $choixRepasLundi == 0 ) {
        $erreurRepasUn = "\tLa sélection d'un choix de repas est OBLIGATOIRE!";
    }
    if ( $choixRepasMardi == 0 ) {
        $erreurRepasDeux = "\tLa sélection d'un choix de repas est OBLIGATOIRE!";
    }
    if ( $choixRepasMercredi == 0 ) {
        $erreurRepasTrois = "\tLa sélection d'un choix de repas est OBLIGATOIRE!";
    }
    if ( $choixRepasJeudi == 0 ) {
        $erreurRepasQuatre = "\tLa sélection d'un choix de repas est OBLIGATOIRE!";
    }
    if ( $choixRepasVendredi == 0 ) {
        $erreurRepasCinq = "\tLa sélection d'un choix de repas est OBLIGATOIRE!";
    }

    if ( $success ) {
        $fichier = fopen( "demandeRepas.txt", "a" );
        fwrite( $fichier, $log );
        fclose( $fichier );
        header( "Location: confirmation.php?nomEnfant={$nomEnfant}&nomParent={$nomParent}", true, 303 );
        exit;
    }
} ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de Commande</title>
    <link rel="stylesheet" id="style" href="style-Commande.css">
</head>
<body id="top">
<nav>
    <ul class="menu">
        <li><a href="Index.html" title="Visitez la page principale pour consulter les mis à jours">Page principale</a>
        </li>
        <li><a href="Informations.html" title="Allez vers la page qui informe comment utilisé les services">
                Informations</a></li>
        <li><a href="Contact.html" title="Contactez-nous en cliquant sur ce lien">Contact</a></li>
        <li><a href="Commande.php"
               title="Faire une demande de remboursement ou faire une requête d'un nouveau service">
                Commande</a></li>
        <li><a class="logo" href="https://github.com/Nami-R2301?tab=repositories"
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
        <p>D'abord, pourquoi faire des requêtes ou des plaintes? La réponse est simple, parce que
            nous voulons continuellement poussez à devenir meilleur! Quoi de mieux que d'écouter aux remarques
            et idées de nos clients et admirateurs! Maintenant, comment ci-faire? C'est très simple, remplissez
            le formulaire au bas de la page avec vos informations personnels et appuyez sur le bouton vert 'submit'!
            <br><br>Quelles sorte de requêtes et de plaintes? Les requêtes/plaintes peuvent englober tous ce qui
            concerne
            la qualité du site web, transactions lors de la réparation et livraison, ainsi que les rajouts ou
            enlèvements
            de certaines fonctionalités qui pourraient amélioré les services offerts aux clients. </p>
    </section>
    <a href="https://cdn.pixabay.com/photo/2016/08/26/15/54/checklist-1622517_960_720.png"
       title="Cliquez ici pour télécharger l'image." target="_blank"> </a>
    <h2 id="form" class="form-titre">Formulaire à remplir :</h2>
    <form action="Commande.php" method="POST">
        <label for="nomParent">Nom complet du parent</label>
        <?php echo "<input type='text' id='nomParent' name='nomParent' value='$nomParent' 
                   placeholder='Ex: XXXX XXXXX' 
                   title='Veuillez inscrire votre nom complet, svp'>" .
            "<span class='erreur-champs'>$erreurNomParent</span>" ?>
        <br>
        <label for="nomEnfant">Nom complet de l'enfant</label>
        <?php echo "<input type='text' id='nomEnfant' name='nomEnfant' value='$nomEnfant'
                   placeholder='Ex: XXXX XXXXX' 
                   title='Veuillez inscrire le nom complet de votre enfant, svp'>" .
            "<span class='erreur-champs'>$erreurNomEnfant</span>" ?>
        <br>
        <label for="ageEnfant">Âge de l'enfant</label>
        <select id='ageEnfant' name='ageEnfant' title='Veuillez entrez une âge, svp.'>
            <?php echo "<option value='4' selected>Défault (4)</option>";
            for ( $i = 4 ; $i < 13 ; $i++ ) {
                if ( $i == $ageEnfant ) {
                    $placeholder = "selected='selected'";
                    echo "<option value='$i' $placeholder>$i</option>";
                } else {
                    echo "<option value='$i'>$i</option>";
                }
            }
            ?>
        </select>
        <br>
        <label for="ecoleEnfant">Nom de l'école de l'enfant</label>
        <?php echo "<input type='text' id='ecoleEnfant' name='ecoleEnfant' value='$ecoleEnfant'
               placeholder='Ex: École De-la-Rive' title='Veuillez inscrire dans quel école votre enfant est, svp.'>" .
            "<span class='erreur-champs'>$erreurEcoleEnfant</span>" ?>
        <br>
        <label for="choixRepasLundi">Choix du repas pour les lundi</label>
        <select id='choixRepasLundi' name='choixRepasLundi' title='Veuillez sélectionner un repas, svp.'>
            <?php echo "<option value='0' selected>Choisissez un repas:</option>";
            for ( $i = 1 ; $i < 3 ; $i++ ) {
                if ( $i == $choixRepasLundi ) {
                    $placeholder = "selected='selected'";
                    echo "<option value='$i' $placeholder>$i</option>";
                } else {
                    echo "<option value='$i'>$i</option>";
                }
            }
            ?>
        </select> <?php echo "<span class='erreur-champs'>$erreurRepasUn</span>"; ?>
        <br>
        <label for="choixRepasMardi">Choix du repas pour les mardi</label>
        <select id='choixRepasMardi' name='choixRepasMardi' title='Veuillez sélectionner un repas, svp.'>
            <?php echo "<option value='0' selected>Choisissez un repas:</option>";
            for ( $i = 1 ; $i < 3 ; $i++ ) {
                if ( $i == $choixRepasMardi ) {
                    $placeholder = "selected='selected'";
                    echo "<option value='$i' $placeholder>$i</option>";
                } else {
                    echo "<option value='$i'>$i</option>";
                }
            }
            ?>
        </select> <?php echo "<span class='erreur-champs'>$erreurRepasDeux</span>"; ?>
        <br>
        <label for="choixRepasMercredi">Choix du repas pour les mercredi</label>
        <select id='choixRepasMercredi' name='choixRepasMercredi' title='Veuillez sélectionner un repas, svp.'>
            <?php echo "<option value='0' selected>Choisissez un repas:</option>";
            for ( $i = 1 ; $i < 3 ; $i++ ) {
                if ( $i == $choixRepasMercredi ) {
                    $placeholder = "selected='selected'";
                    echo "<option value='$i' $placeholder>$i</option>";
                } else {
                    echo "<option value='$i'>$i</option>";
                }
            }
            ?>
        </select> <?php echo "<span class='erreur-champs'>$erreurRepasTrois</span>"; ?>
        <br>
        <label for="choixRepasJeudi">Choix du repas pour les jeudi</label>
        <select id='choixRepasJeudi' name='choixRepasJeudi' title='Veuillez sélectionner un repas, svp.'>
            <?php echo "<option value='0' selected>Choisissez un repas:</option>";
            for ( $i = 1 ; $i < 3 ; $i++ ) {
                if ( $i == $choixRepasJeudi ) {
                    $placeholder = "selected='selected'";
                    echo "<option value='$i' $placeholder>$i</option>";
                } else {
                    echo "<option value='$i'>$i</option>";
                }
            }
            ?>
        </select> <?php echo "<span class='erreur-champs'>$erreurRepasQuatre</span>"; ?>
        <br>
        <label for="choixRepasVendredi">Choix du repas pour les vendredi</label>
        <select id='choixRepasVendredi' name='choixRepasVendredi' title='Veuillez sélectionner un repas, svp.'>
            <?php echo "<option value='0' selected>Choisissez un repas:</option>";
            for ( $i = 1 ; $i < 3 ; $i++ ) {
                if ( $i == $choixRepasVendredi ) {
                    $placeholder = "selected='selected'";
                    echo "<option value='$i' $placeholder>$i</option>";
                } else {
                    echo "<option value='$i'>$i</option>";
                }
            }
            ?>
        </select> <?php echo "<span class='erreur-champs'>$erreurRepasCinq</span>"; ?>
        <br>
        <label for="envoyer"></label>
        <?php echo "<input type='submit' id='envoyer' value='Envoyer' formaction='Commande.php#form'><br><br>" . $message ?>
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
        <li>&copy; Copyright 2020 Nami's Fix&trade; All Rights Reserved</li>
    </ul>
</footer>
</body>
</html>


