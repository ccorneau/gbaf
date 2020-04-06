<?php
session_start();
include('header.php');
?>
<body>
    <div class="card">
        <article class="card-body">
            <h4 class="card-title text-center mb-4 mt-1">Inscription</h4>
            <hr>
            <p class="text-muted text-center">Veuillez renseigner les informations</p>
            <form action="inscription.php" method="POST">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="prenom" class="form-control" placeholder="Prénom" type="text">
                    </div>
                    <!-- input-group.// -->
                </div>
                <!-- form-group// -->

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="nom" class="form-control" placeholder="Nom" type="text">
                    </div>
                    <!-- input-group.// -->
                </div>
                <!-- form-group// -->

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="username" class="form-control" placeholder="Identifiant" type="text">
                    </div>
                    <!-- input-group.// -->
                </div>
                <!-- form-group// -->

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input class="form-control" name="password" placeholder="******" type="password">
                    </div>
                    <!-- input-group.// -->
                </div>
                <!-- form-group// -->

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input class="form-control" name="password2" placeholder="******" type="password">
                    </div>
                    <!-- input-group.// --> 
                    <?php if (isset($_SESSION['error'])){
                        echo $_SESSION['error']; 
                    } ?>
                </div>
                <!-- form-group// -->

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-question"></i> </span>
                        </div>
                        <input name="question" class="form-control" placeholder="Ecrivez une question" type="text">
                    </div>
                    <!-- input-group.// -->
                </div>
                <!-- form-group// -->

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-arrow-right"></i> </span>
                        </div>
                        <input name="reponse" class="form-control" placeholder="Réponse à la question" type="text">
                    </div>
                    <!-- input-group.// -->
                </div>
                <!-- form-group// -->

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Inscription  </button>
                </div>
                <!-- form-group// -->

                <p class="text-center"><a href="./register.php" class="bext-muted n">S'inscrire</a> <br>
                    <a href="./forget.php" class="ext-muted ">Mot de passe oublié ?</a></p>
            </form>
        </article>
    </div>
</body>

<?php
include('footer.php');
?>
