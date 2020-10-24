<?php
$firstName = "";
$lastName = "";
$numTel = "";
$age = "";
$graduationYear = "";
$programName = "";
$info = "Additional information about you.";
$message = "";
$success = false;

if (isset( $_SERVER["REQUEST_METHOD"] ) ) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $age = $_POST["age"];
        $numTel = $_POST["numTel"];
        $programName = $_POST["programName"];
        $graduationYear = $_POST["graduationYear"];
        $info = $_POST["info"];

        if ( !empty( $firstName ) || !empty( $lastName ) || strlen( $numTel ) == 12 || !empty( $programName ) ||
            !empty( $graduationYear ) || !empty( $age ) ) {
            $success = true;
        }

        if ( $success ) {
            $message = "SUCCESS! Request sent.\n\n";
        } else {
            $message = "An error has occurred! Please try again later.\n";
        }
    }
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link rel="stylesheet" id="style" href="style-formulaire.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.html">Page principale</a></li>
            <li><a href="About-us.html">À propos de nous</a></li>
            <li><a href="Instructions.html">Comment ci-prendre</a></li>
            <li><a href="Contact-us.html">Contactez nous</a></li>
            <li><a href="Formulaire.php">Requêtes/Plaintes</a></li>
            <li><a class="logo" href="https://github.com/Nami-R2301?tab=repositories">
                    <img src="https://image.flaticon.com/icons/png/512/25/25231.png" alt="logo Github" width="20px"></a></li>
            <li><a class="logo" href="https://etudier.uqam.ca/programme?code=7617#bloc_presentation">
                    <img src="https://events.grenadine.co/wp-content/uploads/UQAM-Logo.png"
                         alt="logo université UQÀM" width="40px"></a></li>
        </ul>
    </nav>
    <div class="main">
        <h1>College Form</h1>
        <br>
        <br>
        <form action="Formulaire.php" method="POST">
            <label for ="firstName">Name</label>
            <input type ="text" id ="firstName" name="firstName" value="<?php echo $firstName; ?>"
                   maxlength="40"  minlength="2" required>
            <br>
            <br>
            <label for ="lastName">LastName</label>
            <input type="text" id="lastName" name="lastName" value="<?php echo $lastName; ?>"
                   maxlength="50" minlength="2" required>
            <br>
            <br>
            <label for ="age">Age</label>
            <input type="text" id="age" name="age" value="<?php echo $age; ?>"
                   maxlength="2" required>
            <br>
            <br>
            <label for ="numTel">Phone Number</label>
            <input type="text" id="numTel" name="numTel" value="<?php echo $numTel; ?>"
                   placeholder="555-555-5555" pattern="([0-9]{3}-[0-9]{3}-[0-9]{4})" required>
            <br>
            <br>
            <label for ="graduationYear">Graduation Year</label>
            <input type="date" id="graduationYear" name="graduationYear" value="<?php echo $graduationYear; ?>"
                   placeholder="2000-05-10" min="2000-01-01" max="2020-05-10" required>
            <br>
            <br>
            <label for ="university">Establishments</label>
            <select id="university"  required>
                <option value="university" disabled>Choose an establishment</option>
                <option value="concordia">Concordia University</option>
                <option value="mcGill">McGill University</option>
                <option value="uqam">UQÀM University</option>
                <option value="ets">ETS University</option>
            </select>
            <br>
            <br>
            <label for ="programName">Program Name</label>
            <input type="text" id="programName" name="programName" value="<?php echo $programName; ?>"
                   maxlength="40" minlength="2" required>
            <br>
            <br>
            <label for= "regularMember">Regular Member</label>
            <input type="radio" id="regularMember" value="regularMember">
            <br>
            <br>
            <label for="juniorMember">Junior Member</label>
            <input type="radio" id="juniorMember" value="regularMember">
            <br>
            <br>
            <label for="SeniorMember">Senior Member</label>
            <input type="radio" id="SeniorMember" value="regularMember">
            <br>
            <br>
            <label for ="info"></label>
            <textarea id='info' name='info' cols='40' rows='4'><?php echo $info ?></textarea>
            <br>
            <br>
            <label for="submit">Submit</label>
            <?php echo "<input type='submit' id='submit'><br><br>" . $message?>
        </form>

</body>
</html>


