<?php
$email = $_POST["email"];
// the message
$msg = "Welcome, $email\n You have received this email to confirm your identity for your reset form on Afrendli. If you did not request this email sent please disregard. If you are the requestee please click the link below to reset your password/teamname. coachhiggy.com/afrendli/emailcheck.php";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("$email","Password/Username Recovery",$msg);

header("Location:login.php");

?>
