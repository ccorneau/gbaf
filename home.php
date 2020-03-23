<?php
session_start();
include('header.php');
?>



<body>
    <h1>Le Groupement Banque Assurance Français​ (GBAF) est une fédération représentant les 6 grands groupes français</h1>
    <img src="#" alt="">
 
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

// On récupère les 5 derniers billets
$req = $bdd->query('SELECT * FROM acteur');

while ($donnees = $req->fetch())
{
?>

<div class="list_container">
    <div class="acteur_container">
    <div class="acteur_logo">
        <img src="./img/<?php echo $donnees['logo']; ?>" alt="">
    </div>
    <div class="acteur_title">
        <h3><?php echo $donnees['acteur']; ?></h3>
        <div class="acteur_description">
            <?php echo $donnees['description']; ?>
        </div>
        <button>Lire la suite</button>
    </div>
    </div>
</div>

<?php
} // Fin de la boucle des billets
$req->closeCursor();
?>
</body>

<?php
include('footer.php');
?>

