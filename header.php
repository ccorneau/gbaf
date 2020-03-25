<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Extranet GBAF</title>
        <meta name="description" content="Extranet GBAF" />
        <meta name="keywords" content="Extranet GBAF" />
        <link type="text/css" rel="stylesheet" href="./css/style.css" title="style" />
        <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="./img/favicon.png" />

        <div class="container_header">
            <div id="logo">
              <?php  if (isset($_SESSION['username'])) {?>
                <a href="home.php"><img class="logo_img" src="./img/logo_GBAF.png" alt="Logo GBAF"></a>
              <?php }
              else { ?>
                <a href="login.php"><img class="logo_img" src="./img/logo_GBAF.png" alt="Logo GBAF"></a> 
              <?php }?>
            </div>

            <?php if (isset($_SESSION['username'])) {?>
            <div id="id_connect">
                <i class="fa fa-user fa-3x" aria-hidden="true"><?php echo $_SESSION['username']; ?></i>
                <br>
                <a href="setting.php">Vos informations</a>
                <br>
                <a href="deconnexion.php">Se deconnecter</a>
            </div>
            <?php }?>
        </div>
        <hr>
    </head>    