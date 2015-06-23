<?php
    session_start();
    if (!isset($_SESSION['admin'])) {
    header ('Location: ../index.php');
    exit();
    }
    ?>
<?php
include ("../../../../bdd/localhostpdo/_mysql.php");
?>
<?php
if (isset($_POST['supprimer']) && $_POST['supprimer'] == 'Supprimer') {
    $req = $bdd->prepare("DELETE FROM Press WHERE PressID= :article");
    $req->execute(array(
        'article' => $_GET['article']
        ));
    header('Location: confirmdel.php');
    exit();
    }
?>
<?php
if (isset($_POST['enregistrer']) && $_POST['enregistrer'] == 'Enregistrer') {
    $base = mysql_connect ('localhost', 'root', 'zeratul90ub!!??');
    mysql_select_db ('teammorttp', $base);
    $req = $bdd->prepare("UPDATE Press SET Contenu= :contentedit WHERE PressID= :article");
    $req->execute(array(
        'contentedit' => $_POST['contentedit'],
        'article' => $_GET['article']
        ));
    header('Location: presstemplate.php?article='.$_GET["article"]);
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
                        include ("../../../../bdd/localhostpdo/_mysql.php");
                         
                        // On récupère tout le contenu de la table Tuto
                        $reponse = $bdd->query("SELECT * FROM Press WHERE PressID= $_GET[article]");
                        while ($donnees = $reponse->fetch())
                        {
                    ?>
                    <div id="bartutotemp">
                        <p id="titletutotemp"><?php echo $donnees['Titre'] ?></p>
                        <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin'){ 
                            echo "<div id='edit'>
                                    <a class='btnedit' href='editpress.php?article="; echo $donnees['PressID']; echo"'>Editer</a>
								  </div>";
                            }
                        ?>
                        <?php echo "<div id='delete'>
                                    <a class='btndelete'  data-toggle='modal' data-target='.bs-example-modal-sm' href=''>Supprimer</a>
                                    <div class='modal fade bs-example-modal-sm' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog modal-sm'>
                                            <div class='modal-content'>
                                                <form action='presstemplate.php?article="; echo $donnees['PressID']; echo"' method='post'>
                                                    <label for='supprimer'>Etes Vous sur de vouloir supprimer votre article ?</label>
                                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
                                                    <input class='btn btn-default' type='submit' name='supprimer' value='Supprimer'>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                        ?>
                        <p id="author">Ecrit par <span id="capitalize"><?php echo $donnees['Auteur'] ?></span></p>
                    </div>
					<div id="contenttuto">
                        <?php echo $donnees['Contenu'];
                        ?>
                        <p>
                            <a href="<?php echo $donnees['Lien'] ?>" target="blank">Lire la suite</a>
                        </p>
					</div>
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
                CKEDITOR.replace( 'contentedit' );
                CKEDITOR.config.codeSnippet_theme = 'monokai_sublime';
    </script>

</body>

</html>
