<?php
include('bdd.php');

$id_user = intval($_GET['id_user']);
$id_acteur = intval($_GET['id_acteur']);
$req = $bdd->prepare('SELECT id_acteur, id_user FROM vote WHERE id_user = :id_user AND id_acteur = :id_acteur ');
$req->execute(array(
    ':id_user' => $id_user,
    ':id_acteur' => $id_acteur));
$resultat = $req->fetch();

if ($resultat) {
        echo ' déjà voté';
    } else {
        $req = $bdd->prepare('INSERT INTO vote(id_user, id_acteur, vote) VALUES(:id_user, :id_acteur, :vote)');
        $req->execute(array(
            ':id_user' => $id_user,
            ':id_acteur' => $id_acteur,
            ':vote' => 'dislike'));
}

header("location:" . $_SERVER['HTTP_REFERER']);