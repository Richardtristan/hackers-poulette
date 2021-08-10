<?php
$serveur = "localhost";
$dbname = "id17361846_form";
$user = "id17361846_root";
$pass = "N*1NWN92##D7f/\Z";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

// Build POST request:
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6Ldfnd8bAAAAAEBJXTFEOuItDyHIYcDQD72Ofmhn';
    $recaptcha_response = $_POST['recaptcha_response'];

// Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
// Take action based on the score returned:
    if ($recaptcha->success && $recaptcha->score >= 0.5) {
        if ( !$allFieldEmpty && $filterEmail) {
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->Port = 2525;
                $mail->Username = '31c1ee257369f3';
                $mail->Password = 'e3972277f45fdf';
                $mail->CharSet = 'UTF-8';
                $mail->addAddress($email);
                $mail->setFrom('noreply@hackers-poulette.com', 'Hackers Poulette');
                $mail->Subject = $subject;
                $mail->WordWrap = 50;
                $mail->AltBody = "Thanks for the feedback";
                $mail->isHTML(true);
                $mail->Body = "<h1>Welcome !</h1><p>Thanks for de feedback</p>";
                $mail->send();
                $_POST =[]; ?>
                <script>
                    window.onload = () =>{
                    let modal = document.getElementById("modalSucces")
                    modal.classList.add("is-active")
                    modal.onclick = function () {
                        modal.classList.remove("is-active");
                    }
                    }
                </script>
                <?php
            } catch (Exception $e) { ?>
                <script>alert("error de captcha")</script>
            <?php }
            try{
                //On se connecte à la BDD
                $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //On insère les données reçues
                $sth = $dbco->prepare("
            INSERT INTO form(name, lastname, subject, mail, country, gender, message)
            VALUES(:name, :lastname, :subject, :mail, :country, :gender, :message)");
                $sth->bindParam(':name',$name);
                $sth->bindParam(':lastname',$lastname);
                $sth->bindParam(':subject',$subject);
                $sth->bindParam(':mail',$filterEmail);
                $sth->bindParam(':country',$country);
                $sth->bindParam(':gender',$gender);
                $sth->bindParam(':message',$question);
                $sth->execute();
            }
            catch(PDOException $e){
                echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();

            }
        }
    }
}
?>