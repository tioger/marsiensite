<?php 
$erreur ='';
// test si form de connect déjà envoyé
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion'){
  if((isset($_POST['name']) && !empty($_POST['name'])) && (isset($_POST['password']) && !empty($_POST['password']))){
    include 'pdo.php';

    // on teste si une entrée de la base contient ce couple name / pass
    $sql =' SELECT count(*) FROM Membres WHERE name = "'.mysql_escape_string($_POST['name']).'" AND password = "'.mysql_escape_string(md5($_POST['password'])).'"';
    $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
    $data = mysql_fetch_array($req);
    mysql_free_result($req);
    mysql_close();

    // si on obtient une réponse, alors l'utilisateur est un membre
    if ($data[0] == 1){
      session_start();
      $_SESSION['name'] = $_POST['name'];
      header('Location: profil.php');
      exit();
    }
    else{
      $erreur = "Identifiant/Mot de Passe Incorrect ou Compte Inexistant <a href='inscription.php'>Creer un compte !</a>";
    }
  }
  else{
    $erreur = 'Au moins un champs est vide';
  }
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
	<form action="index.php" method="post">
  <h1>Bienvenue !! Connectez vous pour accéder à votre profil!</h1>
  <div class="inset">
  <p>
    <label for="name">Nom</label>
    <input name="name" id="name" type="text" value="">
  </p>
  <p>
    <label for="password">Password</label>
    <input name="password" id="password" type="password" value="">
  </p>
  </div>
  <p class="p-container">
    <input name="connexion" id="go" value="Connexion" type="submit">
  </p>
  </form>
  <p><?php echo $erreur ; ?></p>
</div>
</body>
</html>