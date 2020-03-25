<?php
	
// header("location:" . $_SERVER['HTTP_REFERER']);

    $nom = $_POST['nom'];
    $prenom  = $_POST['prenom'];
    $username = $_POST['username'];
    $password  = $_POST['password'];
    $question  = $_POST['question'];
    $reponse = $_POST['reponse'];
    // Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

    // Hachage du mot de passe
$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // Insertion
$req = $bdd->prepare('INSERT INTO account(nom, prenom, username, password, question, reponse) VALUES(:nom, :prenom, :username, :password, :question, :reponse)');
$req->execute(array(
    'nom' => $nom,
    'prenom' => $prenom,
    'username' => $username,
    'password' => $pass_hache,
    'question' => $question,
    'reponse' => $reponse));
    
    header('Location: login.php');
?>