<?php
session_start();
include('header.php');

if (isset($_SESSION['username'])) {
    
    ?>



    <?php
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
   
$req = $bdd->query('SELECT * FROM account');
$donnees = $req->fetch();

?>

        <!-- <body>
            <h1>Vos informations</h1>
            <div class="home_login">
                <form action="setting.php" method="GET">
                    Votre identifiant <br><input type="text" name="username" value="<?php echo $donnees['username']; ?>"> <br> Votre mot de passe <br><input type="password" name="password" value="<?php echo $donnees['password']; ?>"> <br> Votre adresse email
                    <br><input type="text" name="password" value="<?php echo $donnees['password']; ?>"> <br>
                    <input type="submit" value="Effectuez les changements">
                </form>
            </div>
        </body> -->

        <div class="home_login">
        <h1>Vos informations</h1>
        <form action="inscription.php" method="POST">
                Identifiant <br> <input type="text" name="username" id="username" value="<?php echo $donnees['username']; ?>"> <br>
                Nom <br> <input type="text" name="nom" id="nom" value="<?php echo $donnees['nom']; ?>"> <br>
                Prénom <br> <input type="text" name="prenom" id="prenom" value="<?php echo $donnees['prenom']; ?>"> <br>
                Mot de passe <br> <input type="password" name="password" id="password" value="<?php echo $donnees['password']; ?>"> <br>
                Question <br> <input type="text" name="question" id="question" value="<?php echo $donnees['question']; ?>"> <br>
                Réponse <br> <input type="text" name="reponse" id="reponse" value="<?php echo $donnees['reponse']; ?>"> <br>
                <input type="submit" value="Envoyez">
        </form>
    </div>


<?php 
} else {
    header('Location: login.php');
}
include('footer.php');
?>