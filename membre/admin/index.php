<?php
    session_start();
    if (!isset($_SESSION['admin'])) {
    header ('Location: ../index.php');
    exit();
    }
    ?>
    

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Marsien Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

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
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                     <!-- Debut Boucle pour compteur des membres-->
                          <?php  
                            include ("../../../bdd/localhostpdo/_mysql.php");
                             
                            // On récupère tout le contenu de la table membre
                            $compteurmembre =0;
                            $reponse = $bdd->query("SELECT * FROM membre ORDER BY ID ");
                            while ($donnees = $reponse->fetch())
                            {
                                $compteurmembre ++;
                            }

                              $reponse->closeCursor();

                          ?> 
                          <!-- Fin Boucle pour compteur des membres-->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $compteurmembre; ?></div>
                                        <div>Membres!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="userlist.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Voir Tout</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Debut Boucle pour compteur des commentaires-->
                    <?php  
                        include ("../../../bdd/localhostpdo/_mysql.php");
                         $compteurcom =0;
                        // On récupère tout le contenu de la table commentary
                        $reponse = $bdd->query("SELECT * FROM commentary");
                        while ($donnees = $reponse->fetch())
                        {
                          $compteurcom ++;  
                        }

                        $reponse->closeCursor();

                    ?> 
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $compteurcom; ?></div>
                                        <div>Commentaires!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="commentlist.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Voir Tout</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php  
                        include ("../../../bdd/localhostpdo/_mysql.php");
                         $compteurtutoon = 0;
                        // On récupère tout le contenu de la table commentary
                        $reponse = $bdd->query("SELECT * FROM Tutos WHERE online ='online'");
                        while ($donnees = $reponse->fetch())
                        {
                          $compteurtutoon ++;  
                        }

                        $reponse->closeCursor();

                    ?> 
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-code-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $compteurtutoon ?></div>
                                        <div>Tutos en Ligne!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="tutolist.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Voir Tout</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php  
                        include ("../../../bdd/localhostpdo/_mysql.php");
                         $compteurtutooff =0;
                        // On récupère tout le contenu de la table commentary
                        $reponse = $bdd->query("SELECT * FROM Tutos WHERE online =''");
                        while ($donnees = $reponse->fetch())
                        {
                          $compteurtutooff ++;  
                        }

                        $reponse->closeCursor();

                    ?> 
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-code-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $compteurtutooff ?></div>
                                        <div>Tutos Hors Ligne!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="tutolist.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Voir Tout</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                     <?php  
                        include ("../../../bdd/localhostpdo/_mysql.php");
                         $compteurpress =0;
                        // On récupère tout le contenu de la table commentary
                        $reponse = $bdd->query("SELECT * FROM Press");
                        while ($donnees = $reponse->fetch())
                        {
                          $compteurpress ++;  
                        }

                        $reponse->closeCursor();

                    ?> 
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-code-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $compteurpress ?></div>
                                        <div>Presses</div>
                                    </div>
                                </div>
                            </div>
                            <a href="presselist.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Voir Tout</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
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
