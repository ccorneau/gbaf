<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Extranet GBAF</title>
    <meta name="description" content="Extranet GBAF" />
    <meta name="keywords" content="Extranet GBAF" />
    <link type="text/css" rel="stylesheet" href="./css/style.css" title="style" />
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" />
    <link rel="icon" href="./img/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <?php 
if (isset($_SESSION['username'])) {?>

    <div class="container_header">
        <div id="logo">
            <a href="home.php"><img class="logo_img_home" src="./img/logo_GBAF.png" alt="Logo GBAF"/></a>
        </div>
        <div id="id_connect">
            <i class="fa fa-user fa-2x"></i><strong><?php echo $_SESSION['nom'] . ' ' . $_SESSION['prenom']; ?></strong>
        </div>
        <div class="container_link">
            <a href="setting.php">Vos informations</a> | <a href="deconnexion.php">Se deconnecter</a>
        </div>
    </div>
<?php 
} else { ?>
    <div class="container_home">
        <div id="logo">
            <a href="home.php"><img class="logo_img_home" src="./img/logo_GBAF.png" alt="Logo GBAF"/></a>
        </div>
    </div>
<?php 
} ?>
<hr/>
