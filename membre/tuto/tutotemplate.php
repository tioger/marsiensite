<?php
    session_start();
    if (!isset($_SESSION['login'])) {
    header ('Location: ../index.php');
    exit();
    }
    ?>
<?php
if (isset($_POST['delcom']) && $_POST['delcom'] == 'Supprimer') {
    $base = mysql_connect ('localhost', 'root', 'marsien13');
    mysql_select_db ('teammorttp', $base);
    $query = "DELETE FROM commentary WHERE id=".$_GET['comid'];
    mysql_query($query) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
    header('Location: tutotemplate.php?tuto='.$_GET["tuto"]);
    exit();

    }
?>
<?php
if (isset($_POST['ajoutcom']) && $_POST['ajoutcom'] == 'Ajouter') {
    $base = mysql_connect ('localhost', 'root', 'marsien13');
    mysql_select_db ('teammorttp', $base);
    $query = 'INSERT INTO commentary VALUES ("", "'.mysql_escape_string($_POST['authorcom']).'", "'.mysql_escape_string($_POST['comment']).'", "'.mysql_escape_string($_POST['tutoid']).'")';
    mysql_query($query) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
    header('Location: tutotemplate.php?tuto='.$_GET["tuto"]);
    exit();
    }
?>
<?php
if (isset($_POST['supprimer']) && $_POST['supprimer'] == 'Supprimer') {
    $base = mysql_connect ('localhost', 'root', 'marsien13');
    mysql_select_db ('teammorttp', $base);
    $query = "DELETE FROM Tutos WHERE id= $_GET[tuto]";
    mysql_query($query) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
    header('Location: confirmdel.php');
    exit();
    }
?>
<?php
if (isset($_POST['enregistrer']) && $_POST['enregistrer'] == 'Enregistrer') {
    $base = mysql_connect ('localhost', 'root', 'marsien13');
    mysql_select_db ('teammorttp', $base);
    $sql = "UPDATE Tutos SET content='".mysql_escape_string($_POST['contentedit'])."' WHERE id= $_GET[tuto]";
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
    header('Location: tutotemplate.php?tuto='.$_GET["tuto"]);
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
    
    <!-- Highlight CSS && JS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.5/styles/monokai_sublime.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.5/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    
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
                <div id="tutocadre" style="border:1px black solid;border-radius: 20px 20px 20px 20px;">
                    <?php  
                        include ("../_mysql.php");
                         
                        // On récupère tout le contenu de la table Tuto
                        $reponse = $bdd->query("SELECT * FROM Tutos WHERE id= $_GET[tuto]");
                        while ($donnees = $reponse->fetch())
                        {
                    ?>
                    <div id="bartutotemp">
                        <p id="titletutotemp"><?php echo utf8_decode($donnees['name']) ?></p>
                        <?php if($_SESSION['login'] == $donnees['author']){ 
                            echo "<div id='edit'>
                                    <a class='btnedit' href='edittuto.php?tuto="; echo $donnees['id']; echo"'>Editer</a>
								  </div>";
                            }
                        ?>
                        <?php if($_SESSION['login'] == $donnees['author']){ 
                            echo "<div id='delete'>
                                    <a class='btndelete'  data-toggle='modal' data-target='.bs-example-modal-sm' href=''>Supprimer</a>
                                    <div class='modal fade bs-example-modal-sm' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog modal-sm'>
                                            <div class='modal-content'>
                                                <form action='tutotemplate.php?tuto="; echo $donnees['id']; echo"' method='post'>
                                                    <label for='supprimer'>Etes Vous sur de vouloir supprimer votre tuto ?</label>
                                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
                                                    <input class='btn btn-default' type='submit' name='supprimer' value='Supprimer'>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                            }
                        ?>
                        <p id="author">Crée par <span id="capitalize"><?php echo $donnees['author'] ?></span></p>
                    </div>
					<div id="contenttuto">
                            <?php if ($donnees['online'] == 'online'){
                                    echo $donnees['content'];
                                   }
                                  elseif ($_SESSION['login'] == $donnees['author']) {
                                       echo $donnees['content'];
                                   }
                                  else{
                                    echo 'Tuto actuellement hors ligne';
                                  }
                            ?>
					</div>
                    <?php
                        }

                        $reponse->closeCursor();

                    ?> 
                    <div class="clear"></div>
                    <!-- commentaire-->
                    <div id="centerbar">
                        <p id="title">Commentaires</p>  
                    </div> 
                    <?php  
                        include ("../_mysql.php");
                         
                        // On récupère tout le contenu de la table commentary
                        $reponse = $bdd->query("SELECT * FROM commentary WHERE tutoid= $_GET[tuto]");
                        while ($donnees = $reponse->fetch())
                        {
                    ?>
                        <div class="comment">
                            <div class="authorcom">Posté par <?php echo $donnees['authorcom']; ?></div>
                            <div class="contentcom"><?php echo utf8_decode($donnees['comment']); ?></div>
                            <?php if($_SESSION['login'] == $donnees['authorcom']){ 
                            echo "<div id='deletecom'>
                                    <a class='btndeletecom'  data-toggle='modal' data-target='.bs-com-modal-sm' href=''>Supprimer ce commentaire</a>
                                    <div class='modal fade bs-com-modal-sm' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog modal-sm'>
                                            <div class='modal-content'>
                                                <form action='tutotemplate.php?tuto="; echo $donnees['tutoid']; echo"&comid="; echo $donnees['id']; echo"' method='post'>
                                                    <label for='supprimer'>Etes Vous sur de vouloir supprimer votre commentaire ?</label>
                                                    <input type='hidden' value='"; echo $donnees['id']; echo"'></input>
                                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Annuler</button>
                                                    <input class='btn btn-default' type='submit' name='delcom' value='Supprimer'></input>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='clear'></div>";
                            }
                            ?>
                        </div>
                    <?php
                        }

                        $reponse->closeCursor();

                    ?>  
                    <div id="addcombar">
						<p id="title">Ajouter un commentaire</p>			
                    </div>
                    <div >
                        <form action="tutotemplate.php?tuto=<?php echo $_GET['tuto']; ?>" method="post">
                            <div class="inset" id="addcomform">
                                </br>
                                <p>
                                    <textarea rows="8" name="comment" id="comment" ></textarea>
                                    <input name="authorcom" type="hidden" value="<?php echo htmlentities(trim($_SESSION['login'])); ?>"></input>
                                    <input name="tutoid" type="hidden" value="<?php echo $_GET['tuto']; ?>"></input>
                                </p>
                                
                            </div>
                            <p class="p-container" id="inputcom">
                            <input name="ajoutcom" class="btn btn-default" id="ajoutcom" value="Ajouter" type="submit">
                            </p>
                        </form>
                    </div>
                     <div id="footbar">            
                    </div>
					<!-- /commentaire -->
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
                CKEDITOR.replace( 'contentedit' );
                CKEDITOR.config.codeSnippet_theme = 'monokai_sublime';
    </script>

</body>

</html>
