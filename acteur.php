<?php
session_start();
include('bdd.php');
include('header.php');


if (isset($_SESSION['username'])) {

    // Récupération du billet
    $req = $bdd->prepare('SELECT * FROM acteur WHERE id_acteur = ?');
    $req->execute(array($_GET['id_acteur']));
    $donnees = $req->fetch();
    ?>

    <div class="container_page_acteur">
        <p><a href="home.php">Retour à la liste des acteurs</a></p>
        <img class="page_acteur_logo" src="./img/<?php echo $donnees['logo']; ?>" alt="">
        <h3><?php echo htmlspecialchars($donnees['acteur']);?></h3>
        <p><?php echo nl2br(htmlspecialchars($donnees['description']));?></p>
    </div>

    <?php
    // Récupération du billet
    $req = $bdd->prepare('SELECT COUNT(post) FROM post WHERE id_acteur = ?');
    $req->execute(array($_GET['id_acteur']));
    $nbCommentaires = $req->fetch();

 
    $req->closeCursor(); // Important : on libère le curseur pour la prochaine requête




 // récupére l'id_user pour le bouton like/dislike - Début
    $req = $bdd->prepare('SELECT id_user FROM account WHERE username = :username');
    $req->execute(array(
        'username' => $_SESSION['username']));
    $idUser = $req->fetch();
 // Fin  


    $req = $bdd->prepare('SELECT *
    FROM account
    INNER JOIN post
    ON account.id_user = post.id_user WHERE id_acteur = ? ORDER BY date_add');
    $req->execute(array($_GET['id_acteur']));

    // Compte le nombre de like - Début
    $like = $bdd->prepare('SELECT COUNT(vote) AS nbLike FROM vote WHERE vote = :like');
    $like->execute(array(
        'like' => 'like'));
    $nbLike = $like->fetch();
    // Fin
    // Compte le nombre de dislike - Début
    $dislike = $bdd->prepare('SELECT COUNT(vote) AS nbDislike FROM vote WHERE vote = :dislike');
    $dislike->execute(array(
        'dislike' => 'dislike'));
    $nbDislike = $dislike->fetch();
    // Fin
    ?>
<div class="container_info_acteur">
    <div class="nbCommentaire">
    <?php  
    if ($nbCommentaires[0] == 0) { ?>
        <h2>Il n'y a pas encore de commentaire</h2> <?php 
    } else if ($nbCommentaires[0] == 1) { ?>
        <h2><?php echo $nbCommentaires[0]; ?> commentaire</h2> <?php
    } else if ($nbCommentaires[0] > 1) { ?>
        <h2><?php echo $nbCommentaires[0]; ?> commentaires</h2> <?php
    } ?>

    </div>
    <div class="like">
    <a href="likes.php?id_acteur=<?php echo $donnees['id_acteur']; ?>&id_user=<?php echo $idUser['id_user']; ?>">J'AIME</a> <?php echo $nbLike['nbLike']; ?>
    <a href="dislikes.php?id_acteur=<?php echo $donnees['id_acteur']; ?>&id_user=<?php echo $idUser['id_user']; ?>">J'AIME PAS</a><?php echo $nbDislike['nbDislike']; ?>
    </div>
</div>
    <?php 

    while ($commentaires = $req->fetch()) { 
    ?>

    <div class="card commentaire">
        <article class="card-body">
            <p><strong>Publié par : <?php echo $commentaires['prenom']; ?></strong><br> le <?php echo date("d/m/Y H:i:s",strtotime($commentaires['date_add'])); ?></p>
            <p><?php echo nl2br(htmlspecialchars($commentaires['post'])); ?></p>
        </article>    
    </div> <!-- card.// -->
    
    <?php
    } // Fin de la boucle des commentaires
    $req->closeCursor();
    ?>

    <div class="card commentaire">
        <article class="card-body">
            <p class="text-muted text-center">Ecrivez votre commentaire</p>
            <form action="commentaire.php" method="GET">
                <input type="hidden" value="<?php echo $donnees['id_acteur']; ?>" name="id_acteur">
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control" name="post" placeholder="Votre commentaire" type="textarea" rows="25" cols="50">
                    </div> <!-- input-group.// -->
                </div> <!-- form-group// -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Publiez mon commentaire </button>
                </div> <!-- form-group// -->
            </form>
        </article>    
    </div> <!-- card.// -->

    <?php
} else {
    header('Location: login.php');
}
include('footer.php');
?>
