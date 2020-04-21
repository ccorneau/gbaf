<?php
session_start();
include('bdd.php');

$nom = htmlspecialchars($_POST['nom']);
$prenom  = htmlspecialchars($_POST['prenom']);
$username = htmlspecialchars($_POST['username']);
$password  = htmlspecialchars($_POST['password']);
$question  = htmlspecialchars($_POST['question']);
$reponse = htmlspecialchars($_POST['reponse']);

if ($_POST['password'] == $_POST['password2']) {
    // Hachage du mot de passe
    $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // Insertion
    $req = $bdd->prepare('INSERT INTO account(nom, prenom, username, password, question, reponse) VALUES(:nom, :prenom, :username, :password, :question, :reponse)');
    $req->execute(array(
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':username' => $username,
        ':password' => $pass_hache,
        ':question' => $question,
        ':reponse' => $reponse));

    header('Location: login.php');
} else {
    $errorPassword = 'Vérifiez votre mot de passe car ils ne sont pas identique';
    $_SESSION['error'] = $errorPassword;
    
    header("location:" . $_SERVER['HTTP_REFERER']);
}
?>