<?php
include('bdd.php');
include('header.php');
?>

    <div id="js" class="login-page">
        <div class="form">
        <h1>Mot de passe oublié</h1>
            <hr/>
            <p>Entrez votre identifiant</p>
            <form class="login-form" action="./forget.php" method="post">
                <input name="username" placeholder="Identifiant" type="text" />
                <button>Envoyez</button>
                <p class="message">
                    <a href="./login.php">Se connecter</a>
                    <br/>
                    <a href="./login.php">Retour</a>
                </p>
            </form>
        </div>
    </div>

<?php
if (isset($_POST['username'])) {
    $username = htmlspecialchars($_POST['username']);
    $req = $bdd->prepare('SELECT username, question, reponse, password FROM account WHERE username = :username');
    $req->execute(array(
        ':username' => $username ));
    $resultat = $req->fetch();
    if($resultat){
        if ($_POST['username'] == $resultat['username']){?>
            <script>
                document.getElementById("js").style.display = "none";            
            </script>

    <div class="login-page">
        <div class="form">
            <h1>Votre question secrète</h1>
            <hr/>
            <p>
                <?php echo 'Bonjour '. $resultat['username']; ?>
            </p>

            <form class="login-form" action="forget-check.php" method="post">
                <input type="hidden" value="<?php echo $resultat['username']; ?>" name="username2">
                <input name="question" value="<?php echo $resultat['question']; ?>" type="text" /> Entrez votre réponse
                <input name="reponse" placeholder="Votre réponse" type="text" />
                <button>Envoyez</button>
                <p class="message">
                    <a href="./login.php">Se connecter</a>
                    <br/>
                    <a href="./login.php">Retour</a>
                </p>
            </form>
        </div>
    </div>

  <?php
        } 
        
    } else {
        echo '<h2>Il n y a aucun identifiant avec ' . $_POST['username'] . '</h2>';
    }

}

include('footer.php');