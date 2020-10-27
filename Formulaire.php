<?php
$prenom = "";
$nom = "";
$numTel = "";
$age = "";
$adressePostale = "";
$adresseCourriel = "";
$province = "";
$info = "Informations supplémentaire à propos de la requête/plainte.";
$message = "";
$log = "";
$success = false;

if (isset($_SERVER["REQUEST_METHOD"])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $prenom = $_POST["prenom"];
        $nom = $_POST["nom"];
        $age = $_POST["age"];
        $numTel = $_POST["numTel"];
        $adressePostale = $_POST["adressePostale"];
        $adresseCourriel = $_POST["adresseCourriel"];
        $province = $_POST["province"];
        $info = $_POST["info"];
        $log = $prenom . ", " . $nom . ", " . $age . ", " . $numTel . ", " . $adressePostale . ", " . $adresseCourriel
            . ", " . $province . ", " . $info . "\n";


        if (!empty($prenom) && !empty($nom) && strlen($numTel) == 12 && !empty($adresseCourriel) ||
            !empty($age) && !empty($province) && !empty($adressePostale)) {
            $success = true;
        }

        if ($success) {
            $fichier = fopen("plaintes.txt", "a");
            fwrite($fichier, $log);
            fclose($fichier);
            $message = "SUCCÈS! FORMULAIRE ENVOYER. MERCI!\n\n";
        } else {
            $message = "Une erreur est survenu lors de l'envoie du formulaire. Veuillez réessayez.
            Si le problème persiste, veuillez contactez l'administrateur du site. Merci\n";
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
        <li><a href="index.html" title="Visitez la page principale pour consulter les mis à jours">Page principale</a>
        </li>
        <li><a href="About-us.html" title="En savoir plus sur le site et les services données">
                À propos de nous</a></li>
        <li><a href="Instructions.html" title="Allez vers la page qui informe comment utilisé les services">
                Comment ci-prendre</a></li>
        <li><a href="Contact-us.html" title="Contactez-nous en cliquant sur ce lien">Contactez nous</a></li>
        <li><a href="Formulaire.php"
               title="Faire une demande de remboursement ou faire une requête d'un nouveau service">
                Requêtes/Plaintes</a></li>
        <li><a class="logo" href="https://github.com/Nami-R2301?tab=repositories"
               title="Cliquez ici pour consulté/contribué à la création du site web">
                <img alt="logo Github" src="https://image.flaticon.com/icons/png/512/25/25231.png" width="20px"
                     height="16px"></a></li>
        <li><a class="logo" href="https://etudier.uqam.ca/programme?code=7617#bloc_presentation"
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
           target="_blank"> <img class="image-description"
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
        <input type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>"
               maxlength="40" minlength="2" title="Veuillez inscrire votre prénom, svp." required>
        <br>
        <br>
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>"
               maxlength="50" minlength="2" title="Veuillez inscrire votre nom de famille, svp." required>
        <br>
        <br>
        <label for="age">Âge</label>
        <input type="date" id="age" name="age" value="<?php echo $age; ?>"
               placeholder="2000-01-01" min="1920-10-24" max="2002-10-24"
               title="Veuillez inscrire votre date de naissance. Seulement ceux 18 ans et plus
                     peuvent envoyer un formulaire." required>
        <br>
        <br>
        <label for="numTel">Numéro de téléphone</label>
        <input type="text" id="numTel" name="numTel" value="<?php echo $numTel; ?>"
               placeholder="555-555-5555" pattern="([0-9]{3}-[0-9]{3}-[0-9]{4})"
               title="Veuillez inscrire votre numéro de téléphone, svp." required>
        <br>
        <br>
        <label for="adressePostale">Adresse Postale</label>
        <input type="text" id="adressePostale" name="adressePostale" value="<?php echo $adressePostale; ?>"
               maxlength="40" minlength="10" placeholder="Exemple: 1 Place Henry, Montréal"
               title="Veuillez inscrire votre adresse de livraison, svp." required>
        <br>
        <br>
        <label for="adresseCourriel">Adresse courriel</label>
        <input type="text" id="adresseCourriel" name="adresseCourriel" value="<?php echo $adresseCourriel; ?>"
               maxlength="40" minlength="10" placeholder="Exemple: allo@gmail.com"
               title="Veuillez inscrire l'adresse avec laquelle ont pourra vous contactez, svp." required>
        <br>
        <br>
        <label for="province">Province
            <select id="province" name="province" title="Veuillez sélectionner une province, svp." required>
                <option value="" selected>Choisissez une province:</option>
                <option value="1">Ontario</option>
                <option value="2">Québec</option>
                <option value="3">Colombie Britannique</option>
                <option value="4">Ïlee-du-prince-Édouard</option>
                <option value="5">Manitoba</option>
                <option value="6">Nouveau-Brunswick</option>
                <option value="7">Nouvelle-Écosse</option>
                <option value="8">Saskatchewan</option>
                <option value="9">Terre-Neuve-et-Labrador</option>
                <option value="10">Nunavut</option>
            </select>
        </label>
        <br>
        <br>
        <label for="info"></label>
        <textarea id='info' name='info' cols='50' rows='10'><?php echo $info ?></textarea>
        <br>
        <br>
        <label for="envoyer"></label>
        <?php echo "<input type='submit' id='envoyer'><br><br>" . $message ?>
    </form>
    <span>
        Merci infiniement de votre soutien! Nous vous assurons que votre formulaire sera évalué le plus rapidement
        possible.
    </span>
</section>
<footer>
    <ul>
        <li><a href="#top">Revenir au début de page</a></li>
        <li><a href="#description">Revenir à la description</a></li>
        <li><a href="#form">Revenir au début de formulaire</a></li>
        <li>Copyright 2020&copy; Nami's Fix&trade; All Rights Reserved</li>
    </ul>
</footer>
</body>
</html>


