<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

$allFieldEmpty = empty($_POST["name"]) || empty($_POST["gender"]) || empty($_POST["subject"]) || empty($_POST["question"]) || empty($_POST["country"]) || empty($_POST["email"]) || empty($_POST["lastname"]);
$nameEmpty = empty($_POST["name"]);
$genderEmpty = empty($_POST["gender"]);
$subjectEmpty = empty($_POST["subject"]);
$questionEmpty = empty($_POST["question"]);
$countryEmpty = empty($_POST["country"]);
$emailEmpty = empty($_POST["email"]);
$lastnameEmpty = empty($_POST["lastname"]);
$filterEmail = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);

if (isset($_POST["name"])) {
    $name = $_POST["name"];
}
if (isset($_POST["gender"])) {
    $gender = $_POST["gender"];
}
if (isset($_POST["subject"])) {
    $subject = $_POST["subject"];
}
if (isset($_POST["question"])) {
    $question = $_POST["question"];
}
if (isset($_POST["country"])) {
    $country = $_POST["country"];
}
if (isset($_POST["email"])) {
    $email = $_POST["email"];
}
if (isset($_POST["lastname"])) {
    $lastname = $_POST["lastname"];
}

$emailNotOk = "Ce mail n'est pas valide";
$emailOk = "Ce mail est valide";
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
$mail = new PHPMailer();
$emptyField = "Cette valeur est vide";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="assets/js/main.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bellota:wght@300&display=swap" rel="stylesheet">
</head>

<body class="pb-0">
<nav id="topnav" class="navbar is-dark">
    <div class="navbar-brand">
        <a class="navbar-item" href="#">
            <img src="https://raw.githubusercontent.com/becodeorg/CRL-Keller-3.31/master/LearningPath/03.The-Mountain/09.PHP/PHP-Challenge/hackers-poulette/hackers-poulette-logo.png?token=AUEZCU3VS5ZEEI3N76PW35TBCOFMQ"
                 alt="logo of the society" width="300%%" height="300%">
        </a>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="https://bulma.io/">
                Home
            </a>
            <div class="navbar-start">
                <a class="navbar-item" href="https://bulma.io/">
                    Infos
                </a>
            </div>
            <div class="navbar-start">
                <a class="navbar-item" href="https://bulma.io/">
                    Contact
                </a>
            </div>
        </div>
    </div>
</nav>
<div id="logoPrincipal" class="is-flex is-justify-content-center pt-6 pb-6">
    <figure class="image">
        <img id="logoPrincipalRound" alt="image of the logo of de society"
             src="https://raw.githubusercontent.com/becodeorg/CRL-Keller-3.31/master/LearningPath/03.The-Mountain/09.PHP/PHP-Challenge/hackers-poulette/hackers-poulette-logo.png?token=AUEZCU3VS5ZEEI3N76PW35TBCOFMQ">
    </figure>
</div>
<section class="section columns">
    <div class="container column is-2">
        <img width="250" alt="image of envelope" class="image is-16by9 pt-6"
             src="assets/img/send.png">
    </div>
    <div class="container column is-9">
        <h1 class="title pt-6">
            Hello World
        </h1>
        <p class="subtitle pt-3 pb-3">
            My first website Php <strong>Hakers-poulette</strong>!
        </p>
        <form method="post">

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label for="name" class="label">Name</label>
                    <?php if ($nameEmpty) {
                        echo "<p>" . $emptyField . "</p>";
                    } ?>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class=" has-icons-left has-icons-left">
                            <input name="name" id="name" class="input" type="text" placeholder="Name" value="<?php echo $name?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label for="lastname" class="label">Lastname</label>
                    <?php if ($lastnameEmpty) {
                        echo $emptyField . "</p>";
                    } ?>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class=" has-icons-left has-icons-left">
                            <input name="lastname" id="lastname" class="input" type="text" placeholder="Lastname" value="<?php echo $lastname?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label for="email" class="label">email</label>
                    <?php
                    if ($filterEmail) {
                        echo "<p>" . $emailOk . "</p>";
                    } else {
                        echo "<p>" . $emailNotOk . "</p>";
                    } ?>
                </div>
                <div class="field-body">
                    <div class="field">

                        <label class=" has-icons-left has-icons-left">
                            <input name="email" id="email" class="input" placeholder="Email" value="<?php echo $email?>">
                        </label>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label for="country" class="label">country</label>
                    <?php if ($countryEmpty) {
                        echo "<p>" . $emptyField . "</p>";
                    } ?>
                </div>
                <div class="field-body">
                    <div class="field is-narrow">
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select name="country" id="country">
                                    <option value="belgium">Belgium</option>
                                    <option value="france">France</option>
                                    <option value="italy">Italy</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label">
                    <label for="gender" class="label">your gender?</label>
                    <?php if ($genderEmpty) {
                        echo "<p>" . $emptyField . "</p>";
                    } ?>
                </div>
                <div class="field-body">
                    <div class="field is-narrow">
                        <div class="control">
                            <label class="radio">
                                <input id="gender" value="girl" type="radio" name="gender" value="girl">
                                Girl
                            </label>
                            <label class="radio">
                                <input id="gender" type="radio" value="boy" name="gender" value="boy">
                                Boy
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label for="subject" class="label">Subject</label>
                    <?php if ($subjectEmpty) {
                        echo "<p>" . $emptyField . "</p>";
                    } ?>
                </div>
                <div class="field-body">
                    <div class="field is-narrow">
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select name="subject" id="subject">
                                    <option value="infos">Infos</option>
                                    <option value="myPurchase">my purchase</option>
                                    <option value="help">help</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label for="question" class="label">Question</label>
                    <?php if ($questionEmpty) {
                        echo "<p>" . $emptyField . "</p>";
                    } ?>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <textarea name="question" id="question" class="textarea" placeholder="Explain how we can help you" value="<?php $question ?>"</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label">
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <button type="submit" name="submit" value="ok" class="button is-primary">
                                Send message
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<div id="modalSucces" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Your Welcome!!</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <p>Thanks for the feedback!</p>
        </section>
        <footer class="modal-card-foot">
            <button class="button is-success">close</button>

        </footer>
    </div>
</div>
<footer id="footer" class="footer mb-0">
    <div class="content has-text-centered has-text-white">
        <p>Copyright Tristan RICHARD 2021</p>
    </div>
</footer>
<?php
if (!$allFieldEmpty && $filterEmail) {
    ?>
    <script>
        let modal = document.getElementById("modalSucces")
        modal.classList.add("is-active")
        modal.onclick = function () {
            modal.classList.remove("is-active");
        }
    </script>
    <?php
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '31c1ee257369f3';
        $mail->Password = 'e3972277f45fdf';
        $mail->CharSet = 'UTF-8';
        $mail->addAddress($_POST["email"]);
        $mail->setFrom('noreply@hackers-poulette.com', 'Hackers Poulette');
        $mail->Subject = $_POST["subject"];
        $mail->WordWrap = 50;
        $mail->AltBody = "Thanks for the feedback";
        $mail->isHTML(true);
        $mail->Body = "<h1>Welcome !</h1><p>Thanks for de feedback</p>";
        $mail->send();
    } catch (Exception $e) {
        echo "<p> send not ok </p>";
    }
} ?>
</body>
</html
>