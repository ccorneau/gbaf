<?php
include('bdd.php');
include('header.php');

$username2 = htmlspecialchars($_POST['username2']);

$req = $bdd->prepare('SELECT id_user, password, prenom, username, nom, question, reponse  FROM account WHERE username = :username2');
$req->execute(array(
    ':username2' => $username2));
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
    echo '<p class="text-center"><a href="forget.php" class="btn">Retour</a></p></h2>';
}
include('footer.php');

?>