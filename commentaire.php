<?php
session_start();


// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}



$req = $bdd->prepare('INSERT INTO post(id_user, id_acteur, date_add, post) VALUES(:id_user, :id_acteur, :date_add, :post)');
$req->execute(array(
    'id_user' => $_SESSION['id'],
    'id_acteur' => $_GET['id_acteur'],
    'date_add'=> '2003/01/22 01:00:00',
    'post' => $_GET['post']));

    header("location:" . $_SERVER['HTTP_REFERER']);

?>