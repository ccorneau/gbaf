<?php
include('header.php');
?>

<body>
    <h1>Bienvenue</h1>
    <div class="home_login">
        <h2>Veuillez vous authentifier</h2>
        <form action="login.php" method="GET">
            Identifiant <input type="text" name="identifiant"> 
            Mot de passe <input type="password" name="password"> 
            <input type="submit" value="Connexion"> <br>
        </form>
        <div class="home_link">
            <a href="./forget.php">Mot de passe oubliée ?</a><br>
            <a href="./register.php">S'inscrire</a>
        </div>
    </div>
</body>

<?php
include('footer.php');
?>

