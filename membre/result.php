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

    <title>Résultats Pour <?php echo $_POST['requete']; ?></title>

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
                            <li id="htcfiltr" class="filtrlang mtuto"><a style="text-decoration:none;color:white;" href="tuto.php">Retour aux Tutos</a></li>
                            
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
                                    <div id="languagediv">
                                        <!--Debut d'affichage des resultats de recherche-->
                                        <?php 
                                            
                                            if(isset($_POST['requete']) && $_POST['requete'] != NULL){
                                                include '_mysql.php';
                                                $search = htmlspecialchars($_POST['requete']);
                                                $req = $bdd->query("SELECT * FROM Tutos WHERE name OR shortdescrib LIKE '%$search%' ORDER BY id DESC");
                                                $count = $req->fetchAll(PDO::FETCH_ASSOC);
                                                $a=0;
                                                /*Debut comptage des resultats et affichage de la reponse correspondante*/
                                                foreach ($count as $row) {
                                                   $a++;
                                                }
                                                if($a !=0){
                                        ?>
                                        <h3>Résultats de votre recherche.</h3>
                                        <p>Nous avons trouvé <?php echo $a; 
                                                                    if($a > 1) { echo ' résultats dans notre base de données pour "'; echo $_POST['requete']; echo '". Voici les tutos que nous avons trouvées :'; } 
                                                                    else { echo ' résultat dans notre base de données pour "'; echo $_POST['requete']; echo '". Voici le tuto que nous avons trouvées :'; } // on vérifie le nombre de résultats pour orthographier correctement. 
                                                                ?> 
                                        <br/>
                                        <br/>
                                        <!--Fin du comptage des resultats et de la reponse adequate-->
                                        <?php
                                                $search = htmlspecialchars($_POST['requete']);
                                                $reponse = $bdd->query("SELECT * FROM Tutos WHERE name OR shortdescrib LIKE '%$search%' ORDER BY id DESC");
                                                $req->setFetchMode(PDO::FETCH_OBJ);
                                                /*Debut affichage des resultats*/
                                           while ($donnees = $reponse->fetch())
                                          { 
                                        ?>
                                        <a href="/tuto/templatetuto.php?tuto=<?php echo $donnees['id']; ?>"><?php echo utf8_decode($donnees['name']); ?></a><br/>
                                        <?php
                                        } /*Fin affichage des resultats*/
                                        
                                        ?><br/>
                                        <br/>
                                        Faire une nouvelle recherche</p>
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
                                        <?php
                                                } /*Fin de l'affichage si il ya un resultat et Debut de la reponse si il n'y a pas de resultat*/
                                                else{
                                        ?>
                                        <h3>Pas de résultats</h3>
                                        <p>Nous n'avons trouvé aucun résultat pour votre requête "<?php echo $_POST['requete']; ?>". Réessayez avec autre chose.</p>
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
                                        <?php
                                                }/*Fin d'affichage si il n'y a pas de resultat*/
                                            }/*Fermeture de la verification de l'envoi du formulaire*/
                                            else{
                                        ?>
                                        <h3>Aucune Recherche Effectuée</h3>
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
                                        <?php 
                                            }
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
