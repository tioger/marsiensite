<link rel="stylesheet" href="css/login.css" type="text/css" />
<link rel="stylesheet" href="css/nospromos.css" type="text/css" />
<header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i>  +0123 456 70 90</p></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/SIMPLonMARS" target="blank"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                            <div class="search">
                                <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                    <i class="fa fa-search"></i>
                                </form>
                           </div>
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
                    <a class="navbar-brand" href="index.php"><img src="img/logosom.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right margo">
                    <ul class="nav navbar-nav">
                        <li class="fuck-off fa-2x"><a href="./"><i class="fa fa-home"></i></a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">A propos<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="equipe.php">Equipe</a></li>
                                <li><a href="nospromos.php">Nos Promos</a></li>
                                <li><a href="presse.php">Presse</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">Ecosystème<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="http://simplon.co/" target="blank">Simplon.Co</a></li>
                                <li><a href="centrale.php">Centrale</a></li>
                                <li><a href="marseilleS.php">Marseille Solution</a></li>
                                <li><a href="castleG.php">Chateau Gombert</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">Offres<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="event.php">Evènement</a></li>
                                <li><a href="recrutez.php">Recrutez</a></li>
                            </ul>
                        </li>
                        <li><a href="partenaires.php">Partenaires</a></li>
                        <li><a href="contact-us.php">Contact</a></li>
                        <li class="menutest" id="menu1">
                            <a class="account">
                               Login
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <div class="submenu">
                                <form style="margin: 0px" accept-charset="UTF-8" action="index.php" method="post">
                                    <fieldset class='textbox' style="padding:10px">
                                       <input style="margin-top: 8px; width: 157px;" type="text" name="login" placeholder="Username" />
                                       <input style="margin-top: 8px; width: 157px;" type="password" name="pass" placeholder="Passsword" />
                                       <input class="btn-primary" name="connexion" type="submit" value="Connexion" />
                                    </fieldset>
                                </form>
                                <p id="errormsg">
                                    <?php
                                        if (isset($erreur)) echo '<br /><br />',$erreur;
                                    ?>
                                </p>
                            </div>
                        </li>                       
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js
"></script>
<script src="js/login.js" ></script>
    