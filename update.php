<?php
session_start();


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