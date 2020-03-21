<?php
include('header.php');
?>
<body>
    <h1>S'incrire</h1>
    <div class="home_login">
    <form action="login.php" method="POST">
            Identifiant <br> <input type="text" name="identifiant"> <br>
            Mot de passe <br> <input type="password" name="password"> <br>
            Retapez votre mot de passe  <br> <input type="password" name="password2"> <br>
            Adresse email <br> <input type="email" name="email"> <br>
            <input type="submit" value="Envoyez">
        </form>
    </div>
  
</body>

<?php
include('footer.php');
?>
