<?php
session_start();
include('bdd.php');
include('header.php');

if (isset($_SESSION['username'])) {?>

    <body>
        <h1>Le Groupement Banque Assurance Français​ (GBAF)</h1>
        <img class="center" src="./img/gbaf-white.png" alt="Groupement Banque Assurance Français​ Illustration">
        <h2>Une fédération représentant les 6 grands groupes français</h2>
        <h3 class="title_listing">Nos partenaires :</h3>

    <?php
    // Récupération des acteurs en bdd
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
                    <a href="acteur.php?id_acteur=<?php echo $donnees['id_acteur']; ?>"><button>Lire la suite</button></a>
                </div>
            </div>
        </div>
    </body>
    <?php
    } // Fin de la boucle des acteurs
    $req->closeCursor();

} else {
    header('Location: login.php');
}
include('footer.php');
?>

