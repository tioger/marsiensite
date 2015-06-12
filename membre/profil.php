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

                <!-- Page Heading -->
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
                                                <h3 class="panel-title" style="color:black;text-align:center">Sheena Kristin A.Eschor</h3>
                                            </div>
                                            <div style="float:right;">
                                                <a href="edit.html" >Edit Profile</a>
                                            </div>
                                            <div style="clear:both;"></div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-3 col-lg-3 " align="center"> <img width="330" alt="User Pic" src="https://media.licdn.com/mpr/mpr/shrinknp_400_400/p/3/005/084/0e3/228a9b4.jpg" > </div>
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
                                                                <td style="border-top:0px;">SIMPLonMARSien : Objectif PHP MYSQL</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Mes Technos</td>
                                                                <td>
                                                                    <li class="bulle">
                                                                        <p class="perk">php</p>
                                                                    </li>
                                                                    <li class="bulle">
                                                                        <p class="perk">mysql</p>
                                                                    </li>
                                                                    <li class="bulle">
                                                                        <p class="perk">bootstrap</p>
                                                                    </li>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Structure</td>
                                                                <td>SIMPLonMARS</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Promo.</td>
                                                                <td>2015</td>
                                                            </tr>
                                                            <tr>
                                                                
                                                                <tr>
                                                                    <td>Email</td>
                                                                    <td><a href="mailto:info@support.com">info@support.com</a></td>
                                                                </tr>
                                                                
                                                                <td>
                                                                    <a href="https://twitter.com/arrighisteven"><i  class="sociaux fa fa-twitter-square fa-2x"></i></a>
                                                                    <a href="linkedin.com"><i   class="sociaux fa fa-facebook-square fa-2x"></i></a>
                                                                    <a href="linkedin.com"><i   class="sociaux fa fa-linkedin-square fa-2x"></i></a>
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
