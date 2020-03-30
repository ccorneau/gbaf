<?php
include('bdd.php');

$req = $bdd->prepare('SELECT id_acteur, id_user FROM vote WHERE id_user = :id_user');
$req->execute(array(
    'id_user' => $_GET['id_user']));
$resultat = $req->fetch();

if ($resultat['id_acteur'] == $_GET['id_acteur'] AND $resultat['id_user'] == $_GET['id_user']) {
        echo ' deja voté';
    } else {
        $req = $bdd->prepare('INSERT INTO vote(id_user, id_acteur, vote) VALUES(:id_user, :id_acteur, :vote)');
        $req->execute(array(
            'id_user' => $_GET['id_user'],
            'id_acteur' => $_GET['id_acteur'],
            'vote' => 'dislike'));
}



header("location:" . $_SERVER['HTTP_REFERER']);