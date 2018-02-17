<?php
$to="hello.brussely@gmail.com";
$subject="Message depuis le site Brussely";
$message= "Message envoyé depuis le formulaire du site : " . $_POST['message'];
$from = $_POST['email'];
$name = $_POST['name'];
$header = "message de la part de: " . $name . " (" . $from . ")";




if(isset ($_POST["potdemiel"])) {
	echo "t'es qu'un putain de robot qui veut me faire chier et le formulaire n'a pas été envoyé !";
}



if (!empty($_POST['message'] AND $_POST['name'])) {
	mail ($to , $subject , $message, $header);
	echo "Merci " . $name . ", le mail a été envoyé!";	
}

// if (mail ($to , $subject , $message, $header)) {
// 	echo "Merci " . $name . ", le mail a été envoyé!";	
// }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Brussely</title>
  </head>
  <body>

    <a href="index.html"> Clique ici pour revenir sur le site de Brussely </a>
  </body>
</html>
