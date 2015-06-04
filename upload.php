<?php
    session_start();
    if (!isset($_SESSION['login'])) {
    header ('Location: index.php');
    exit();
    }
    ?>
<?php

if( isset($_POST['envoyer']) && $_POST['envoyer'] == 'Envoyer') // si formulaire soumis
{
    $content_dir = 'tuto/'; // dossier où sera déplacé le fichier

    $tmp_file = $_FILES['html']['tmp_name'];

    if( !is_uploaded_file($tmp_file) )
    {
        exit("Le fichier HTML est introuvable");
    }

    // on copie le fichier dans le dossier de destination
    $name_file = $_FILES['html']['name'];

    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
        exit("Impossible de copier le fichier HTML dans $content_dir");
    }

    echo "Le fichier HTML a bien été uploadé";

    $content_dir2 = 'tuto/css/'; // dossier où sera déplacé le fichier

    $tmp_file2 = $_FILES['css']['tmp_name'];

    if( !is_uploaded_file($tmp_file2) )
    {
        exit("Le fichier Css est introuvable");
    }

    // on copie le fichier dans le dossier de destination
    $name_file2 = $_FILES['css']['name'];

    if( !move_uploaded_file($tmp_file2, $content_dir2 . $name_file2) )
    {
        exit("Impossible de copier le fichier Css dans $content_dir2");
    }

    echo " <br /><br /> Le fichier Css a bien été uploadé";
}

?>
<html>
<head>
	<meta charset="utf-8" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Envoi de Fichier</title>
	<!--Css-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!--Js-->
</head>
<body>
	<form action="upload.php" method="post" enctype="multipart/form-data">
                          <h1>Envoi de Vos fichiers</h1>
                          <div class="inset">
                          <p>
                            <label for="html">Selectionnez votre html (verifiez qu il n'existe pas déjà dans la liste)</label>
                            <input type="file" name="html" />
                          </p> 
                          </br> 
                          <p>
                            <label for="css">Selectionnez votre css (donnez lui le nom de votre tuto)</label>
                            <input type="file" name="css" />
                          </p> 
                          </div>
                          <p class="p-container">
                            <input name="envoyer" id="go" value="Envoyer" type="submit">
                          </p>
                          
                        </form>
</body>
</html>
