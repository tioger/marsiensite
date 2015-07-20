<?php
    session_start(); 
?>
<link rel="stylesheet" href="css/login.css" type="text/css" />
<link rel="stylesheet" href="css/nospromos.css" type="text/css" />
<header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <li><p style="color:white">Nos Réseaux Sociaux : </p></li>
                                <li><a href="mailto:simplonmars@centrale-marseille.fr"><i class="fa fa-envelope-o"></i></a></li>
                                <li><a href="https://twitter.com/SIMPLonMARS" target="blank"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img style="margin-bottom: 10px;" src="img/logosom.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right margo" style="margin-right: 155px !important;">
                    <ul class="nav navbar-nav">
                        <li class="fuck-off fa-2x"><a href="./"><i class="fa fa-home"></i></a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">A propos<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="formation.php">La Formation</a></li>
                                <li><a href="equipe.php">Equipe</a></li>
                                <li><a href="presse.php">Presse</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="nospromos.php">Nos Promos</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">Ecosystème<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="simplon.php" >Simplon.Co</a></li>
                                <li><a href="centrale.php">Centrale</a></li>
                                <li><a href="marseillesolution.php">Marseille Solutions</a></li>
                                <li><a href="technopole.php">Chateau Gombert</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="recrutez.php">Recruter</a>
                        </li>
                        <!--<li><a href="partenaires.php">Partenaires</a></li>-->
                        <li><a href="contact-us.php">Contact</a></li>
                        <?php
                            if(isset($_SESSION['login'])){
                                echo'
                                <li class="menutest" id="menu1">
                                    <a class="account" href="membre/index.php">
                                       Espace Membre 
                                    </a>
                                </li> ';  
                            }
                            else{
                                echo'<li class="menutest" id="menu1">
                            <a class="account">
                               Login
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <div class="submenu">
                                <form style="margin: 0px" accept-charset="UTF-8" action="index.php" method="post">
                                    <fieldset class="textbox" style="padding:10px">
                                       <input style="margin-top: 8px; width: 157px;" type="text" name="login" placeholder="Username" />
                                       <input style="margin-top: 8px; width: 157px;" type="password" name="pass" placeholder="Passsword" />
                                       <input class="btn-primary" name="connexion" type="submit" value="Connexion" />
                                    </fieldset>
                                </form>
                                <p id="errormsg">';
                                        if (isset($erreur)) echo '<br /><br />',$erreur;
                                echo'</p>
                            </div>
                        </li> ';
                            }

                        ?>
                                              
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js
"></script>
<script src="js/login.js" ></script>
    