<?php

include('header.php');

 // Connexion à la base de données
 try
 {
     $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
 }
 catch(Exception $e)
 {
         die('Erreur : '.$e->getMessage());
 }

?>


<body>
    <div id="js" class="card">
        <article class="card-body">
            <h4 class="card-title text-center mb-4 mt-1">Mot de passe oublié</h4>
            <hr>
            <p class="text-muted text-center">Entrez votre identifiant</p>
            <form action="forget.php" method="POST">
            <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="username" class="form-control" placeholder="Identifiant" type="text">
            </div> <!-- input-group.// -->
            </div> <!-- form-group// -->
           
            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"> Connexion  </button>
            </div> <!-- form-group// -->
            <p class="text-center"><a href="./login.php" class="btn">Retour</a></p>
            </form>
        </article>
    </div> <!-- card.// -->
</body>

<?php

if (isset($_POST['username'])) {
$req = $bdd->prepare('SELECT username, question, reponse, password FROM account WHERE username = :username');
$req->execute(array(
    'username' => $_POST['username']));
$resultat = $req->fetch();

if ($_POST['username'] == $resultat['username']){?>
<script type="text/javascript">
document.getElementById("js").style.display = "none";            
</script>

<div class="card">
        <article class="card-body">
            <h4 class="card-title text-center mb-4 mt-1">Votre question secrète</h4>
            <hr>
            <p class="text-muted text-center"><?php echo 'Bonjour '. $resultat['username']; ?></p>
            <form action="forget-check.php" method="POST">
            <div class="form-group"> Votre question
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-question"></i> </span>
                </div>
                <input type="hidden" value="<?php echo $resultat['username']; ?>" name="username2">
                <input name="question" class="form-control" value="<?php echo $resultat['question']; ?>" type="text">
            </div> <!-- input-group.// -->
            </div> <!-- form-group// -->
           
            <div class="form-group"> Entrez votre réponse 
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-arrow-right"></i> </span>
                </div>
                <input name="reponse" class="form-control" placeholder="Votre réponse" type="text">
            </div> <!-- input-group.// -->
            </div> <!-- form-group// -->

            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"> Envoyez  </button>
            </div> <!-- form-group// -->
            <p class="text-center"><a href="./login.php" class="btn">Retour</a></p>
            </form>
        </article>
    </div> <!-- card.// -->

<?php
if ($_POST['reponse'] == $resultat['reponse']) {
    echo 'Bonne réponse';
} else {
    echo 'Mauvaise réponse';
}

} else {
    echo '<h2>Il n y a aucun identifiant avec ' . $_POST['username'] . '</h2>';
}
include('footer.php');
}
?>
