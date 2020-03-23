<?php
include('header.php');
?>
<body>
    <h1>S'incrire</h1>
    <div class="home_login">
        <form action="inscription.php" method="POST">
                Identifiant <br> <input type="text" name="username" id="username"> <br>
                Nom <br> <input type="text" name="nom" id="nom"> <br>
                Prénom <br> <input type="text" name="prenom" id="prenom"> <br>
                Mot de passe <br> <input type="password" name="password" id="password"> <br>
                Retapez votre mot de passe  <br> <input type="password" name="password2" id="password2"> <br>
                Question <br> <input type="text" name="question" id="question"> <br>
                Réponse <br> <input type="text" name="reponse" id="reponse"> <br>
                <input type="submit" value="Envoyez">
        </form>
    </div>


<?php
include('footer.php');
?>
