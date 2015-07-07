<?php 
include ("../bdd/localhostpdo/_mysql.php");
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIMPLonMARS or how learn to learn | Equipe</title>
	
	<!-- core CSS -->
    <link href="css/bootstrap.min2.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
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

<body>

    <?php include 'menu.php'; ?>
	<section id="equipe">
        <div class="container">
			<div class="team">
				<div class="center wow fadeInDown">
					<h2>Nos Nollaborateurs</h2>
					<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
				</div>

				<div class="row clearfix homer">
					<?php
					 // On récupère toutes les promos
                    $reponse = $bdd->query('SELECT * FROM Promos');

                    // On affiche chaque entrée une à une
                    while ($donnees = $reponse->fetch())
                    {
                    ?>
					<div style="width: 100%;height: 30px;">
						<hr class="style-two" style="float: left;width: 45%;">
						<h4 style="float: left;margin: 10px auto auto;width: 10%;text-align: center;">Promo <?php echo $donnees['year'] ?></h4>
						<hr class="style-two" style="float: left;width: 45%;">
					</div>
					<div style="clear:both"></div>
					<?php 
						$reponse2 = $bdd->query('SELECT * FROM Students WHERE promo='.$donnees['year']);
						$compteur=0;
                    	// On affiche chaque entrée une à une
                    	while ($donnees2 = $reponse2->fetch())
                    	{
                    		$compteur ++ ;
                    ?>
                    	<div class="col-md-3 col-sm-3 profil">	
							<div class="single-profile wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
								<div class="media">
									<div class="pull-left blc-img-prof">
										<a href="#"><img class="media-object" src="img/promo/<?php echo $donnees['year'] ?>/<?php echo $compteur?>.jpg" width="328" alt=""></a>
									</div>
									<div class="media-body">
										<h4><?php echo $donnees2['lastname'] ?> </h4>
										<ul class="tag clearfix">
											<?php
												$technos = $donnees2["technos"];
	                                            $keywords = preg_split("/[\s,]+/", $technos);
	                                            foreach ($keywords as &$value) {
	                                            	echo '<li class="btn"><a href="#">'; echo $value ; echo '</a></li>';   
	                                            }
                                             ?>
										</ul>
										<ul class="social_icons">
											<li><a href="mailto:<?php echo $donnees2['email'] ?>"><i class="fa fa-envelope-o"></i></a></li> 
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											<li><a href="#"><i class="fa fa-github"></i></a></li>  
										</ul>
									</div>
								</div><!--/.media -->
								<p>un mec parfait avec plein de défauts..... je suis iremplacablement inutile a la société ...
	Rodolphe est une personnification de la puissance.</p>
							</div>
						</div><!--/.col-lg-4 -->
					<?php
						}
					} 
					?>
					 
					
				</div>
			</div><!--section-->
		</div><!--/.container-->
    </section><!--/about-us-->
    <?php include 'footer.php' ?>
    

    <script src="js/jquery.js"></script>
    <script type="text/javascript">
        $('.carousel').carousel()
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>