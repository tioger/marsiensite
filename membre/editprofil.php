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

    <title>Votre Profil</title>

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
                                                    <small>Votre</small>Profil
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
                                                                <div class="panel-heading" >
                                                                    <div style="float:left;width:330px">
                                                                        <h3 class="panel-title" style="color:black;text-align:center">'; if(!empty($donnees["lastname"])){ echo $donnees["lastname"];} else{ echo "Nom : NC  ";};echo ' '; if(!empty($donnees["firstname"])){ echo $donnees["firstname"];} else{ echo "Prénom : NC  ";}; echo'</h3>
                                                                        
                                                                    </div>
                                                                    <div style="float:right;">
                                                                        <a href="edit.html" >Edit Profile</a>
                                                                    </div>
                                                                    <div style="clear:both;"></div>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-lg-3 " align="center">
                                                                            <img width="330" alt="User Pic" src="';if(!empty($donnees["imgprofil"])){ echo $donnees["imgprofil"];} else{ echo "img/default.png";}; echo '" >
                                                                            <form method="post" name="aperçu" action="preview.php?profil=';echo $_SESSION["login"]; echo '" onSubmit="popupform(this,"aperçu")" >
                                                                                <input type="text" name="imgprofil" value="'; echo $donnees["imgprofil"];echo '">
                                                                                <input type="submit" name="enregistrer" value="Enregistrer">
                                                                            </form> 
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
                                                                                        <td style="border-top:0px;">';if(!empty($donnees["describ"])){ echo $donnees["describ"];} else{ echo "Description : NC  ";}; echo '</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Mes Technos</td>
                                                                                        <td>';
                                                                                        if(!empty($donnees["technos"])){ 
                                                                                            $technos = $donnees["technos"];
                                                                                            $keywords = preg_split("/[\s,]+/", $technos);
                                                                                                foreach ($keywords as &$value) {
                                                                                                    echo '<li class="bulle">
                                                                                                            <p class="perk">'; echo $value ; echo '</p>
                                                                                                          </li>';
                                                                                                }
                                                                                            } 
                                                                                            else{ echo '<li class="bulle">
                                                                                                    <p class="perk">Technos: NC</p>
                                                                                                </li>';};     
                                                                                        echo '</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Structure</td>
                                                                                        <td>';if(!empty($donnees["structure"])){ echo $donnees["structure"];} else{ echo " NC  ";}; echo '</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Promo.</td>
                                                                                        <td>';if(!empty($donnees["promo"])){ echo $donnees["promo"];} else{ echo " NC  ";}; echo '</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        
                                                                                        <tr>
                                                                                            <td>Email</td>
                                                                                            <td>';
                                                                                            if(!empty($donnees["email"])){
                                                                                                echo '<a href="mailto:';echo $donnees["email"]; echo '">';
                                                                                                echo $donnees["email"];
                                                                                                echo'</a>';
                                                                                            } 
                                                                                            else{ echo " NC  ";}; 
                                                                                      echo '</td>
                                                                                        </tr>
                                                                                        
                                                                                        <td>
                                                                                            ';
                                                                                            if(!empty($donnees["facebook"])){
                                                                                                echo '<a href="https://www.facebook.com/'; echo $donnees["facebook"];echo '"><i  class="sociaux fa fa-facebook-square fa-2x"></i></a>';} 
                                                                                            else{ echo '';};

                                                                                            if(!empty($donnees["twitter"])){
                                                                                                echo '<a href="https://twitter.com/'; echo $donnees["twitter"];echo '"><i  class="sociaux fa fa-twitter-square fa-2x"></i></a>';} 
                                                                                            else{ echo '';};

                                                                                            if(!empty($donnees["linkedin"])){
                                                                                                echo '<a href="'; echo $donnees["linkedin"];echo '"><i  class="sociaux fa fa-linkedin-square fa-2x"></i></a>';} 
                                                                                            else{ echo '';};
                                                                                        
                                                                                        echo '
                                                                                        </td> 
                                                                                        <td></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <a href="#" class="btn btn-primary">Mes Tutos</a>
                                                                            <a href="#" class="btn btn-primary">Mon Site Web</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="panel-body" style="border-top: 1px solid #DDD;">
                                                                    <div style="background-color:black;">
                                                                        <h2></h2>
                                                                    </div>

                                                                </div>
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
                                                    <small>Votre</small>Profil
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
                                                                <div class="panel-heading" >
                                                                    <div style="float:left;width:330px">
                                                                        <h3 class="panel-title" style="color:black;text-align:center">'; if(!empty($donnees["lastname"])){ echo $donnees["lastname"];} else{ echo "Nom : NC  ";};echo ' '; if(!empty($donnees["firstname"])){ echo $donnees["firstname"];} else{ echo "Prénom : NC  ";}; echo'</h3>
                                                                    </div>
                                                                    <div style="float:right;">
                                                                        <a href="edit.html" >Edit Profile</a>
                                                                    </div>
                                                                    <div style="clear:both;"></div>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-lg-3 " align="center"> <img width="330" alt="User Pic" src="';if(!empty($donnees["imgprofil"])){ echo $donnees["imgprofil"];} else{ echo "img/default.png";}; echo '" > </div>
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
                                                                                        <td style="border-top:0px;">';if(!empty($donnees["describ"])){ echo $donnees["describ"];} else{ echo "Description : NC  ";}; echo '</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Mes Technos</td>
                                                                                        <td>';
                                                                                        if(!empty($donnees["technos"])){ 
                                                                                            $technos = $donnees["technos"];
                                                                                            $keywords = preg_split("/[\s,]+/", $technos);
                                                                                                foreach ($keywords as &$value) {
                                                                                                    echo '<li class="bulle">
                                                                                                            <p class="perk">'; echo $value ; echo '</p>
                                                                                                          </li>';
                                                                                                }
                                                                                            } 
                                                                                            else{ echo '<li class="bulle">
                                                                                                    <p class="perk">Technos: NC</p>
                                                                                                </li>';};     
                                                                                        echo '</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Structure</td>
                                                                                        <td>';if(!empty($donnees["structure"])){ echo $donnees["structure"];} else{ echo " NC  ";}; echo '</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Promo.</td>
                                                                                        <td>';if(!empty($donnees["promo"])){ echo $donnees["promo"];} else{ echo " NC  ";}; echo '</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        
                                                                                        <tr>
                                                                                            <td>Email</td>
                                                                                            <td>';
                                                                                            if(!empty($donnees["email"])){
                                                                                                echo '<a href="mailto:';echo $donnees["email"]; echo '">';
                                                                                                echo $donnees["email"];
                                                                                                echo'</a>';
                                                                                            } 
                                                                                            else{ echo " NC  ";}; 
                                                                                      echo '</td>
                                                                                        </tr>
                                                                                        
                                                                                        <td>
                                                                                            ';
                                                                                            if(!empty($donnees["facebook"])){
                                                                                                echo '<a href="https://www.facebook.com/'; echo $donnees["facebook"];echo '"><i  class="sociaux fa fa-facebook-square fa-2x"></i></a>';} 
                                                                                            else{ echo '';};

                                                                                            if(!empty($donnees["twitter"])){
                                                                                                echo '<a href="https://twitter.com/'; echo $donnees["twitter"];echo '"><i  class="sociaux fa fa-twitter-square fa-2x"></i></a>';} 
                                                                                            else{ echo '';};

                                                                                            if(!empty($donnees["linkedin"])){
                                                                                                echo '<a href="'; echo $donnees["linkedin"];echo '"><i  class="sociaux fa fa-linkedin-square fa-2x"></i></a>';} 
                                                                                            else{ echo '';};
                                                                                        
                                                                                        echo '
                                                                                        </td> 
                                                                                        <td></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <a href="#" class="btn btn-primary">Mes Tutos</a>
                                                                            <a href="#" class="btn btn-primary">Mon Site Web</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="panel-body" style="border-top: 1px solid #DDD;">
                                                                    <div style="background-color:black;">
                                                                        <h2></h2>
                                                                    </div>

                                                                </div>
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
    <SCRIPT TYPE="text/javascript">
        
        function popupform(myform, windowname)
        {
        if (! window.focus)return true;
        window.open('', windowname, 'height=200,width=400,scrollbars=yes');
        myform.target=windowname;
        return true;
        }
        
    </SCRIPT>

</body>

</html>
