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
                                     <div class="languagediv">
                                        <h3>Les Derniers Tutos</h3>
                                        <?php  
                                           include ("_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos ORDER BY ID DESC LIMIT 0, 5');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <div id="tutocadre">
                                            <p><?php echo $donnees['name']; ?></p>
                                            <p><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                            <a href="tuto/tutotemplate.php?tuto=<?php echo $donnees['filename']; ?>">Voir le Tuto.</a>
                                            <div id="<?php echo $donnees['language']; ?>"></div>
                                            <div class="clear"></div>
                                        </div>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
