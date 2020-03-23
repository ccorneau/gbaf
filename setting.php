<?php
include('header.php');
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
<body>
    <h1>Vos informations</h1>
    <div class="home_login">
        <form action="setting.php" method="GET">
            Votre identifiant <br><input type="text" name="username" value="<?php echo $donnees['username']; ?>"> <br>
            Votre mot de passe <br><input type="text" name="password" value="<?php echo $donnees['password']; ?>"> <br>
            Votre adresse email <br><input type="password" name="password" value="<?php echo $donnees['password']; ?>"> <br>
            <input type="submit" value="Effectuez les changements">
        </form>
    </div>
</body>

<?php
include('footer.php');
?>
