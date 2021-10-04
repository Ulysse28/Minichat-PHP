<?php

/*minichat_post.php file
*By Ulysse Valdenaire
*04/10/2021
*insert into the database the datas from the form in minichat.php
*/


//connexion to the database
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}
catch (Exeption $e)
{
    die('Erreur : ' .$e->getMessage());
}

//insert into the database
$req = $bdd->prepare('INSERT INTO minichat(pseudo, message)VALUES(:pseudo, :message)');
$req->execute(array(
    'pseudo' => $_POST['pseudo'],
    'message'=>$_POST['message']
));

//go back to minichat.php
header('Location: minichat.php');
?>
