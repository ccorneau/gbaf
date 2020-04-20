<?php
session_start();
include('header.php');
?>

    <div class="login-page">
        <div class="form">
            <h1>Inscription</h1>
            <hr/>
            <p>Veuillez renseigner les informations</p>

            <form class="login-form" action="inscription.php" method="post">
                <div>
                    <input name="prenom" placeholder="Prénom" type="text" />
                    <input name="nom" placeholder="Nom" type="text" />
                    <input name="username" placeholder="Identifiant" type="text" />
                    <input name="password" placeholder="******" type="password" />
                    <input name="password2" placeholder="******" type="password" />
                    <?php if (isset($_SESSION['error'])){
                        echo $_SESSION['error']; 
                    } ?>
                    <input name="question" placeholder="Ecrivez une question" type="text" />
                    <input name="reponse" placeholder="Réponse à la question" type="text" />
                    <button>Inscription</button>
                    <p class="message"><a href="./login.php" class="btn">Se connecter</a><br/>
                        <a href="./forget.php" class="btn">Mot de passe oublié ?</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

<?php
include('footer.php');
?>
