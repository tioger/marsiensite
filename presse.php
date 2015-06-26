<?php
include ("../bdd/localhostpdo/_mysql.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIMPLonMARS or how learn to learn | Presse</title>
	
	<!-- core CSS -->
    <link href="css/bootstrap.min2.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/presse.css" rel="stylesheet">
	
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

    <?php include 'menu.php'; ?>
    <div class="" style="background-color:#2e2e2e;">
        <section class="title">
            <div class="">
                <h1>Ils parlent de nous</h1>
                <p class="">SIMPLonMARS dans les médias</p>
            </div>
        </section>
    </div>
	<section id="equipe">
        <div class="languagediv" id="bloc_article">
            <?php  
                include ("../bdd/localhostpdo/_mysql.php"); 
                // On récupère tout le contenu de la table Tuto
                $reponse = $bdd->query('SELECT * FROM Press');

                // On affiche chaque entrée une à une
                while ($donnees = $reponse->fetch())
                {
            ?>
            <div class="container">
                <h2><?php echo utf8_decode($donnees['Source']); ?></h2>
                <h3><?php echo $donnees['Titre']; ?></h3>  
                <p class="dtat"><span class="underline">Ecrit par</span> <span id="capitalize"> <?php echo $donnees['Auteur']; ?></span> | <span  class="underline">Publié le </span> <?php echo utf8_decode($donnees['DATE']); ?></p>
                <p><?php echo utf8_decode($donnees['Contenu']); ?></p>
                <p><a href="<?php echo $donnees['Lien']; ?>" target="blank"><strong>Lire la suite</strong></a></p>
                <div class="clear"></div>
            </div>
            <div class="hr">
                <div class="sep"></div>
            </div>
            <?php

            }

            $reponse->closeCursor(); // Termine le traitement de la requête

            ?>
            <!-- Fin Boucle pour affichage de tous les Tutos -->
        </div>
	</section>
    <?php include 'footer.php'; ?>
</body>
</html>