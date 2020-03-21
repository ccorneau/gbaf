<?php
include('header.php');
?>
<body>
    <h1>Mot de passe oublié ?</h1>
    <div class="home_login">
        <h2>Veuillez entrer votre adresse email</h2>
        <form action="login.php">
            Adresse email <input type="email" name="email"> 
           <br>
            <div class="home_link">
                <input type="submit" value="Envoyer le mot de passe"> 
            </div>
        </form>
    </div>    
</body>

<?php
include('footer.php');
?>
