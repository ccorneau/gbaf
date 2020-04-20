<?php
require_once('config.php');
// Connexion à la base de données
    try
    {
        $bdd = new PDO("mysql:host=$location;dbname=$database;charset=utf8", $user_bdd, $password_bdd);
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }