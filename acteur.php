<?php
session_start();
include('header.php');
if (isset($_SESSION['username'])) {
?>


        
 
<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération du billet
$req = $bdd->prepare('SELECT * FROM acteur WHERE id_acteur = ?');
$req->execute(array($_GET['id_acteur']));
$donnees = $req->fetch();

?>

<div class="container_page_acteur">
<p><a href="home.php">Retour à la liste des acteurs</a></p>
    <img class="page_acteur_logo" src="./img/<?php echo $donnees['logo']; ?>" alt="">
        <h3><?php echo htmlspecialchars($donnees['acteur']);?></h3>
        <p>
        <?php echo nl2br(htmlspecialchars($donnees['description']));?>
        </p>
</div>

<h2>Commentaires</h2>

<?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
$req = $bdd->prepare('SELECT * FROM post WHERE id_acteur = ? ORDER BY date_add');
$req->execute(array($_GET['id_acteur']));

while ($commentaires = $req->fetch())
{
?>
<div class="card commentaire">
    <article class="card-body">
<p><strong>Publié par : <?php echo htmlspecialchars($commentaires['id_user']); ?></strong><br> le <?php echo $commentaires['date_add']; ?></p>
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

<!-- <form action="commentaire.php" method="GET">
    <h3>Mon commentaire</h3>
    <input type="hidden" value="<?php echo $donnees['id_acteur']; ?>" name="id_acteur">
    <input type="textarea" name="post"> <br>
    <input type="submit" value="Publiez mon commentaire">
</form> -->




<?php

} else {
    header('Location: login.php');
}
include('footer.php');
?>
