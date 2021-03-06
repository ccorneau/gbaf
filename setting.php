<?php
session_start();
include('bdd.php');
include('header.php');

if (isset($_SESSION['username'])) { ?>


    <div class="container_page_acteur">
        <p>
            <a href="index.php">Retour à la liste des acteurs</a>
        </p>
    </div>

    <?php
    $req = $bdd->prepare('SELECT id_user, nom,prenom,username,password,question,reponse FROM account WHERE username = :username');
    $req->execute(array(
        ':username' => $_SESSION['username']));
    $donnees = $req->fetch();
    ?>

<div class="login-page">
    <div class="form">
        <h1>Vos informations</h1>
        <hr/>
        <p>Vous pouvez modifier vos informations</p>
        <form class="login-form" action="update.php" method="post">
            <label for="prenom">Prénom</label>
            <input name="prenom" id="prenom" value="<?php echo $donnees['prenom']; ?>" type="text" />
            <label for="nom">Nom</label>
            <input name="nom" id="nom" value="<?php echo $donnees['nom']; ?>" type="text" />
            <label for="username">Identifiant</label>
            <input name="username" id="username" value="<?php echo $donnees['username']; ?>" type="text" />
            <label for="password">Mot de passe</label>
            <input name="password" id="password" value="<?php echo substr($donnees['password'],0,8); ?>" type="password" />
            <label for="password2">Retapez votre mot de passe</label>
            <input name="password2" id="password2" value="<?php echo substr($donnees['password'],0,8); ?>" type="password" />
            <?php if (isset($_SESSION['error'])){
                    echo $_SESSION['error']; 
                } ?>
            <label for="question">Question</label>
            <input name="question" id="question" value="<?php echo $donnees['question']; ?>" type="text" />
            <label for="reponse">Réponse</label>
            <input name="reponse" id="reponse" value="<?php echo $donnees['reponse']; ?>" type="text" />
            <button>Modifiez</button>
            <p class="message">
                <a href="./login.php">Se connecter</a>
                <br/>
                <a href="./forget.php">Mot de passe oublié ?</a>
            </p>
        </form>
    </div>
</div>


    <?php 
} else {
    header('Location: index.php');
}

include ('footer.php');
?>