<?php
session_start();
include('header.php');

if (isset($_SESSION['username'])) {?>

    <body>
        <h1>Le Groupement Banque Assurance Français​ (GBAF)</h1>
        <img class="center" src="./img/gbaf-white.png" alt="Groupement Banque Assurance Français​ Illustration">
        <h2>Une fédération représentant les 6 grands groupes français</h2>
        <h3 class="title_listing">Nos partenaires :</h3>
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
                    <a href="acteur.php?id_acteur=<?php echo $donnees['id_acteur']; ?>"><button>Lire la suite <?php echo $donnees['id_acteur']; ?></button></a>
                </div>
            </div>
        </div>
    </body>
    <?php
    } // Fin de la boucle des billets
    $req->closeCursor();

} else {
    header('Location: login.php');
}
include('footer.php');
?>

