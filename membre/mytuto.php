<?php
    session_start();
    if (!isset($_SESSION['login'])) {
    header ('Location: index.php');
    exit();
    }
    ?>
<!-- Debut Passage Hors Ligne des Tutos-->
<?php 
    include ("../../bdd/localhostpdo/_mysql.php");
    if (isset($_POST['horsligne']) && $_POST['horsligne'] == 'Passer Hors Ligne') {
        $variableA = "";
        $variableB = $_POST['id'];
        $req = $bdd->prepare("UPDATE Tutos SET online = :variableA WHERE id = :variableB");
        $req->bindParam(":variableA", $variableA); 
        $req->bindParam(":variableB", $variableB); 
        $req->execute(); 
    }
?>
<!--Fin Passage Hors Ligne des Tutos-->

<!-- Debut Passage en Ligne des Tutos-->
<?php 
    if (isset($_POST['online']) && $_POST['online'] == 'Passer En Ligne') {
        $variableA = "online";
        $variableB = $_POST['id'];
        $req = $bdd->prepare("UPDATE Tutos SET online = :variableA WHERE id = :variableB");
        $req->bindParam(":variableA", $variableA);
        $req->bindParam(":variableB", $variableB);
        $req->execute();
    }
 ?>
<!--Fin Passage en Ligne des Tutos-->

<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vos Tutoriels</title>

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
                            <small>Liste de vos</small> Tutos
                        </h1>
                        <div id="menu_tuto" style="margin-bottom: 19px;">
                        <a class="btnaddtuto"href="ajouttuto.php">Ajouter un Tuto</a><br>
                        </div>
                    </div>
                </div>
               
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div id="listcadre">
                                    <div class="languagediv" id="alld">
                                        <h3>Tous Vos Tutos</h3>
                                        
                                        <h3>En Ligne</h3>
                                        <!-- Debut Boucle pour affichage des Tutos en Ligne-->
                                        
                                        <?php  
                                          include ("../../bdd/localhostpdo/_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE online = "online"');
                                            $modal = 0;
                                            // On affiche chaque entrée une à une
                                          while ($donnees = $reponse->fetch())
                                          {
                                        ?>
                                        <?php
                                            
                                            if($_SESSION['login'] == $donnees['author']){
                                                $modal ++;
                                              echo '
                                                    <div id="tutocadre">
                                                      <p>'; echo utf8_decode($donnees['name']); echo '</p>
                                                      <p>'; echo utf8_decode($donnees['shortdescrib']); echo '</p>';
                                                       if($_SESSION['login'] == $donnees['author']){ 
                                                            echo "<div id='delete'>
                                                                    <a class='btndelete'  data-toggle='modal' data-target='.bs-example-modal-sm"; echo $donnees['id']; echo "' href=''>Passer le Tuto Hors Ligne</a>
                                                                    <div class='modal fade bs-example-modal-sm"; echo $donnees['id']; echo " modal' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
                                                                        <div class='modal-dialog modal-sm'>
                                                                            <div class='modal-content'>
                                                                                <form action='mytuto.php' method='post'>
                                                                                    <label for='hl'>Etes Vous sur de vouloir passer votre tuto hors ligne ?</label>
                                                                                    <input type='hidden' name='id' value='"; echo $donnees['id']; echo "'>
                                                                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
                                                                                    <input class='btn btn-default' type='submit' name='horsligne' value='Passer Hors Ligne'>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>";
                                                            };
                                                        
                                                        echo '
                                                      <a href="tuto/tutotemplate.php?tuto='; echo $donnees['id']; echo '">Voir le Tuto.</a>
                                                      <div id="'; echo $donnees['language']; echo '"></div>
                                                      <div class="clear"></div>
                                                    </div>';
                                            }
                                        ?>
                                        
                                        <?php  

                                          }
                                        
                                          $reponse->closeCursor(); // Termine le traitement de la requête
                                        ?>
                                        <!-- Fin Boucle pour affichage des Tutos en Ligne-->

                                        <h3>Hors Ligne</h3>

                                        <!-- Debut Boucle pour affichage des Tutos Hors Ligne-->
                                        <?php
                                          include ("../../bdd/localhostpdo/_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE online = ""');

                                            // On affiche chaque entrée une à une
                                          while ($donnees = $reponse->fetch())
                                          {
                                        ?>
                                        <?php
                                            if($_SESSION['login'] == $donnees['author']){
                                              echo '
                                                    <div id="tutocadre">
                                                      <p>'; echo utf8_decode($donnees['name']); echo '</p>
                                                      <p>'; echo utf8_decode($donnees['shortdescrib']); echo '</p>';
                                                       if($_SESSION['login'] == $donnees['author']){ 
                                                            echo "<div id='delete'>
                                                                    <a class='btndelete'  data-toggle='modal' data-target='.bs-enligne-modal-sm"; echo $donnees['id']; echo "' href=''>Passer le Tuto En Ligne</a>
                                                                    <div class='modal fade bs-enligne-modal-sm"; echo $donnees['id']; echo "' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
                                                                        <div class='modal-dialog modal-sm'>
                                                                            <div class='modal-content'>
                                                                                <form action='mytuto.php' method='post'>
                                                                                    <label for='hl'>Etes Vous sur de vouloir passer votre tuto en ligne ?</label>
                                                                                    <input type='hidden' name='id' value='"; echo $donnees['id']; echo "'>
                                                                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
                                                                                    <input class='btn btn-default' type='submit' name='online' value='Passer En Ligne'>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>";
                                                            };
                                                        
                                                        echo '
                                                      <a href="tuto/tutotemplate.php?tuto='; echo $donnees['id']; echo '">Voir le Tuto.</a>
                                                      <div id="'; echo $donnees['language']; echo '"></div>
                                                      <div class="clear"></div>
                                                    </div>';
                                            }
                                        ?>
                                        
                                        <?php  

                                          }
                                        
                                          $reponse->closeCursor(); // Termine le traitement de la requête
                                        ?>
                                        <!-- Fin Boucle pour affichage des Tutos Hors Ligne-->
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
