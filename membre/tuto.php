<?php
    session_start();
    if (!isset($_SESSION['login'])) {
    header ('Location: index.php');
    exit();
    }
    ?>

<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nos Tutoriels</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/listetuto.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
    <!-- AddThisEvent -->
	<script type="text/javascript" src="https://addthisevent.com/libs/1.5.8/ate.min.js"></script> 
    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'nav.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Liste</small>Tutos
                        </h1>
                        <div id="menu_tuto">
                        <a class="btnaddtuto"href="ajouttuto.php">Ajouter un Tuto</a><br>
                        <div id="bloc_filtr">
                            <li id="htcfiltr" class="filtrlang mtuto">Html/Css</li>
                            <li id="jsfiltr" class="filtrlang mtuto">JavaScript</li>
                            <li id="jqfiltr" class="filtrlang mtuto">JQuery</li>
                            <li id="rubfiltr" class="filtrlang mtuto">Ruby</li>
                            <li id="rrfiltr" class="filtrlang mtuto">Rails</li>
                            <li id="pytfiltr" class="filtrlang mtuto">Python</li>
                            <li id="cfiltr" class="filtrlang mtuto">C</li>
                            <li id="cplfiltr" class="filtrlang mtuto">C++</li>
                            <li id="phpfiltr" class="filtrlang mtuto">Php</li>
                            <li id="tousfiltr" class="filtrlang mtuto">Tous</li>
                            <li id="sheafiltr" class="filtrlang">
                                <nav class="navbar" role="navigation">
                                  <div class="">
                                    <div class="navbar-collapse collapse marginsearch paddingsearch" id="navbar-collapsible">
                                      <form action="result.php" method="Post" class="navbar-form paddingsearch">
                                        <div class="form-group" style="display:inline;">
                                          <div class="input-group">
                                            <input class="form-control" type="text" name="requete">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                                          </div>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </nav>
                            </li>
                        </div>
                        </div>
                    </div>
                </div>
               
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div id="listcadre">
                                    <div class="languagediv" id="lastt">
                                        <h3>Les Derniers Tutos</h3>
                                        <!-- Debut Boucle pour affichage des derniers Tutos -->

                                        <?php  
                                           include ("../../bdd/localhostpdo/_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE online = "online" ORDER BY ID DESC LIMIT 0, 5');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <div id="tutocadre">
                                            <p><span class="underline">Nom du Tuto :</span> <?php echo utf8_decode($donnees['name']); ?>  <span class="underline">Créé par</span> <i class='fa fa-fw fa-user'></i><span id="capitalize"> <?php echo $donnees['author']; ?></span> </p>
                                            <p class="underline">Courte Description :</p>
                                            <p class="shortdescribmargin"><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                            <a href="tuto/tutotemplate.php?tuto=<?php echo $donnees['id']; ?>">Voir le Tuto.</a>
                                            <div id="<?php echo $donnees['language']; ?>"></div>
                                            <div class="clear"></div>
                                        </div>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                        <!-- Fin Boucle pour affichage des derniers Tutos-->
                                    </div>
                                    <div class="languagediv" id="htmlcssd" style="display:none;">
                                        <h3>Tutos Html+Css</h3>
                                        <!-- Debut Boucle pour affichage des Tutos htmlcss-->
                                        <?php  
                                           include ("../../bdd/localhostpdo/_mysql.php");
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE online = "online" AND language = "HtmlCss"');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <div id="tutocadre">
                                            <p><span class="underline">Nom du Tuto :</span> <?php echo utf8_decode($donnees['name']); ?>  <span class="underline">Créé par</span> <i class='fa fa-fw fa-user'></i><span id="capitalize"> <?php echo $donnees['author']; ?></span> </p>
                                            <p class="underline">Courte Description :</p>
                                            <p class="shortdescribmargin"><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                            <a href="tuto/tutotemplate.php?tuto=<?php echo $donnees['id']; ?>">Voir le Tuto.</a>
                                            <div id="<?php echo $donnees['language']; ?>"></div>
                                            <div class="clear"></div>
                                        </div>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                        <!-- Fin Boucle pour affichage des Tutos htmlcss-->
                                    </div>
                                    <div class="languagediv" id="alld" style="display:none;">
                                        <h3>Tous Nos Tutos</h3>
                                        <!-- Debut Boucle pour affichage de tous les Tutos en ligne-->
                                        <?php  
                                           include ("../../bdd/localhostpdo/_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE online="online"');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <div id="tutocadre">
                                            <p><span class="underline">Nom du Tuto :</span> <?php echo utf8_decode($donnees['name']); ?>  <span class="underline">Créé par</span> <i class='fa fa-fw fa-user'></i><span id="capitalize"> <?php echo $donnees['author']; ?></span> </p>
                                            <p class="underline">Courte Description :</p>
                                            <p class="shortdescribmargin"><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                            <a href="tuto/tutotemplate.php?tuto=<?php echo $donnees['id']; ?>">Voir le Tuto.</a>
                                            <div id="<?php echo $donnees['language']; ?>"></div>
                                            <div class="clear"></div>
                                        </div>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                        <!-- Fin Boucle pour affichage de tous les Tutos -->
                                    </div>
                                    <div class="languagediv" id="cd" style="display:none;">
                                         <h3>Tutos C</h3>
                                         <!-- Debut Boucle pour affichage des Tutos C-->
                                        <?php  
                                           include ("../../bdd/localhostpdo/_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE online = "online" AND language = "C"');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <div id="tutocadre">
                                            <p><span class="underline">Nom du Tuto :</span> <?php echo utf8_decode($donnees['name']); ?>  <span class="underline">Créé par</span> <i class='fa fa-fw fa-user'></i><span id="capitalize"> <?php echo $donnees['author']; ?></span> </p>
                                            <p class="underline">Courte Description :</p>
                                            <p class="shortdescribmargin"><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                            <a href="tuto/tutotemplate.php?tuto=<?php echo $donnees['id']; ?>">Voir le Tuto.</a>
                                            <div id="<?php echo $donnees['language']; ?>"></div>
                                            <div class="clear"></div>
                                        </div>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                        <!-- Fin Boucle pour affichage des Tutos C-->
                                    </div>
                                    <div class="languagediv" id="cplusplusd" style="display:none;">
                                         <h3>Tutos C++</h3>
                                         <!-- Debut Boucle pour affichage des Tutos C++-->
                                        <?php  
                                           include ("../../bdd/localhostpdo/_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE online = "online" AND language = "Cplusplus"');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <div id="tutocadre">
                                            <p><span class="underline">Nom du Tuto :</span> <?php echo utf8_decode($donnees['name']); ?>  <span class="underline">Créé par</span> <i class='fa fa-fw fa-user'></i><span id="capitalize"> <?php echo $donnees['author']; ?></span> </p>
                                            <p class="underline">Courte Description :</p>
                                            <p class="shortdescribmargin"><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                            <a href="tuto/tutotemplate.php?tuto=<?php echo $donnees['id']; ?>">Voir le Tuto.</a>
                                            <div id="<?php echo $donnees['language']; ?>"></div>
                                            <div class="clear"></div>
                                        </div>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                        <!-- Fin Boucle pour affichage des Tutos C++-->
                                    </div>
                                    <div class="languagediv" id="javascriptd" style="display:none;">
                                        <h3>Tutos Javascript</h3>
                                        <!-- Debut Boucle pour affichage des Tutos Js-->
                                        <?php  
                                           include ("../../bdd/localhostpdo/_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE online = "online" AND language = "Javascript"');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <div id="tutocadre">
                                            <p><span class="underline">Nom du Tuto :</span> <?php echo utf8_decode($donnees['name']); ?>  <span class="underline">Créé par</span> <i class='fa fa-fw fa-user'></i><span id="capitalize"> <?php echo $donnees['author']; ?></span> </p>
                                            <p class="underline">Courte Description :</p>
                                            <p class="shortdescribmargin"><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                            <a href="tuto/tutotemplate.php?tuto=<?php echo $donnees['id']; ?>">Voir le Tuto.</a>
                                            <div id="<?php echo $donnees['language']; ?>"></div>
                                            <div class="clear"></div>
                                        </div>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                        <!-- Fin Boucle pour affichage des Tutos Js-->
                                    </div>
                                    <div class="languagediv" id="jqueryd" style="display:none;">
                                        <h3>Tutos Jquery</h3>
                                        <!-- Debut Boucle pour affichage des Tutos Jquery-->
                                        <?php  
                                           include ("../../bdd/localhostpdo/_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE online = "online" AND language = "Jquery"');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <div id="tutocadre">
                                            <p><span class="underline">Nom du Tuto :</span> <?php echo utf8_decode($donnees['name']); ?>  <span class="underline">Créé par</span> <i class='fa fa-fw fa-user'></i><span id="capitalize"> <?php echo $donnees['author']; ?></span> </p>
                                            <p class="underline">Courte Description :</p>
                                            <p class="shortdescribmargin"><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                            <a href="tuto/tutotemplate.php?tuto=<?php echo $donnees['id']; ?>">Voir le Tuto.</a>
                                            <div id="<?php echo $donnees['language']; ?>"></div>
                                            <div class="clear"></div>
                                        </div>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                        <!-- Fin Boucle pour affichage des Tutos Jquery-->
                                    </div>
                                    <div class="languagediv" id="phpd" style="display:none;">
                                        <h3>Tutos PHP</h3>
                                        <!-- Debut Boucle pour affichage des Tutos PHP-->
                                        <?php  
                                           include ("../../bdd/localhostpdo/_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE online = "online" AND language = "PHP"');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <div id="tutocadre">
                                            <p><span class="underline">Nom du Tuto :</span> <?php echo utf8_decode($donnees['name']); ?>  <span class="underline">Créé par</span> <i class='fa fa-fw fa-user'></i><span id="capitalize"> <?php echo $donnees['author']; ?></span> </p>
                                            <p class="underline">Courte Description :</p>
                                            <p class="shortdescribmargin"><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                            <a href="tuto/tutotemplate.php?tuto=<?php echo $donnees['id']; ?>">Voir le Tuto.</a>
                                            <div id="<?php echo $donnees['language']; ?>"></div>
                                            <div class="clear"></div>
                                        </div>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                        <!-- Fin Boucle pour affichage des Tutos PHP-->
                                    </div>
                                    <div class="languagediv" id="pythond" style="display:none;">
                                        <h3>Tutos Python</h3>
                                        <!-- Debut Boucle pour affichage des Tutos Python-->
                                        <?php  
                                           include ("../../bdd/localhostpdo/_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE online = "online" AND language = "Python"');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <div id="tutocadre">
                                            <p><span class="underline">Nom du Tuto :</span> <?php echo utf8_decode($donnees['name']); ?>  <span class="underline">Créé par</span> <i class='fa fa-fw fa-user'></i><span id="capitalize"> <?php echo $donnees['author']; ?></span> </p>
                                            <p class="underline">Courte Description :</p>
                                            <p class="shortdescribmargin"><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                            <a href="tuto/tutotemplate.php?tuto=<?php echo $donnees['id']; ?>">Voir le Tuto.</a>
                                            <div id="<?php echo $donnees['language']; ?>"></div>
                                            <div class="clear"></div>
                                        </div>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                        <!-- Fin Boucle pour affichage des Tutos Python-->
                                    </div>
                                    <div class="languagediv" id="railsd" style="display:none;">
                                        <h3>Tutos Rails</h3>
                                        <!-- Debut Boucle pour affichage des Tutos rails-->
                                        <?php  
                                           include ("../../bdd/localhostpdo/_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE online = "online" AND language = "RubyonRails"');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <div id="tutocadre">
                                            <p><span class="underline">Nom du Tuto :</span>  <?php echo utf8_decode($donnees['name']); ?> <span class="underline">Créé par</span> <i class='fa fa-fw fa-user'></i><span id="capitalize"> <?php echo $donnees['author']; ?></span> </p>
                                            <p class="underline">Courte Description :</p>
                                            <p class="shortdescribmargin"><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                            <a href="tuto/tutotemplate.php?tuto=<?php echo $donnees['id']; ?>">Voir le Tuto.</a>
                                            <div id="<?php echo $donnees['language']; ?>"></div>
                                            <div class="clear"></div>
                                        </div>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                         <!-- Fin Boucle pour affichage des Tutos rails-->
                                    </div>
                                    <div class="languagediv" id="rubyd" style="display:none;">
                                        <h3>Tutos Ruby</h3>
                                        <!-- Debut Boucle pour affichage des Tutos Ruby-->
                                        <?php  
                                           include ("../../bdd/localhostpdo/_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE online = "online" AND language = "Ruby"');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <div id="tutocadre">
                                            <p><span class="underline">Nom du Tuto :</span> <?php echo utf8_decode($donnees['name']); ?>  <span class="underline">Créé par</span> <i class='fa fa-fw fa-user'></i><span id="capitalize"> <?php echo $donnees['author']; ?></span> </p>
                                            <p class="underline">Courte Description :</p>
                                            <p class="shortdescribmargin"><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                            <a href="tuto/tutotemplate.php?tuto=<?php echo $donnees['id']; ?>">Voir le Tuto.</a>
                                            <div id="<?php echo $donnees['language']; ?>"></div>
                                            <div class="clear"></div>
                                        </div>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                        <!-- Fin Boucle pour affichage des Tutos Ruby-->
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/skiptuto.js"></script> 

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
