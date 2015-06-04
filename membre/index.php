<?php
// test si form de connect déjà envoyé
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {
  include ("../../bdd/localhostpdo/_mysql.php");

  // on teste si une entrée de la base contient ce couple login / pass
  
  
  $pass = md5($_POST['pass']);
  $log = $_POST['login'];
  $sql = "SELECT * FROM admin WHERE login = ? AND pass_md5 = ?";
  $req = $bdd->prepare($sql);
  $req->execute(array($log,$pass));
  $rows = $req->fetch(PDO::FETCH_NUM);

  // si on obtient une réponse, alors l'utilisateur est un membre
  if ( $rows[0] >= 1) {
  session_start();
  $_SESSION['login'] = $_POST['login'];
  $_SESSION['admin'] = 'admin';
  header('Location: membre.php');
  exit();
  }
// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
elseif ($rows[0] == false) {

  $sql2 = "SELECT * FROM membre WHERE login = ? AND pass_md5 = ?";
  $req2 = $bdd->prepare($sql2);
  $req2->execute(array($log,$pass));
  $rows2 = $req2->fetch(PDO::FETCH_NUM);
  var_dump($rows[0]);
  var_dump($rows2[0]);
  if ($rows2[0] >= 1) {
    session_start();
    $_SESSION['login'] = $_POST['login'];
    header('Location: membre.php');
    exit();
  }
}
// sinon, alors la, il y a un gros problème :)
else {
$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
}
}
else {
$erreur = 'Au moins un des champs est vide.';
}
}
?>
<html>
<head>
  <meta charset="utf-8" >
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Simplon Marsien Bonjour !!</title>
  <!--Css-->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!--Js-->
</head>
<body>
  
<form action="index.php" method="post">
  <h1>Marsien Log In</h1>
  <div class="inset">
  <p>
    <label for="email">Nom/Pseudo</label>
    <input name="login" id="email" type="text" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>">
  </p>
  <p>
    <label for="password">Mot de Passe</label>
    <input name="pass" id="password" type="password" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>">
  </p>
  </div>
  <p class="p-container">
    <span><a href="closed.html">Inscription</a></span>
    <input name="connexion" id="go" value="Connexion" type="submit">
  </p>
  <p id="errormsg"><?php
if (isset($erreur)) echo '<br /><br />',$erreur;
?></p>
</form>
</body>
</html>
