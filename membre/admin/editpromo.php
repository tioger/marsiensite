<?php
    session_start();
    if (!isset($_SESSION['admin'])) {
    header ('Location: ../index.php');
    exit();
    }
    ?>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Site des SIMPLonMARSiens">
    <meta name="author" content="Tioger">

    <title>Marsien Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/userlist.css" rel="stylesheet">


    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- JS -->
   

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

            <div class="container-fluid" style="padding-right:0px;padding-left:0px;">
                <!-- Page Heading -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h1 class="page-header">
                                                    Gestion des Etudiants
                                                </h1>
                                            </div>
                                        </div>
                                       
                                        <!-- /.row -->

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div id="listcadre">
                                                          <?php  
                                                            include ("../../../bdd/localhostpdo/_mysql.php");
                                                             
                                                            // On récupère tout le contenu de la table commentary
                                                            $reponse = $bdd->query("SELECT * FROM Promos WHERE year=".$_GET['year']);
                                                            while ($donnees = $reponse->fetch())
                                                            {
                                                          ?>
                                                              <?php 
                                                                $nbparticipant = $donnees['nbparticipant'];
                                                                $compteur = 0;
                                                                while ($compteur != $nbparticipant) {
                                                                  $compteur ++;
                                                                
                                                               ?>
                                                                <div class="panel panel-info" style="margin-bottom: 0px;">
                                                                    <form method="post" action="editpromo.php">
                                                                        <div class="panel-heading" >
                                                                            <div >
                                                                                <h3 class="panel-title" style="color:black;text-align:center"> <h2>Etudiant N° <?php echo $compteur; ?></h2>     Prenom : <input type="text" name="lastname" value=""> Nom : <input type="texte" name="firstname" value=""></h3>
                                                                                <div style="clear:both;"></div>
                                                                                <div style="float:left">Photo : <input  style="width: 400;" type="text" name="picture" value=""></div>
                                                                                <div style="float:right">Technos( les séparer par un espace): <input type="text" style="width: 400;" name="technos" value=""></div><br>
                                                                                <div style="float:left">Description: <input type="text" style="width: 400;" name="describ" value=""></div>
                                                                                <div style="float:right">Email: <input type="text" style="width: 400;" name="email" value=""></div><br>
                                                                                <div style="clear:both;"></div>
                                                                                <div style="float:left">
                                                                                 <i  class="sociaux fa fa-facebook-square fa-2x"></i> <input type="text" style="width: 200;" name="facebook" value="">
                                                                                 <i  class="sociaux fa fa-twitter-square fa-2x"></i> <input type="text" style="width: 200;" name="twitter" value=""><br>
                                                                                 </div>
                                                                                 <div style="float:right">
                                                                                   <i  class="sociaux fa fa-linkedin-square fa-2x"></i> <input type="text" style="width: 200;" name="linkedin" value="">
                                                                                   <i  class="sociaux fa fa-github-square fa-2x"></i> <input type="text" style="width: 200;" name="github" value=""><br>
                                                                                   </div>
                                                                            </div>
                                                                            <div style="clear:both;"></div>
                                                                        </div>
                                                                        
                                                                    </form>
                                                                    
                                                                   
                                                                </div>
                                                                <?php 
                                                                  }
                                                                ?>
                                                            <?php 
                                                              }
                                                            ?>
                                                        </div> 
                                                    </div>
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