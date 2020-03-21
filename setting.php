<?php
include('header.php');
?>

<body>
    <h1>Vos informations</h1>
    <div class="home_login">
        <form action="setting.php" method="GET">
            Votre identifiant <br><input type="text" name="identifiant" value="gg"> <br>
            Votre mot de passe <br><input type="text" name="password" value="rr"> <br>
            Votre adresse email <br><input type="password" name="password" value=""> <br>
            <input type="submit" value="Effectuez les changements">
        </form>
    </div>
</body>

<?php
include('footer.php');
?>
