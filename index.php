<?php
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

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

$name = $_POST["name"] ?? "";
$gender = $_POST["gender"] ?? "";
$subject = $_POST["subject"] ?? "";
$question = $_POST["question"] ?? "";
$country = $_POST["country"] ?? "";
$email = $_POST["email"] ?? "";
$lastname = $_POST["lastname"] ?? "";
$filterEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
$emailNotOk = "Ce mail n'est pas valide";
$emailOk = "Ce mail est valide";
$mail = new PHPMailer();
$emptyField = "<p style='color : red'>Cette valeur est vide</p>"
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Site Php for Form">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://www.google.com/recaptcha/api.js?render=6Ldfnd8bAAAAAN2-BF7s2Cu4_gecq2z-92h8uQRu"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6Ldfnd8bAAAAAN2-BF7s2Cu4_gecq2z-92h8uQRu', {action: 'contact'}).then(function (token) {
                let recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bellota:wght@300&display=swap" rel="stylesheet">
</head>

<body class="pb-0">
<nav id="topnav" class="navbar is-dark">
    <div class="navbar-brand">
        <a class="navbar-item" href="#">
            <img src="assets/img/hackers-poulette-logo.png" alt="logo of the society">
        </a>
        <div class="navbar-burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="https://bulma.io/">Home</a>
            <div class="navbar-start">
                <a class="navbar-item" href="https://bulma.io/">Infos</a>
            </div>
            <div class="navbar-start">
                <a class="navbar-item" href="https://bulma.io/">Contact</a>
            </div>
        </div>
    </div>
</nav>
<div id="logoPrincipal" class="is-flex is-justify-content-center pt-6 pb-6">
    <figure class="image">
        <img height="500" id="logoPrincipalRound" alt="image of the logo of de society" src="assets/img/hackers-poulette-logo.png">
    </figure>
</div>
<section class="section columns">
    <div class="container column is-2">
        <img width="512" height="512" alt="image of envelope" class="image is-16by9 pt-6"
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
                            <input name="name" id="name" class="input" type="text" placeholder="Name"
                                   value="<?php echo htmlspecialchars($name) ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label for="lastname" class="label">Lastname</label>
                    <?php if ($lastnameEmpty) {
                        echo "<p>" . $emptyField . "</p>";
                    } ?>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class=" has-icons-left has-icons-left">
                            <input name="lastname" id="lastname" class="input" type="text" placeholder="Lastname"
                                   value="<?php echo $lastname ?>">
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
                            <input name="email" id="email" class="input" type="email" placeholder="Email" value="<?php echo $email ?> ">
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
                    <p class="label">your gender?</p>
                    <?php if ($genderEmpty) {
                        echo "<p>" . $emptyField . "</p>";
                    } ?>
                </div>
                <div class="field-body">
                    <div class="field is-narrow">
                        <div class="control">
                            <label for="girl" class="radio">
                                <input id="girl" type="radio" name="gender" value="girl">
                                Girl
                            </label>
                            <label for="boy" class="radio">
                                <input id="boy" type="radio" name="gender" value="boy">
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
                            <textarea name="question" id="question" class="textarea"
                                      placeholder="<?php echo $question ?>"></textarea>
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
                            <button type="submit"
                                    id="submit"
                                    name="submit"
                                    value="ok"
                                    class="button is-primary">Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
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
            <h2>Thanks for the feedback!</h2>
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

</body>
<?php include "assets/php/sendMail.php"; ?>
<script>document.addEventListener('DOMContentLoaded', () => {

        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach( el => {
                el.addEventListener('click', () => {

                    // Get the target from the "data-target" attribute
                    const target = el.dataset.target;
                    const $target = document.getElementById(target);

                    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                    el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });
        }

    });</script>
</html>