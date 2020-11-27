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
$checkedUn = "";
$checkedDeux = "";
$checkedTrois = "";
$checkedQuatre = "";
$checkedCinq = "";
$checkedSix = "";
$checkedSept = "";
$checkedHuit = "";
$checkedNeuf = "";
$checkedDix = "";
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

    if ( !empty( $_POST["choixRepasLundi"] ) ) {
        $choixRepasLundi = $_POST["choixRepasLundi"];

        if ( $choixRepasLundi == "spaguetti" ) {
            $checkedUn = "checked";
        } else {
            $checkedDeux = "checked";
        }
    } else {
        $erreurRepasUn = "\tLa sélection d'un choix de repas est OBLIGATOIRE!";
    }

    if ( !empty( $_POST["choixRepasMardi"] ) ) {
        $choixRepasMardi = $_POST["choixRepasMardi"];

        if ( $choixRepasMardi == "pain-de-viande" ) {
            $checkedTrois = "checked";
        } else {
            $checkedQuatre = "checked";
        }
    } else {
        $erreurRepasDeux = "\tLa sélection d'un choix de repas est OBLIGATOIRE!";
    }

    if ( !empty( $_POST["choixRepasMercredi"] ) ) {
        $choixRepasMercredi = $_POST["choixRepasMercredi"];

        if ( $choixRepasMercredi == "hamburgers" ) {
            $checkedCinq = "checked";
        } else {
            $checkedSix = "checked";
        }
    } else {
        $erreurRepasTrois = "\tLa sélection d'un choix de repas est OBLIGATOIRE!";
    }

    if ( !empty( $_POST["choixRepasJeudi"] ) ) {
        $choixRepasJeudi = $_POST["choixRepasJeudi"];

        if ( $choixRepasJeudi == "macaroni" ) {
            $checkedSept = "checked";
        } else {
            $checkedHuit = "checked";
        }
    } else {
        $erreurRepasQuatre = "\tLa sélection d'un choix de repas est OBLIGATOIRE!";
    }

    if ( !empty( $_POST["choixRepasVendredi"] ) ) {
        $choixRepasVendredi = $_POST["choixRepasVendredi"];

        if ( $choixRepasVendredi == "poutine" ) {
            $checkedNeuf = "checked";
        } else {
            $checkedDix = "checked";
        }
    } else {
        $erreurRepasCinq = "\tLa sélection d'un choix de repas est OBLIGATOIRE!";
    }

    $log = "Parent: " . $nomParent . ", " . "Enfant: " . $nomEnfant . ", " . "Age: " .
        $ageEnfant . ", " . "Ecole " . $ecoleEnfant . ", " . "Lundi: " . $choixRepasLundi
        . ", Mardi: " . $choixRepasMardi . ", Mercredi: " . $choixRepasMercredi . ", Jeudi: " .
        $choixRepasJeudi . ", Vendredi: " . $choixRepasVendredi . ".\n";


    if ( !empty( $nomParent ) && !empty( $nomEnfant ) && !empty( $ecoleEnfant ) &&
        !empty( $choixRepasLundi ) && !empty( $choixRepasMardi ) && !empty( $choixRepasMercredi )
        && !empty( $choixRepasJeudi ) && !empty( $choixRepasVendredi ) ) {
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
    <link rel="icon" href="favicon-32x32.png">
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
    <form action="Commande.php" method="POST">
        <?php echo "<p class='erreur-champs'>$erreurNomParent</p>" ?>
        <label for="nomParent">Nom complet du parent<span class="asterix"> * </span></label>
        <?php echo "<input type='text' id='nomParent' name='nomParent' value='$nomParent'
                   placeholder='Ex: XXXX XXXXX' 
                   title='Veuillez inscrire votre nom complet, svp'>" ?>
        <br>
        <?php echo "<p class='erreur-champs'>$erreurNomEnfant</p>" ?>
        <label for="nomEnfant">Nom complet de l'enfant<span class="asterix"> * </span></label>
        <?php echo "<input type='text' id='nomEnfant' name='nomEnfant' value='$nomEnfant'
                   placeholder='Ex: XXXX XXXXX' 
                   title='Veuillez inscrire le nom complet de votre enfant, svp'>" ?>
        <br>
        <label for="ageEnfant">Âge de l'enfant<span class="asterix"> * </span></label>
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
        <?php echo "<p class='erreur-champs'>$erreurEcoleEnfant</p>" ?>
        <label for="ecoleEnfant">Nom de l'école de l'enfant<span class="asterix"> * </span></label>
        <?php echo "<input type='text' id='ecoleEnfant' name='ecoleEnfant' value='$ecoleEnfant'
               placeholder='Ex: École De-la-Rive' title='Veuillez inscrire dans quel école votre enfant est, svp.'>" ?>
        <br>
        <?php
        echo "<p class='erreur-champs'>$erreurRepasUn</p> 
            <label for='choixRepasLundi'>Choix du repas pour les lundi<span class='asterix'> * </span></label>
            <br><br><br> 
            <span class='titre-repasUn'>Plat numéro 1 : Spaguetti à la viande.</span>
            <span class='titre-repasDeux'>Plat numéro 2 : Lasagne.</span>
            <br><br>
            <p class='titre-repasUn'>Ingrédients : Nouille, sauce tomate, viande haché, parmesan.</p>
            <p class='titre-repasDeux'>Ingrédients : fromage mozzarella, viande hâché (boeuf), sauce tomate.</p>
            <div class='container-radios'>
            <input type='radio' id='choixRepasLundi' name='choixRepasLundi' value='spaguetti' $checkedUn
            title='Veuillez sélectionner un repas, svp.'>
            <img id='choixRepasLundi' class='img-repas'
             src='https://cdn.pixabay.com/photo/2016/06/17/19/11/pasta-1463934_960_720.jpg'
             alt='spaguetti à la viande avec du pain' title='Spaguetti à la viande.'>
            <label for='choixRepasLundi2'></label>
            <input type='radio' id='choixRepasLundi2' name='choixRepasLundi' value='lasagne' $checkedDeux
            title='Veuillez sélectionner un repas, svp.'>
            <img class='img-repas' src='https://cdn.pixabay.com/photo/2017/04/30/09/28/lasagna-2272454_960_720.jpg' 
            alt='lasagne sur un plat' title='Lasagne.'>
            </div>"; ?>
        <br>
        <?php
        echo "<p class='erreur-champs'>$erreurRepasDeux</p> .
            <label for='choixRepasMardi'>Choix du repas pour les mardi<span class='asterix'> * </span></label>
            <br><br><br>
            <span class='titre-repasUn'>Plat numéro 1 : Sandwich au jambon.</span>
            <span class='titre-repasDeux'>Plat numéro 2 : Pizza.</span>
            <br><br>
            <p class='titre-repasUn'>Ingrédients : jambon, fromage suisse, bacon, laitue, tomate, pain blé entier.</p> 
            <p class='titre-repasDeux'>Ingrédients : pâte, pepperoni, fromage mozzarella, sauce tomate, sel, pain.</p>
            <div class='container-radios'>
            <input type='radio' id='choixRepasMardi' name='choixRepasMardi' value='sandwich au jambon' $checkedTrois
            title='Veuillez sélectionner un repas, svp.'>
            <img id='choixRepasMardi' class='img-repas'
            src='https://cdn.pixabay.com/photo/2014/01/15/23/58/sandwich-246154_960_720.jpg'
            alt='sandwich au jambon avec fromage et des frites.' title='Sandwich au jambon avec fromage.'>
            <label for='choixRepasMardi2'></label>
            <input type='radio' id='choixRepasMardi2' name='choixRepasMardi' value='pizza' $checkedQuatre
            title='Veuillez sélectionner un repas, svp.'>
            <img id='choixRepasMardi2' class='img-repas'
            src='https://cdn.pixabay.com/photo/2016/02/04/16/16/pizza-1179404_960_720.jpg'
            alt='Pizza au peperroni et fromage.' title='Pizza au peperroni et fromage.'>
            </div>"; ?>
        <br>
        <?php
        echo "<p class='erreur-champs'>$erreurRepasTrois</p>
            <label for='choixRepasMercredi'>Choix du repas pour les mercredi<span class='asterix'> * </span></label>
            <br><br><br> 
            <span class='titre-repasUn'>Plat numéro 1 : Hamburgers.</span>
            <span class='titre-repasDeux'>Plat numéro 2 : Hot-dogs.</span>
            <p class='titre-repasUn'>Ingrédients : viande hâché (boeuf), bacon, laitue, tomate, cornichons, onions caramèlisé,
             pain blé entier, frites.</p> 
            <p class='titre-repasDeux'>Ingrédients : pain brun, porc, sel.</p>
            <div class='container-radios'>
            <input type='radio' id='choixRepasMercredi' name='choixRepasMercredi' value='hamburgers' $checkedCinq
               title='Veuillez sélectionner un repas, svp.'>
            <img id='choixRepasMercredi' class='img-repas'
            src='https://cdn.pixabay.com/photo/2018/05/30/19/18/burger-3442227_960_720.jpg'
            alt='Hamburger avec bacon, cornichons, laitue et des piments. De plus, il y a des frites sur le côté.' 
            title='Hamburger avec bacon, cornichons, laitue et des piments.'>
            <label for='choixRepasMercredi'></label>
            <input type='radio' id='choixRepasMercredi2' name='choixRepasMercredi' value='hot-dogs' $checkedSix
             title='Veuillez sélectionner un repas, svp.'>
             <img id='choixRepasMercredi2' class='img-repas'
            src='https://cdn.pixabay.com/photo/2012/03/02/11/00/hot-dog-21074_960_720.jpg'
            alt='Hot-dog avec ketchup et moutarde sur le dessus.' 
            title='Hot-dog avec ketchup et moutarde sur le dessus.'>
            </div>" ?>
        <br>
        <?php
        echo "<p class='erreur-champs'>$erreurRepasQuatre</p>
            <label for='choixRepasJeudi'>Choix du repas pour les jeudi<span class='asterix'> * </span></label>
            <br><br><br> 
            <span class='titre-repasUn'>Plat numéro 1 : Macaroni.</span>
            <span class='titre-repasDeux'>Plat numéro 2 : Poitrine de poulet.</span>
            <p class='titre-repasUn'>Ingrédients : pâte, viande hâché (boeuf), épices, sauce tomate.</p> 
            <p class='titre-repasDeux'>Ingrédients : poulet, sel, poivre, laitue, tomate, cocombres, sauce césar.</p>
            <div class='container-radios'>
            <input type='radio' id='choixRepasJeudi' name='choixRepasJeudi' value='macaroni' $checkedSept
            title='Veuillez sélectionner un repas, svp.'>
            <img id='choixRepasJeudi' class='img-repas'
            src='https://cdn.pixabay.com/photo/2016/03/05/20/16/beef-1238729_960_720.jpg'
            alt='Macaroni à la viande.' 
            title='Macaroni à la viande.'>
            <label for='choixRepasJeudi2'></label>
            <input type='radio' id='choixRepasJeudi2' name='choixRepasJeudi' value='poitrine-de-poulet' $checkedHuit
            title='Veuillez sélectionner un repas, svp.'>
            <img id='choixRepasJeudi2' class='img-repas'
            src='https://cdn.pixabay.com/photo/2017/04/09/12/49/chicken-breast-filet-2215709_960_720.jpg'
            alt='Poitrine de poulet cuit avec une salade sur le côté.' 
            title='Poitrine de poulet cuit avec une salade sur le côté.'>
            </div>"?>
        <br>
        <?php
        echo "<p class='erreur-champs'>$erreurRepasCinq</p>
        <label for='choixRepasVendredi'>Choix du repas pour les vendredi <span class='asterix'> * </span></label>
        <br><br><br> 
        <span class='titre-repasUn'>Plat numéro 1 : Poutine.</span>
        <span class='titre-repasDeux'>Plat numéro 2 : Wrap au poulet.</span>
        <p class='titre-repasUn'>Ingrédients : patate frites, sauce, fromage en grains.</p> 
            <p class='titre-repasDeux'>Ingrédients : pain pita, poulet grillé, onions, tomates, laitue, sauce tatziki.</p>
        <div class='container-radios'>
        <input type='radio' id='choixRepasVendredi' name='choixRepasVendredi' value='poutine' $checkedNeuf
        title='Veuillez sélectionner un repas, svp.'>
        <img id='choixRepasVendredi' class='img-repas'
        src='https://food.fnr.sndimg.com/content/dam/images/food/fullset/2011/8/29/1/FNM_100111-Poutine-002_s4x3.jpg.rend.hgtvcom.616.462.suffix/1383239551554.jpeg'
        alt='Poutine québécoise classique.' 
        title='Poutine québécoise classique.'>       
        <label for='choixRepasVendredi2'></label>
        <input type='radio' id='choixRepasVendredi2' name='choixRepasVendredi' value='wrap-au-poulet' $checkedDix
        title='Veuillez sélectionner un repas, svp.'>
        <img id='choixRepasVendredi2' class='img-repas'
        src='https://cdn.pixabay.com/photo/2016/02/11/22/14/wrap-1194729_960_720.jpg'
        alt='Wrap au poulet avec laitue, tomates, onions et sauce tatziki.' 
        title='Wrap au poulet avec laitue, tomates, onions et sauce tatziki.'>        
        </div>"?>
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
        <li>&copy; Copyright 2020 Lunch Écolier&trade; All Rights Reserved</li>
    </ul>
</footer>
</body>
</html>


