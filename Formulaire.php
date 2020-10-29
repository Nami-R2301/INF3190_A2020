<?php
$prenom = "";
$nom = "";
$numTel = "";
$adressePostale = "";
$adresseCourriel = "";
$province = "";
$info = "Informations supplémentaire à propos de la requête/plainte.";
$erreurprenom = "";
$erreurnom = "";
$erreurnumTel = "";
$erreurAdressePostale = "";
$erreurAdresseCourriel = "";
$erreurProvince = "";
$message = "";
$log = "";
$success = false;

if (isset($_SERVER["REQUEST_METHOD"])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!isset($prenom) || !isset($nom) || !isset($numTel)
            || !isset($adressePostale) || $adresseCourriel || !isset($province) || !isset($info)) {
            http_response_code(400);
            exit;
        }

        $prenom = $_POST["prenom"];
        $nom = $_POST["nom"];
        $age = intval($_POST["age"]);
        $numTel = $_POST["numTel"];
        $adressePostale = $_POST["adressePostale"];
        $adresseCourriel = $_POST["adresseCourriel"];
        $province = $_POST["province"];
        $info = $_POST["info"];
        $log = $prenom . ", " . $nom . ", " . $age . ", " . $numTel . ", " . $adressePostale . ", " . $adresseCourriel
            . ", " . $province . ", " . $info . "\n";


        if (!empty($prenom) && !empty($nom) && strlen($numTel) == 12 && !empty($adressePostale) &&
            !empty($adresseCourriel) && !empty($province)) {
            $success = true;
        }

        if (empty($prenom)) {
            $erreurprenom = "\tLe champs 'prenom' est OBLIGATOIRE!";
        }

        if (empty($nom)) {
            $erreurnom = "\tLe champs 'nom' est OBLIGATOIRE!";
        }

        if (empty($numTel)) {
            $erreurnumTel = "\tLe champs 'Numéro de Téléphone' est OBLIGATOIRE!";
        }

        if (empty($adressePostale)) {
            $erreurAdressePostale = "\tLe champs 'Adresse postale' est OBLIGATOIRE!";
        }

        if (empty($adresseCourriel)) {
            $erreurAdresseCourriel = "\tLe champs 'Adresse courriel' est OBLIGATOIRE!";
        }

        if (empty($province)) {
            $erreurProvince = "\tLa sélection d'une province est OBLIGATOIRE!";
        }

        if ($success) {
            $fichier = fopen("plaintes.txt", "a");
            fwrite($fichier, $log);
            fclose($fichier);
            header("Location: confirmation.php?nom={$nom}&prenom={$prenom}", true, 303);
            exit;
        }
    }
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de requête/plainte</title>
    <link rel="stylesheet" id="style" href="style-formulaire.css">
