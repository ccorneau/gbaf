<?php

include('header.php');

 // Connexion à la base de données
 try
 {
     $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
 }
 catch(Exception $e)
 {
         die('Erreur : '.$e->getMessage());
 }



$req = $bdd->prepare('SELECT * FROM account WHERE username = :username2');
$req->execute(array(
    'username2' => $_POST['username2']));
$resultat = $req->fetch();


if ($_POST['reponse'] == $resultat['reponse']) {
    session_start();
    $_SESSION['id'] = $resultat['id_user'];
    $_SESSION['username'] = $resultat['username'];
    $_SESSION['prenom'] = $resultat['prenom'];
    $_SESSION['nom'] = $resultat['nom'];
    echo 'Vous êtes connecté !';
    header('Location: setting.php');
} else {
    echo '<h2>Mauvaise réponse</h2>';
    echo '<p class="text-center"><a href="./login.php" class="btn">Retour</a></p></h2>';
}
include('footer.php');

?>