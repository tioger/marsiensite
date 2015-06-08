<?php
    session_start();
    if (!isset($_SESSION['login'])) {
    header ('Location: index.php');
    exit();
    }
?>
<html>
    <head>
        <meta http-equiv="refresh" content="10;url=../tuto.php" />
        <meta charset="utf-8" >
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Confirmation Suppression TuTo</title>
		<!--Css-->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <style type="text/css">
        body { background-color: #222;color:white;}
		.error-template {padding: 40px 15px;text-align: center;}
		.error-actions {margin-top:15px;margin-bottom:15px;}
		.error-actions .btn { margin-right:10px; }
        </style>
    </head>
    <body>
    	<div class="container">
		    <div class="row">
		        <div class="col-md-12" style="margin-top: 20%;">
		            <div class="error-template">
		                <h1>
		                    Votre tuto a bien été supprimé !</h1>
		                <h2>
		                    Vous allez être redirigé vers la liste des tutos dans 10 sec ... !</h2>
		                <div class="error-details" style="margin-top: 50px;">
		                    Si la redirection ne fonctionne pas vous pouvez selectionner un des liens ci-dessous .
		                </div>
		                <div class="error-actions">
		                    <a href="../tuto.php" class="btn btn-primary btn-lg"><span class="fa fa-fw fa-file-code-o "></span>
		                        Liste des Tutos </a><a href="../index.php" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-home"></span> Retour vers l'Accueil </a>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
    </body>
</html>