</head>
<body id="top">
<nav>
    <ul class="menu">
        <li><a href="Index.html" title="Visitez la page principale pour consulter les mis à jours">Page principale</a>
        </li>
        <li><a href="About-us.html" title="En savoir plus sur le site et les services données">
                À propos de nous</a></li>
        <li><a href="Processus-de-reparation.html" title="Allez vers la page qui informe comment utilisé les services">
                Processus de réparation</a></li>
        <li><a href="Contact-us.html" title="Contactez-nous en cliquant sur ce lien">Contactez nous</a></li>
        <li><a href="Formulaire.php"
               title="Faire une demande de remboursement ou faire une requête d'un nouveau service">
                Requêtes/Plaintes</a></li>
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
    <a href="https://pixabay.com/photos/board-chalk-marketing-idea-concept-4874863/"
       title="Cliquez ici pour télécharger l'image."
       target="_blank"> <img class="image-intro"
                             src="https://cdn.pixabay.com/photo/2020/02/23/23/02/board-4874863_960_720.jpg"
                             alt="Des dessins fait en craie sur un tableau noir représentant des idées."></a>
    <h1 id="description">Requête(s) ou plainte(s)? </h1>
    <section class="description">
        <a href="https://pixabay.com/illustrations/retro-styled-line-art-old-fashioned-2388622/"
           title="Cliquez ici pour télécharger l'image."
           target="_blank"> <img class="image-description-right"
                                 src="https://cdn.pixabay.com/photo/2017/06/09/23/42/retro-styled-2388622_960_720.png"
                                 alt="Une main qui tien une lampe allumé, celle-ci entouré d'une bordure noir"></a>
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
    <form action="Formulaire.php" method="POST">
        <label for="prenom">Prénom</label>
        <?php echo "<input type='text' id='prenom' name='prenom' value='$prenom'
               maxlength='40' minlength='2' title='Veuillez inscrire votre prénom, svp'>" .
            "<p class='erreur-champs'>$erreurprenom</p>" ?>
        <label for="nom">Nom</label>
        <?php echo "<input type='text' id='nom' name='nom' value='$nom'
               maxlength='40' minlength='2' title='Veuillez inscrire votre nom, svp'>" .
            "<p class='erreur-champs'>$erreurnom</p>" ?>
        <label for="age">Âge</label>
        <select id='age' name='age' title='Veuillez sélectionner une province, svp.'>
            <?php
            for ($i = 18; $i < 101; $i++) {
                if ($i == $age) {
                    $selected = "selected='selected'";
                } else {
                    $selected = "";
                }
                echo "<option value='$i' $selected>$i</option>";
            }
            ?>
        </select>
        <br>
        <label for="numTel">Numéro de téléphone</label>
        <?php echo "<input type='text' id='numTel' name='numTel' value='$numTel'
               placeholder='555-555-5555' pattern='([0-9]{3}-[0-9]{3}-[0-9]{4})'
               title='Veuillez inscrire votre numéro de téléphone, svp.'>" .
            "<p class='erreur-champs'>$erreurnumTel</p>" ?>
        <label for="adressePostale">Adresse Postale</label>
        <?php echo "<input type='text' id='adressePostale' name='adressePostale' value='$adressePostale'
               maxlength='40' minlength='10' placeholder='Exemple: 1 Place Henry, Montréal'
               title='Veuillez inscrire votre adresse de livraison, svp.'>" .
            "<p class='erreur-champs'>$erreurAdressePostale</p>" ?>
        <label for="adresseCourriel">Adresse courriel</label>
        <?php echo "<input type='text' id='adresseCourriel' name='adresseCourriel' value='$adresseCourriel'
               maxlength='40' minlength='10' placeholder='Exemple: allo@gmail.com'
               title='Veuillez inscrire votre adresse courriel avec laquelle ont pourra vous contactez, svp.'>"
            . "<p class='erreur-champs'>$erreurAdresseCourriel</p>" ?>
        <label for="province">Province
            <?php echo "<select id='province' name='province' title='Veuillez sélectionner une province, svp.'>
                <option value='' selected>Choisissez une province:</option>
                <option value='1'>Ontario</option>
                <option value='2'>Québec</option>
                <option value='3'>Colombie Britannique</option>
                <option value='4'>Ïlee-du-prince-Édouard</option>
                <option value='5'>Manitoba</option>
                <option value='6'>Nouveau-Brunswick</option>
                <option value='7'>Nouvelle-Écosse</option>
                <option value='8'>Saskatchewan</option>
                <option value='9'>Terre-Neuve-et-Labrador</option>
                <option value='10'>Nunavut</option>
            </select>" . "<p class='erreur-champs'>$erreurProvince</p>" ?>
        </label>
        <label for="info"></label>
        <textarea id='info' name='info' cols='50' rows='10'><?php echo $info ?></textarea>
        <br>
        <label for="envoyer"></label>
        <?php echo "<input type='submit' id='envoyer' value='Envoyer'><br><br>" . $message ?>
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


