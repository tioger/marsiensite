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
    <meta name="description" content="Site des SIMPLonMARSiens">
    <meta name="author" content="Tioger">

    <title>Marsien Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link href="../css/editbar.css" rel="stylesheet">


    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- JS -->
    <script src="ckeditor/ckeditor.js"></script>

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
                <div id="tutocadreedit" style="border:1px black solid;border-radius: 20px 20px 20px 20px;">
                    <?php  
                        include ("../../../bdd/localhostpdo/_mysql.php");
                         
                        // On récupère tout le contenu de la table Tuto
                        $reponse = $bdd->query("SELECT * FROM Tutos WHERE id= $_GET[tuto]");
                        while ($donnees = $reponse->fetch())
                        {
                    ?>
                    <?php if($_SESSION['login'] == $donnees['author']){ 
                            echo "<div id='content'>
                                    <form method='post' action='tutotemplate.php?tuto="; echo $donnees['id']; echo"'>
										<p>
											<center>
												<label for='contentedit'>Modifier Votre Tuto</label>
											</center>
                                            <textarea name='contentedit' style='height:100%' id='contentedit' rows='100' cols='180'  >"; echo $donnees['content']; echo "</textarea>
                                        </p>
                                        <div class='footeredit'>
                                            <a class='btn btn-default' href='tutotemplate.php?tuto="; echo $donnees['id']; echo"'>Annuler</a>
                                            <input class='btn btn-default' name='enregistrer' id='go' value='Enregistrer' type='submit'>
                                        </div>
                                      </form>  
                                   </div>
                                ";
                            }
						  else {
							header ('Location: ../tuto.php');
							}	
                    ?>
                    <?php
                        }

                        $reponse->closeCursor();

                    ?> 
                    <div class="clear"></div>
					
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>

    <!-- Ckeditor -->
    <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'contentedit', CKEDITOR.tools.extend( {
                                codeSnippet_theme: 'monokai_sublime'
                            }, true ) );
    </script>

</body>

</html>
