<?php
$varPostNotNull = isset($_POST["name"]) && isset($_POST["gender"]) && isset($_POST["subject"]) && isset($_POST["question"]) && isset($_POST["country"]) && ($_POST["email"]) && isset($_POST["lastname"]);
$varPostEmpty = empty($_POST["name"]) || empty($_POST["gender"]) || empty($_POST["subject"]) || empty($_POST["question"]) || empty($_POST["country"]) || empty($_POST["email"]) || empty($_POST["lastname"]);
$nameEmpty = empty($_POST["name"]);
$genderEmpty = empty($_POST["gender"]);
$subjectEmpty = empty($_POST["subject"]);
$questionEmpty = empty($_POST["question"]);
$countryEmpty = empty($_POST["country"]);
$emailEmpty = empty($_POST["email"]);
$lastnameEmpty = empty($_POST["lastname"]);

function emptyField(){
        return "Cette valeur est est vide";
}
function emailNotOk(){
    return "Ce mail n'est pas valide";
}

if ($varPostNotNull){
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $country = $_POST["country"];
    $email = $_POST["gender"];
    $email = $_POST["subject"];
    $email = $_POST["question"];
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
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
        <img id="logoPrincipalRound" alt="image of the logo of de society" src="https://raw.githubusercontent.com/becodeorg/CRL-Keller-3.31/master/LearningPath/03.The-Mountain/09.PHP/PHP-Challenge/hackers-poulette/hackers-poulette-logo.png?token=AUEZCU3VS5ZEEI3N76PW35TBCOFMQ">
    </figure>
</div>
<section class="section columns pb-6">
    <div class="container column is-2">
        <img width="250" alt="image of envelope" class="image is-16by9"
             src="assets/img/send.png">
    </div>
    <div class="container column is-9">
        <h1 class="title">
            Hello World
        </h1>
        <p class="subtitle">
            My first website with <strong>Bulma</strong>!
        </p>
        <form method="post">

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label for="name"  class="label">Name</label>
                    <?php if ($nameEmpty) { echo "<p>" . emptyField() . "</p>"; } ?>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class=" has-icons-left has-icons-left">
                            <input name="name" id="name" class="input" type="text" placeholder="Name">
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label for="lastname"  class="label">Lastname</label>
                    <?php if ($lastnameEmpty) { echo "<p>" . emptyField() . "</p>"; } ?>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class=" has-icons-left has-icons-left">
                            <input name="lastname" id="lastname" class="input" type="text" placeholder="Lastname">
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label for="email" class="label">email</label>
                    <?php if ($emailEmpty) { echo "<p>" . emptyField() . "</p>"; } ?>
                </div>
                <div class="field-body">
                    <div class="field">

                        <label class=" has-icons-left has-icons-left">
                            <input name="email" id="email" class="input" placeholder="Email" value="alex@smith.com">
                        </label>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label for="country" class="label">country</label>
                    <?php if ($countryEmpty) { echo "<p>" . emptyField() . "</p>"; } ?>
                </div>
                <div class="field-body">
                    <div class="field is-narrow">
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select name="country" id="country">
                                    <option  value="belgium">Belgium</option>
                                    <option  value="france">France</option>
                                    <option  value="italy">Italy</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label">
                    <label for="gender" class="label">your gender?</label>
                    <?php if ($genderEmpty) { echo "<p>" . emptyField() . "</p>"; } ?>
                </div>
                <div class="field-body">
                    <div class="field is-narrow">
                        <div class="control">
                            <label class="radio">
                                <input id="gender" value="girl" type="radio" name="gender">
                                Girl
                            </label>
                            <label class="radio">
                                <input id="gender" type="radio" value="boy" name="gender">
                                Boy
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label for="subject" class="label">Subject</label>
                    <?php if ($subjectEmpty) { echo "<p>" . emptyField() . "</p>"; } ?>
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
                    <label for="question"  class="label">Question</label>
                    <?php if ($questionEmpty) { echo "<p>" . emptyField() . "</p>"; } ?>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <textarea name="question" id="question" class="textarea" placeholder="Explain how we can help you"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label">
                    <!-- Left empty for spacing -->
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

<footer id="footer" class="footer mb-0">
    <div class="content has-text-centered has-text-white">
        <p>Copyright Tristan RICHARD 2021</p>
    </div>
</footer>

</body>

</html>