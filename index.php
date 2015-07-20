<?php
// test si form de connect déjà envoyé
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {
 include ("../bdd/localhostpdo/_mysql.php");

  // on teste si une entrée de la base contient ce couple login / pass
  
  
  $pass = md5($_POST['pass']);
  $log = $_POST['login'];
  $sql = "SELECT * FROM admin WHERE login = ? AND pass_md5 = ?";
  $req = $bdd->prepare($sql);
  $req->execute(array($log,$pass));
  $rows = $req->fetch(PDO::FETCH_NUM);

  // si on obtient une réponse, alors l'utilisateur est un membre
  if ( $rows[0] >= 1) {
  session_start();
  $_SESSION['login'] = $_POST['login'];
  $_SESSION['admin'] = 'admin';
  header('Location: membre/index.php');
  exit();
  }
// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
elseif ($rows[0] == false) {

  $sql2 = "SELECT * FROM membre WHERE login = ? AND pass_md5 = ?";
  $req2 = $bdd->prepare($sql2);
  $req2->execute(array($log,$pass));
  $rows2 = $req2->fetch(PDO::FETCH_NUM);
  var_dump($rows[0]);
  var_dump($rows2[0]);
  if ($rows2[0] >= 1) {
    session_start();
    $_SESSION['login'] = $_POST['login'];
    header('Location: membre/index.php');
    exit();
  }
}
// sinon, alors la, il y a un gros problème :)
else {
$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
}
}
else {
$erreur = 'Au moins un des champs est vide.';
}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIMPLonMARS or how learn to learn | Home</title>
	
	<!-- core CSS -->
    <link href="css/bootstrap.min2.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body class="homepage">

    <?php include 'menu.php'; ?>

    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <div class="carousel-inner">

                <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-2">SIMPLonMARS</h1>
                                    <h2 class="animation animated-item-2">Ou quand les jeunes sortent des quartiers pour apprendre à coder.</h2>
                                    <a class="btn-slide animation animated-item-3" href="#">En Savoir Plus </a>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="img/render.png" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
    </section><!--/#main-slider-->

    <section id="about-us">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>SIMPLonMARS</h2>
                <p class="lead">Centrale Marseille et Simplon.co, fabrique sociale de codeurs, s’associent pour développer SIMPLonMARS : une formation innovante orientée vers les métiers du numérique et ouverte aux jeunes issus des quartiers prioritaires de Marseille.</p>
            </div>
            
            <!-- about us slider -->
            <div id="about-slider">
                <div id="carousel-slider" class="carousel slide" data-ride="carousel">
                    <div id="imgaboutus">
                        <img src="img/img_2272.jpg">
                    </div>  
                </div> <!--/#carousel-slider-->
            </div><!--/#about-slider-->
            
            
            
        </div>
    </section>
    <!-- au cas ou !!
    <section id="services" class="service-item">
	   <div class="container">
            <div class="center wow fadeInDown">
                <h2>Our Service</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>

            <div class="row">

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="images/services/services1.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">SEO Marketing</h3>
                            <p>Lorem ipsum dolor sit ame consectetur adipisicing elit</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="images/services/services2.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">SEO Marketing</h3>
                            <p>Lorem ipsum dolor sit ame consectetur adipisicing elit</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="images/services/services3.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">SEO Marketing</h3>
                            <p>Lorem ipsum dolor sit ame consectetur adipisicing elit</p>
                        </div>
                    </div>
                </div>  

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="images/services/services4.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">SEO Marketing</h3>
                            <p>Lorem ipsum dolor sit ame consectetur adipisicing elit</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="images/services/services5.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">SEO Marketing</h3>
                            <p>Lorem ipsum dolor sit ame consectetur adipisicing elit</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="images/services/services6.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">SEO Marketing</h3>
                            <p>Lorem ipsum dolor sit ame consectetur adipisicing elit</p>
                        </div>
                    </div>
                </div>                                                
            </div><!
        </div>
    </section><!--/.row-->
    <section id="partner">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Nos Partenaire</h2>
                
            </div>    

            <div class="partners">
                <ul>
                    <li style="margin-left: 15%;"><a href="http://www.bouches-du-rhone.gouv.fr/"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="img/prefe.jpg"></a></li>
                    <li style="width: 40%; float: right; margin-top: 45px; margin-right: 10%;"><a href="http://www.regionpaca.fr/"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="img/region.png"></a></li>
                </ul>
            </div>        
        </div><!--/.container-->
    </section><!--/#partner-->

    <?php include 'footer.php' ?>

    <script src="js/jquery1.10.js"></script>
    <script src="js/bootstrap.min2.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>