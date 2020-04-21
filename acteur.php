<?php
session_start();
include('bdd.php');
include('header.php');


if (isset($_SESSION['username'])) {

    $id_acteur = intval($_GET['id_acteur']);

    // Récupération des informations de l'acteur
    $req = $bdd->prepare('SELECT id_acteur,acteur,description,logo FROM acteur WHERE id_acteur = ?');
    $req->execute(array($id_acteur));
    $donnees = $req->fetch();
    ?>
   

    <div class="container_page_acteur">
        <p><a href="index.php">Retour à la liste des acteurs</a></p>
        <img class="page_acteur_logo" src="./img/<?php echo $donnees['logo']; ?>" alt="<?php echo $donnees['acteur']; ?>" />
        <h1>
            <?php echo htmlspecialchars($donnees['acteur']);?>
        </h1>
        <p>
            <?php echo nl2br(htmlspecialchars($donnees['description']));?>
        </p>
   

    

        <?php
        // Récupération nombre de commentaires
        $req = $bdd->prepare('SELECT COUNT(post) FROM post WHERE id_acteur = ?');
        $req->execute(array($id_acteur));
        $nbCommentaires = $req->fetch();

        $req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

        // récupére l'id_user pour le bouton like/dislike - Début
        $req = $bdd->prepare('SELECT id_user FROM account WHERE username = :username');
        $req->execute(array(
            ':username' => $_SESSION['username']));
        $idUser = $req->fetch();
        // Fin  

        $req = $bdd->prepare('SELECT id_post,id_acteur,date_add,post,nom,prenom
        FROM account
        INNER JOIN post
        ON account.id_user = post.id_user WHERE id_acteur = ? ORDER BY date_add DESC');
        $req->execute(array($id_acteur));

        // Compte le nombre de like - Début
        $like = $bdd->prepare('SELECT COUNT(vote) AS nbLike FROM vote WHERE vote = :like');
        $like->execute(array(
            ':like' => 'like'));
        $nbLike = $like->fetch();
        // Fin

        // Compte le nombre de dislike - Début
        $dislike = $bdd->prepare('SELECT COUNT(vote) AS nbDislike FROM vote WHERE vote = :dislike');
        $dislike->execute(array(
            ':dislike' => 'dislike'));
        $nbDislike = $dislike->fetch();
        // Fin
        ?>

        <div class="container_info_acteur">
            <div class="nbCommentaire">
            <?php  
                if ($nbCommentaires[0] == 0) { ?>
                    <h2>0 commentaire</h2> <?php 
                } else if ($nbCommentaires[0] == 1) { ?>
                    <h2><?php echo $nbCommentaires[0]; ?> commentaire</h2> <?php
                } else if ($nbCommentaires[0] > 1) { ?>
                    <h2><?php echo $nbCommentaires[0]; ?> commentaires</h2> <?php
                } 
            ?>
            </div>
            <?php     
                $res = $bdd->prepare('SELECT id_acteur, id_user FROM post WHERE id_user = :id_user AND id_acteur = :id_acteur');
                $res->execute(array(
                    ':id_user' => $_SESSION['id'],
                    ':id_acteur' => $id_acteur));
                $newCommentaire = $res->fetch();

                if (!$newCommentaire){?>
                    <button id="newButton" class="acteur_button" onclick="viewButton()">Nouveau commentaire</button>
                    <script>
                        function viewButton() {
                            document.getElementById("new_commentaire").style.display = "block";
                            document.getElementById("newButton").style.display = "none";
                        }
                    </script> <?php
                } else {
                    echo 'Vous avez déposé un commentaire pour cet acteur';
                } 
            ?>    
            <div class="like">
                <a style="color:green !important" href="likes.php?id_acteur=<?php echo $donnees['id_acteur']; ?>&id_user=<?php echo $idUser['id_user']; ?>"><?php echo $nbLike['nbLike']; ?><i class="fas fa-thumbs-up"></i></a> 
                <a style="color:red !important" href="dislikes.php?id_acteur=<?php echo $donnees['id_acteur']; ?>&id_user=<?php echo $idUser['id_user']; ?>"><i class="fas fa-thumbs-down"></i><?php echo $nbDislike['nbDislike']; ?></a>
            </div>
        </div>

        <!-- Nouveau commentaire début -->

        <div class="form commentaire" id="new_commentaire" >
            <form class="login-form"  action="commentaire.php" method="get">
                    <p>Ecrivez votre commentaire</p>
                    <input type="hidden" value="<?php echo $donnees['id_acteur']; ?>" name="id_acteur" />
                    <input name="post" placeholder="Votre commentaire" type="text" />
                    <button type="submit">Publiez mon commentaire</button>
            </form>
        </div>

        <?php 
            while ($commentaires = $req->fetch()) { 
        ?>

        <div class="commentaire">
            <div class="login-form">
                <p class="acteur_header_commentaire"><strong>Publié par : <?php echo $commentaires['prenom']; ?></strong><br/> le
                    <?php echo date("d/m/Y H:i:s",strtotime($commentaires['date_add'])); ?>
                </p>
                <p>
                    <?php echo nl2br(htmlspecialchars($commentaires['post'])); ?>
                </p>
            </div>
        </div>
    <?php
    } // Fin de la boucle des commentaires
    $req->closeCursor();
?> 
    </div>
<?php
} else {
    header('Location: login.php');
}
include('footer.php');
?>