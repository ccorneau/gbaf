<?php
include('header.php');
include('bdd.php');
?>


    <div class="login-page">
        <div class="form">
            <h1>Connexion</h1>
            <hr/>
            <p>Veuillez vous authentifier</p>

            <form class="login-form" action="login.php" method="post">
                <div>
                    <input name="username" type="text" placeholder="Identifiant" />
                    <input name="password" type="password" placeholder="Mot de passe" />
                    <button>Connexion</button>
                    <p class="message"><a href="./register.php" class="btn">S'inscrire</a><br/>
                        <a href="./forget.php" class="btn">Mot de passe oublié ?</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

<?php 
if (isset($_POST['username']) AND isset($_POST['password'])) {

    $username = $_POST['username'];
    //  Récupération de l'utilisateur et de son password hashé
    $req = $bdd->prepare('SELECT id_user, password, prenom, nom FROM account WHERE username = :username');
    $req->execute(array(
        'username' => $_POST['username']));
    $resultat = $req->fetch();

    $prenom = isset($resultat['prenom']);
    $nom = isset($resultat['nom']);

    // Comparaison du password envoyé via le formulaire avec la bdd
    $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
    
    if (!$resultat) {
        echo '<h2>Mauvais identifiant ou mot de passe !</h2>';
    } else {
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['id'] = $resultat['id_user'];
            $_SESSION['username'] = $username;
            $_SESSION['prenom'] = $resultat['prenom'];
            $_SESSION['nom'] = $resultat['nom'];
            echo 'Vous êtes connecté !';
            header('Location: home.php');
        } else {
            echo '<h2> Mauvais identifiant ou mot de passe ! </h2>';
        }
    }
}

include('footer.php');
?>
