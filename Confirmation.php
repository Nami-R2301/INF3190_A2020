<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Demande envoyée!</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style-confirmation.css">
    <link rel="icon" href="favicon-32x32.png">
</head>
<body>
<nav>
    <ul class="menu">
        <li><a href="Index.html" title="Visitez la page principale pour consulter les mis à jours">Page principale</a>
        </li>
        <li><a href="form-adoption.html"
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
    <div class="right-bg"></div>
    <div class="left-bg"></div>
    <h1>
        <?php echo "Merci infiniement de votre soutien! Nous saluons " . $_GET["nomAnimal"]
            . "!" . !"Nous vous assurons que votre " . $_GET["typeAnimal"] . "sera pris en charge le plus rapidement
            possible."; ?>
    </h1>
    <p class="remerciements"> De la part de toute l'équipe de Adopt-me!, nous vous remercions chaleureusement de
        votre mise en adoption. Nous espérons que vous serez satisfait de nos services. À la prochaine!</p>
    <p>Requ[ete de mise en adoption terminée avec succès.</p>
    <a class="image-intro" href="https://pixabay.com/photos/thank-you-thanks-card-message-note-515514/"
       title="Remerciement en anglais écrit sur une note à côté d'une enveloppe brune.">
        <img src="https://cdn.pixabay.com/photo/2014/11/03/17/45/thank-you-515514_960_720.jpg"
             alt="Remerciement en anglais écrit sur une note à côté d'une enveloppe brune."></a>
</section>
</body>
</html>