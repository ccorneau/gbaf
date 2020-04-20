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
            <div>
                <input name="username" class="form-control" placeholder="Identifiant" type="text" />
                    <button>Envoyez</button>
                    <p class="message"><a href="./login.php" class="btn">Se connecter</a><br/>
                        <a href="./login.php" class="btn">Retour</a></p>
            </div>
            </form>
        </div>
    </div>


<?php
if (isset($_POST['username'])) {
    $req = $bdd->prepare('SELECT username, question, reponse, password FROM account WHERE username = :username');
    $req->execute(array(
        'username' => $_POST['username']));
    $resultat = $req->fetch();
    if($resultat){
        if ($_POST['username'] == $resultat['username']){?>
            <script type="text/javascript">
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
                <div>
                    <input type="hidden" value="<?php echo $resultat['username']; ?>" name="username2">
                    <input name="question" class="form-control" value="<?php echo $resultat['question']; ?>" type="text" /> Entrez votre réponse
                    <input name="reponse" class="form-control" placeholder="Votre réponse" type="text" />
                    <button>Envoyez</button>
                    <p class="message"><a href="./login.php" class="btn">Se connecter</a><br/>
                        <a href="./login.php" class="btn">Retour</a></p>
                </div>
            </form>
        </div>
    </div>

  <?php
        } 
        
    } else {
        echo '<h2>Il n y a aucun identifiant avec ' . $_POST['username'] . '</h2>';
    }

}
?>
</body>
<?php 

include('footer.php');