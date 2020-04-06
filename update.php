<?php
session_start();
include('bdd.php');

    $nom = $_POST['nom'];
    $prenom  = $_POST['prenom'];
    $username = $_POST['username'];
    $password  = $_POST['password'];
    $question  = $_POST['question'];
    $reponse = $_POST['reponse'];
   

// Hachage du mot de passe
$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

$data = [
    'nom' => $nom,
    'prenom' => $prenom,
    'username' => $username,
    'password' => $pass_hache,
    'question' => $question,
    'reponse' => $reponse,
    'id_user' => $_SESSION['id']
];
$sql = "UPDATE account SET nom=:nom, prenom=:prenom, username=:username, password=:password, question=:question, reponse=:reponse WHERE id_user=:id_user";
$stmt= $bdd->prepare($sql);
$stmt->execute($data);

header('Location: home.php');

?>