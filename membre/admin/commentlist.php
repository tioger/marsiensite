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
                <div id="tutocadre" style="padding-top: 10px;border:1px black solid;border-radius: 20px 20px 20px 20px;">
                  <div class="well">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Pseudo</th>
                            <th style="width: 36px;"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- Debut Boucle pour affichage des membres-->
                          <?php  
                            include ("../../../bdd/localhostpdo/_mysql.php");
                             
                            // On récupère tout le contenu de la table commentary
                            $reponse = $bdd->query("SELECT * FROM commentary ORDER BY ID ");
                            while ($donnees = $reponse->fetch())
                            {
                          ?>
                          <tr>
                            <td><?php echo $donnees['id'] ?></td>
                            <td><?php echo $donnees['authorcom'] ?></td>
                            <td><a href="../tuto/tutotemplate.php?tuto=<?php echo $donnees['tutoid'] ?>">Acceder au tuto</a></td>
                            <td><?php echo $donnees['comment'] ?></td>
                            <td>
                                <a href="user.html"><i class="fa fa-pencil"></i></a>
                                <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-times"></i></a>
                            </td>
                          </tr>
                          <?php
                              }

                              $reponse->closeCursor();

                          ?> 
                          <!-- Fin Boucle pour affichage des membres-->
                        </tbody>
                      </table>
                  </div>
                  <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <h3 id="myModalLabel">Confirmation de Suppression</h3>
                      </div>
                      <div class="modal-body">
                          <p class="error-text">Etes vous sur de vouloir supprimer cet utilisateur?</p>
                      </div>
                      <div class="modal-footer">
                          <button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
                          <button class="btn btn-danger" data-dismiss="modal">Supprimer</button>
                      </div>
                  </div>
              </div>
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