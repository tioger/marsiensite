<?php
    session_start();
    if (!isset($_SESSION['login'])) {
    header ('Location: index.php');
    exit();
    }
?>

<?php 
    include ("../../bdd/localhostpdo/_mysql.php");
    if (isset($_POST['imgup']) && $_POST['imgup'] == 'Enregistrer') {
        $reponse = $bdd->query('SELECT * FROM admin WHERE login = "'.$_SESSION["login"].'"');
        $countadmin = 0;
        // On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch()){
            $countadmin ++;
        }
        if($countadmin == 1){
            $variableA = $_POST["imgprofil"];
            $variableB = $_SESSION["login"];
            $req = $bdd->prepare("UPDATE admin SET imgprofil = :variableA WHERE login = :variableB");
            $req->bindParam(":variableA", $variableA);
            $req->bindParam(":variableB", $variableB);
            $req->execute();
            header('Location: editprofil.php');
            exit();
        }
        else{
            $variableA = $_POST['imgprofil'];
            $variableB = $_SESSION["login"];
            $req = $bdd->prepare("UPDATE membre SET imgprofil = :variableA WHERE login = :variableB");
            $req->bindParam(":variableA", $variableA);
            $req->bindParam(":variableB", $variableB);
            $req->execute();
        }
        $reponse->closeCursor();
    }
 ?>
 <?php 
    include ("../../bdd/localhostpdo/_mysql.php");
    if (isset($_POST['confirmedit']) && $_POST['confirmedit'] == 'Enregistrer les Modifications') {
        $reponse = $bdd->query('SELECT * FROM admin WHERE login = "'.$_SESSION["login"].'"');
        $countadmin = 0;
        // On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch()){
            $countadmin ++;
        }
        if($countadmin == 1){
            $variableA = $_POST["email"];
            $variableB = $_SESSION["login"];
            $variableC = $_POST["describ"];
            $variableD = $_POST["technos"];
            $variableE = $_POST["structure"];
            $variableF = $_POST["promo"];
            $variableG = $_POST["facebook"];
            $variableH = $_POST["twitter"];
            $variableI = $_POST["linkedin"];
            $variableJ = $_POST["lastname"];
            $variableK = $_POST["firstname"];
            $req = $bdd->prepare("UPDATE admin SET email = :variableA , describ = :variableC , technos = :variableD , structure = :variableE , promo = :variableF ,facebook = :variableG , twitter = :variableH , linkedin = :variableI ,lastname = :variableJ , firstname = :variableK WHERE login = :variableB");
            $req->bindParam(":variableA", $variableA);
            $req->bindParam(":variableB", $variableB);
            $req->bindParam(":variableC", $variableC);
            $req->bindParam(":variableD", $variableD);
            $req->bindParam(":variableE", $variableE);
            $req->bindParam(":variableF", $variableF);
            $req->bindParam(":variableG", $variableG);
            $req->bindParam(":variableH", $variableH);
            $req->bindParam(":variableI", $variableI);
            $req->bindParam(":variableJ", $variableJ);
            $req->bindParam(":variableK", $variableK);
            $req->execute();
            header('Location: editprofil.php');
            exit();
        }
        else{
            $variableA = $_POST['imgprofil'];
            $variableB = $_SESSION["login"];
            $req = $bdd->prepare("UPDATE membre SET imgprofil = :variableA WHERE login = :variableB");
            $req->bindParam(":variableA", $variableA);
            $req->bindParam(":variableB", $variableB);
            $req->execute();
        }
        $reponse->closeCursor();
    }
 ?>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modifier Votre Profil</title>

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
	
    <!-- Custom CSS -->
    <link href="css/profil.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'nav.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Debut Boucle pour affichage des derniers Tutos -->

                    <?php 
                       include ("../../bdd/localhostpdo/_mysql.php");
                        $reponse = $bdd->query('SELECT * FROM admin WHERE login = "'.$_SESSION["login"].'"');
                        $countadmin = 0;
                        // On affiche chaque entrée une à une
                        while ($donnees = $reponse->fetch()){
                            $countadmin ++;
                        }
                        if($countadmin == 1){
                            // On récupère tout le contenu de la table Tuto
                            $reponse = $bdd->query('SELECT * FROM admin WHERE login ="'.$_SESSION["login"].'"');
                            // On affiche chaque entrée une à une
                            while ($donnees = $reponse->fetch()){
                                echo '<!-- Page Heading -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h1 class="page-header">
                                                    Modifier Votre Profil
                                                </h1>
                                            </div>
                                        </div>
                                       
                                        <!-- /.row -->

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div id="listcadre">
                                                            <div class="panel panel-info" style="margin-bottom: 0px;">
                                                                <form method="post" action="editprofil.php">
                                                                    <div class="panel-heading" >
                                                                        <div style="float:left;">
                                                                            <h3 class="panel-title" style="color:black;text-align:center">Prenom : <input type="text" name="lastname" value="'; if(!empty($donnees["lastname"])){ echo $donnees["lastname"];} else{ echo "Nom : NC  ";};echo '"> Nom : <input type="texte" name="firstname" value="'; if(!empty($donnees["firstname"])){ echo $donnees["firstname"];} else{ echo "Prénom : NC  ";}; echo'"></h3> 
                                                                        </div>
                                                                        <div style="clear:both;"></div>
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <div class="row">
                                                                            <div class="col-md-3 col-lg-3 profil_pick " align="center">
                                                                                <img  alt="User Pic" src="';if(!empty($donnees["imgprofil"])){ echo $donnees["imgprofil"];} else{ echo "img/default.png";}; echo '" >
                                                                                <h3>Modifier votre image de Profil</h3>
                                                                                <input id="input" type="text" name="imgpreview" value="'; echo $donnees["imgprofil"];echo '">
                                                                                <!-- Button trigger modal -->
                                                                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" onclick="apercu()">
                                                                                  Aperçu
                                                                                </button>
                                                                                <!-- Modal -->
                                                                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                                  <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                      <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                        <h4 class="modal-title" id="myModalLabel">Aperçu</h4>
                                                                                      </div>
                                                                                      <form method="post" action="editprofil.php">
                                                                                        <div class="modal-body">
                                                                                            <div id="modale"></div>
                                                                                            <div id="envoiimg"></div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                                                            <input type="submit" name="imgup" class="btn btn-primary" value="Enregistrer">
                                                                                        </div>
                                                                                      </form>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                            </div>
                                                                            

                                                                            <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                                                                              <dl>
                                                                                <dt>DEPARTMENT:</dt>
                                                                                <dd>Administrator</dd>
                                                                                <dt>HIRE DATE</dt>
                                                                                <dd>11/12/2013</dd>
                                                                                <dt>DATE OF BIRTH</dt>
                                                                                   <dd>11/12/2013</dd>
                                                                                <dt>GENDER</dt>
                                                                                <dd>Male</dd>
                                                                              </dl>
                                                                            </div>-->
                                                                            <div class=" col-md-9 col-lg-9 "> 
                                                                                <table class="table table-user-information">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                        </tr>
                                                                                        <tr> 
                                                                                            <td style="border-top:0px;">Description ou Slogan : <input type="text" style="width: 400;" name="describ" value="';if(!empty($donnees["describ"])){ echo $donnees["describ"];} else{ echo "Description : NC  ";}; echo '"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Mes Technos( les séparer par un espace)</td>
                                                                                            <td><input type="text" style="width: 400;" name="technos" value="';if(!empty($donnees["technos"])){ echo $donnees["technos"];} else{ echo " NC  ";}; echo '"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Structure</td>
                                                                                            <td><input type="text" style="width: 400;" name="structure" value="';if(!empty($donnees["structure"])){ echo $donnees["structure"];} else{ echo " NC  ";}; echo '"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Promo.</td>
                                                                                            <td><input type="text" style="width: 400;" name="promo" value="';if(!empty($donnees["promo"])){ echo $donnees["promo"];} else{ echo " NC  ";}; echo '"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            
                                                                                            <tr>
                                                                                                <td>Email</td>
                                                                                                <td><input type="text" style="width: 400;" name="email" value="';
                                                                                                if(!empty($donnees["email"])){
                                                                                                    echo $donnees["email"]; echo '">';
                                                                                                } 
                                                                                                else{ echo " NC  ";}; 
                                                                                          echo '</td>
                                                                                            </tr>
                                                                                            
                                                                                            <td>
                                                                                                ';
                                                                                                if(!empty($donnees["facebook"])){
                                                                                                    echo '<i  class="sociaux fa fa-facebook-square fa-2x"></i><input type="text" style="width: 200;" name="facebook" value="'; echo $donnees["facebook"]; echo'"><br>';} 
                                                                                                else{ echo '<i  class="sociaux fa fa-facebook-square fa-2x"></i><input type="text" style="width: 200;" name="facebook" value="NC"><br>';};

                                                                                                if(!empty($donnees["twitter"])){
                                                                                                    echo '<i  class="sociaux fa fa-twitter-square fa-2x"></i><input type="text" style="width: 200;" name="twitter" value="'; echo $donnees["twitter"]; echo'"><br>';} 
                                                                                                else{ echo '<i  class="sociaux fa fa-twitter-square fa-2x"></i><input type="text" style="width: 200;" name="twitter" value="NC"><br>';};

                                                                                                if(!empty($donnees["linkedin"])){
                                                                                                    echo '<i  class="sociaux fa fa-linkedin-square fa-2x"></i><input type="text" style="width: 200;" name="linkedin" value="'; echo $donnees["linkedin"]; echo'">';} 
                                                                                                else{ echo '<i  class="sociaux fa fa-linkedin-square fa-2x"></i><input type="text" style="width: 200;" name="linkedin" value="NC">';};
                                                                                            
                                                                                            echo '
                                                                                            </td> 
                                                                                            <td></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <div style="width: 234px; margin: 200px auto auto;" >
                                                                                <input type="submit" name="confirmedit" class="btn btn-primary" value="Enregistrer les Modifications">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                
                                                                <div class="panel-footer">
                                                                    <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                                                                    <span class="pull-right">
                                                                        <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                                                                        <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                                                    </span>
                                                                </div>   
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->';
                            }
                            $reponse->closeCursor();
                        }
                        else{
                            // On récupère tout le contenu de la table Tuto
                            $reponse = $bdd->query('SELECT * FROM membre WHERE login ="'.$_SESSION["login"].'"');

                            // On affiche chaque entrée une à une
                            while ($donnees = $reponse->fetch())
                            {
                                echo '<!-- Page Heading -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h1 class="page-header">
                                                    Modifier Votre Profil
                                                </h1>
                                            </div>
                                        </div>
                                       
                                        <!-- /.row -->

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div id="listcadre">
                                                            <div class="panel panel-info" style="margin-bottom: 0px;">
                                                                <form method="post" action="editprofil.php">
                                                                    <div class="panel-heading" >
                                                                        <div style="float:left;">
                                                                            <h3 class="panel-title" style="color:black;text-align:center">Prenom : <input type="text" name="lastname" value="'; if(!empty($donnees["lastname"])){ echo $donnees["lastname"];} else{ echo "Nom : NC  ";};echo '"> Nom : <input type="texte" name="firstname" value="'; if(!empty($donnees["firstname"])){ echo $donnees["firstname"];} else{ echo "Prénom : NC  ";}; echo'"></h3> 
                                                                        </div>
                                                                        <div style="clear:both;"></div>
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <div class="row">
                                                                            <div class="col-md-3 col-lg-3 profil_pick" align="center">
                                                                                <img  alt="User Pic" src="';if(!empty($donnees["imgprofil"])){ echo $donnees["imgprofil"];} else{ echo "img/default.png";}; echo '" >
                                                                                <h3>Modifier votre image de Profil</h3>
                                                                                <input id="input" type="text" name="imgpreview" value="'; echo $donnees["imgprofil"];echo '">
                                                                                <!-- Button trigger modal -->
                                                                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" onclick="apercu()">
                                                                                  Aperçu
                                                                                </button>
                                                                                <!-- Modal -->
                                                                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                                  <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                      <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                        <h4 class="modal-title" id="myModalLabel">Aperçu</h4>
                                                                                      </div>
                                                                                      <form method="post" action="editprofil.php">
                                                                                        <div class="modal-body">
                                                                                            <div id="modale"></div>
                                                                                            <div id="envoiimg"></div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                                                            <input type="submit" name="imgup" class="btn btn-primary" value="Enregistrer">
                                                                                        </div>
                                                                                      </form>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                            </div>
                                                                            

                                                                            <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                                                                              <dl>
                                                                                <dt>DEPARTMENT:</dt>
                                                                                <dd>Administrator</dd>
                                                                                <dt>HIRE DATE</dt>
                                                                                <dd>11/12/2013</dd>
                                                                                <dt>DATE OF BIRTH</dt>
                                                                                   <dd>11/12/2013</dd>
                                                                                <dt>GENDER</dt>
                                                                                <dd>Male</dd>
                                                                              </dl>
                                                                            </div>-->
                                                                            <div class=" col-md-9 col-lg-9 "> 
                                                                                <table class="table table-user-information">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                        </tr>
                                                                                        <tr> 
                                                                                            <td style="border-top:0px;">Description ou Slogan : <input type="text" style="width: 400;" name="describ" value="';if(!empty($donnees["describ"])){ echo $donnees["describ"];} else{ echo "Description : NC  ";}; echo '"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Mes Technos( les séparer par un espace)</td>
                                                                                            <td><input type="text" style="width: 400;" name="technos" value="';if(!empty($donnees["technos"])){ echo $donnees["technos"];} else{ echo " NC  ";}; echo '"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Structure</td>
                                                                                            <td><input type="text" style="width: 400;" name="structure" value="';if(!empty($donnees["structure"])){ echo $donnees["structure"];} else{ echo " NC  ";}; echo '"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Promo.</td>
                                                                                            <td><input type="text" style="width: 400;" name="promo" value="';if(!empty($donnees["promo"])){ echo $donnees["promo"];} else{ echo " NC  ";}; echo '"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            
                                                                                            <tr>
                                                                                                <td>Email</td>
                                                                                                <td><input type="text" style="width: 400;" name="email" value="';
                                                                                                if(!empty($donnees["email"])){
                                                                                                    echo $donnees["email"]; echo '">';
                                                                                                } 
                                                                                                else{ echo " NC  ";}; 
                                                                                          echo '</td>
                                                                                            </tr>
                                                                                            
                                                                                            <td>
                                                                                                ';
                                                                                                if(!empty($donnees["facebook"])){
                                                                                                    echo '<i  class="sociaux fa fa-facebook-square fa-2x"></i><input type="text" style="width: 200;" name="facebook" value="'; echo $donnees["facebook"]; echo'"><br>';} 
                                                                                                else{ echo '<i  class="sociaux fa fa-facebook-square fa-2x"></i><input type="text" style="width: 200;" name="facebook" value="NC"><br>';};

                                                                                                if(!empty($donnees["twitter"])){
                                                                                                    echo '<i  class="sociaux fa fa-twitter-square fa-2x"></i><input type="text" style="width: 200;" name="twitter" value="'; echo $donnees["twitter"]; echo'"><br>';} 
                                                                                                else{ echo '<i  class="sociaux fa fa-twitter-square fa-2x"></i><input type="text" style="width: 200;" name="twitter" value="NC"><br>';};

                                                                                                if(!empty($donnees["linkedin"])){
                                                                                                    echo '<i  class="sociaux fa fa-linkedin-square fa-2x"></i><input type="text" style="width: 200;" name="linkedin" value="'; echo $donnees["linkedin"]; echo'">';} 
                                                                                                else{ echo '<i  class="sociaux fa fa-linkedin-square fa-2x"></i><input type="text" style="width: 200;" name="linkedin" value="NC">';};
                                                                                            
                                                                                            echo '
                                                                                            </td> 
                                                                                            <td></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <div style="width: 234px; margin: 200px auto auto;" >
                                                                                <input type="submit" name="confirmedit" class="btn btn-primary" value="Enregistrer les Modifications">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                
                                                                <div class="panel-footer">
                                                                    <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                                                                    <span class="pull-right">
                                                                        <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                                                                        <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                                                    </span>
                                                                </div>   
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->';
                            }
                            $reponse->closeCursor();
                        }
                    ?>
                
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
    <script type="text/javascript">
        function I(i){
        return document.getElementById(i);
        };

        function apercu() {
            I("modale").innerHTML = "<div><img src='" + I("input").value + "'></img></div>";
            I("envoiimg").innerHTML = "<input type='hidden' name='imgprofil' value='" + I("input").value + "'>";
        };
    </script

</body>

</html>
