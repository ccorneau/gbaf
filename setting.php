<?php
session_start();
include('bdd.php');
include('header.php');

if (isset($_SESSION['username'])) { ?>
    <div class="container_page_acteur">
        <p>
            <a href="home.php">Retour à la liste des acteurs</a>
        </p>
    </div>

    <?php
    $req = $bdd->prepare('SELECT * FROM account WHERE username = :username');
    $req->execute(array(
        'username' => $_SESSION['username']));
    $donnees = $req->fetch();
    ?>

        <body>
            <div class="card">
                <article class="card-body">
                    <h4 class="card-title text-center mb-4 mt-1">Vos informations</h4>
                    <hr>
                    <p class="text-muted text-center">Vous pouvez modifier vos informations</p>
                    <form action="update.php" method="POST">
                        <div class="form-group"> Prénom
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="prenom" class="form-control" value="<?php echo $donnees['prenom']; ?>" type="text">
                            </div>
                            <!-- input-group.// -->
                        </div>
                        <!-- form-group// -->

                        <div class="form-group"> Nom
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="nom" class="form-control" value="<?php echo $donnees['nom']; ?>" type="text">
                            </div>
                            <!-- input-group.// -->
                        </div>
                        <!-- form-group// -->

                        <div class="form-group"> Identifiant
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="username" class="form-control" value="<?php echo $donnees['username']; ?>" type="text">
                            </div>
                            <!-- input-group.// -->
                        </div>
                        <!-- form-group// -->

                        <div class="form-group"> Mot de passe
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input class="form-control" name="password" value="<?php echo substr($donnees['password'],0,8); ?>" type="password">
                            </div>
                            <!-- input-group.// -->
                        </div>
                        <!-- form-group// -->

                        <div class="form-group"> Retapez votre mot de passe
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input class="form-control" name="password2" value="<?php echo substr($donnees['password'],0,8); ?>" type="password">
                            </div>
                            <!-- input-group.// -->
                            <?php if (isset($_SESSION['error'])){
                            echo $_SESSION['error']; 
                            } ?>
                        </div>
                        <!-- form-group// -->

                        <div class="form-group"> Question
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-question"></i> </span>
                                </div>
                                <input name="question" class="form-control" value="<?php echo $donnees['question']; ?>" type="text">
                            </div>
                            <!-- input-group.// -->
                        </div>
                        <!-- form-group// -->

                        <div class="form-group"> Réponse
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fas fa-arrow-right"></i> </span>
                                </div>
                                <input name="reponse" class="form-control" value="<?php echo $donnees['reponse']; ?>" type="text">
                            </div>
                            <!-- input-group.// -->
                        </div>
                        <!-- form-group// -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Modifiez  </button>
                        </div>
                        <!-- form-group// -->

                    </form>
                </article>
            </div>
        </body>

        <?php 
} else {
    header('Location: home.php');
}

include('footer.php');
?>