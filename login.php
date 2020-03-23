<?php
include('header.php');
?>

<body>
    <h1>Bienvenue</h1>
    <div class="home_login">
        <h2>Veuillez vous authentifier</h2>
        <form action="login.php" method="POST">
            Identifiant <input type="text" name="username"> 
            Mot de passe <input type="password" name="password"> 
            <input type="submit" value="Connexion"> <br>
        </form>
        <div class="home_link">
            <a href="./forget.php">Mot de passe oublié ?</a><br>
            <a href="./register.php">S'inscrire</a>
        </div>
    </div>
</body>


<?php 
if (isset($_POST['username']) AND isset($_POST['password']) ) {
    // Hachage du mot de passe
    $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
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
    $username = $_POST['username'];
    //  Récupération de l'utilisateur et de son pass hashé
    $req = $bdd->prepare('SELECT id_user, password FROM account WHERE username = :username');
    $req->execute(array(
        'username' => $_POST['username']));
    $resultat = $req->fetch();
    // var_dump($resultat['id_user']);
    // var_dump($_POST['password']);
    // var_dump($pass_hache);

    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($_POST['password'], $pass_hache);
    // var_dump($isPasswordCorrect);
    if (!$resultat)
    {
        echo 'Mauvais identifiant ou mot de passe !';
    }
    else
    {
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['id'] = $resultat['id_user'];
            $_SESSION['username'] = $username;
            echo 'Vous êtes connecté !';
        }
        else {
            echo 'Mauvais identifiant ou mot de passe !';
        }
    }
}
?>

<?php
echo $_SESSION['username'];
include('footer.php');
?>

