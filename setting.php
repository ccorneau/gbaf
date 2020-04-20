<?php
session_start();
include('bdd.php');
include('header.php');

if (isset($_SESSION['username'])) { ?>
    <div class="container_page_acteur">
        <p>
            <a href="home.php">Retour à la liste des acteurs</a>
        </p>
    </div>

    <?php
    $req = $bdd->prepare('SELECT * FROM account WHERE username = :username');
    $req->execute(array(
        'username' => $_SESSION['username']));
    $donnees = $req->fetch();
    ?>

    <body>
        <div class="login-page">
            <div class="form">
                <h1>Vos informations</h1>
                <hr>
                <p>Vous pouvez modifier vos informations</p>

                <form class="login-form" action="update.php" method="POST">
                    <label for="prenom">Prénom
                <input name="prenom" class="form-control" value="<?php echo $donnees['prenom']; ?>" type="text">
                </label>
                    <label for="nom">Nom
                <input name="nom" class="form-control" value="<?php echo $donnees['nom']; ?>" type="text">
                </label>
                    <label for="username">Identifiant
                <input name="username" class="form-control" value="<?php echo $donnees['username']; ?>" type="text">
                </label>
                    <label for="password">Mot de passe
                <input class="form-control" name="password" value="<?php echo substr($donnees['password'],0,8); ?>" type="password">
                </label>
                    <label for="password2">Retapez votre mot de passe
                <input class="form-control" name="password2" value="<?php echo substr($donnees['password'],0,8); ?>" type="password">
                    <?php if (isset($_SESSION['error'])){
                        echo $_SESSION['error']; 
                    } ?>
                    </label>
                    <label>
                    Question
                <input name="question" class="form-control" value="<?php echo $donnees['question']; ?>" type="text">
                </label>
                    <label>
                Réponse
                <input name="reponse" class="form-control" value="<?php echo $donnees['reponse']; ?>" type="text">
                </label>
                    <button>Modifiez</button>
                    <p class="message"><a href="./login.php" class="btn">Se connecter</a><br>
                        <a href="./forget.php" class="btn">Mot de passe oublié ?</a></p>
                </form>
            </div>
        </div>
    </body>

    <?php 
} else {
    header('Location: home.php');
}

include('footer.php');
?>