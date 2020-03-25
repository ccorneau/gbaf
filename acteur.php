<?php
session_start();
include('header.php');
?>
        <p><a href="home.php">Retour à la liste des acteurs</a></p>
 
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
echo 'voici le ID_ACTEUR = ' . $_GET['id_acteur'];
?>

<div class="news">
<div class="acteur_logo">
                <img src="./img/<?php echo $donnees['logo']; ?>" alt="">
    </div>
    <h3>
        <?php echo htmlspecialchars($donnees['acteur']); ?>
       
    </h3>
  
    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['description']));
    ?>
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
<p><strong><?php echo htmlspecialchars($commentaires['id_user']); ?></strong> le <?php echo $commentaires['date_add']; ?></p>
<p><?php echo nl2br(htmlspecialchars($commentaires['post'])); ?></p>
<?php
} // Fin de la boucle des commentaires
$req->closeCursor();

?>

<?php
$date = date_create('2000-01-01');
echo date_format($date, 'Y-m-d H:i:s');
?>


<form action="commentaire.php" method="GET">
    <h3>Mon commentaire</h3>
    <input type="hidden" value="<?php echo $donnees['id_acteur']; ?>" name="id_acteur">
    <input type="textarea" name="post"> <br>
    <input type="submit" value="Publiez mon commentaire">
</form>


</body>
</html>
<?php
include('footer.php');
?>
