<?php
include('header.php');
?>
</body>
        <main>
    <section class="form">
        <h1>Changer votre mot de passe</h1>
                    <form method="post">
                <input type="hidden" name="change_pass_form" value="username">
                <label for="username">Saisissez votre nom d'utilisateur : </label><input type="text" name="username" id="username" value="admin" required="">
                <p class="error">Utilisateur inconnu</p>
                <input type="submit" value="Valider">
            </form>
            </section>
</main>


<?php
include('footer.php');
?>

</body>