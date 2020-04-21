<?php
session_start();
include('bdd.php');

$id_user = intval($_SESSION['id']);
$id_acteur = intval($_GET['id_acteur']);
$post = htmlspecialchars($_GET['post']);

$req = $bdd->prepare('INSERT INTO post(id_user, id_acteur, date_add, post) VALUES(:id_user, :id_acteur, now(), :post)');
$req->execute(array(
    ':id_user' => $id_user,
    ':id_acteur' => $id_acteur,
    ':post' => $post));

header("location:" . $_SERVER['HTTP_REFERER']);

?>