<?php
    session_start();
    if (!isset($_SESSION['name'])) {
    header ('Location: index.php');
    exit();
    }
    ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title></title>
	<!--Css-->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!--Js-->
</head>
<body>
	<?php include 'navbar.php' ; ?>

<div class="container" style="margin-top:100px;">
   <?php echo 'Bienvenue sur votre profil '; echo $_SESSION["name"] ; ?>
</div>
</body>
</html>