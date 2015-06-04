<?php
    session_start();
    if (!isset($_SESSION['login'])) {
    header ('Location: index.php');
    exit();
    }
    ?>
<?php
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
// on teste l'existence de nos variables. On teste également si elles ne sont pas vides
if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))) {
// on teste les deux mots de passe
if ($_POST['pass'] != $_POST['pass_confirm']) {
$erreur = 'Les 2 mots de passe sont différents.';
}
else {
$base = mysql_connect ('localhost', 'root', 'marsien13');
mysql_select_db ('teammorttp', $base);

// on recherche si ce login est déjà utilisé par un autre membre
$sql = 'SELECT count(*) FROM membre WHERE login="'.mysql_escape_string($_POST['login']).'"';
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
$data = mysql_fetch_array($req);

if ($data[0] == 0) {
$sql = 'INSERT INTO membre VALUES("", "'.mysql_escape_string($_POST['login']).'", "'.mysql_escape_string(md5($_POST['pass'])).'")';
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());


header('Location: membre.php');
exit();
}
else {
$erreur = 'Un membre possède déjà ce login.';
}
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
  <title></title>
  <!--Css-->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!--Js-->
</head>
<body>
  
<form action="ajoutmembre.php" method="post">
  <h1>Ajout Membre</h1>
  <div class="inset">
  <p>
    <label for="email">Nom/Pseudo</label>
    <input name="login" id="email" type="text" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>">
  </p>
  <p>
    <label for="password">Mot de Passe</label>
    <input name="pass" id="password" type="password" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>">
  </p>
  <p>
    <label for="password">Confirmation Mot de Passe</label>
    <input name="pass_confirm" id="password" type="password" value="<?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>">
  </p>
  </div>
  <p class="p-container">
    <input name="inscription" id="go" value="Inscription" type="submit">
  </p>
  <p id="errormsg"><?php
if (isset($erreur)) echo '<br /><br />',$erreur;
?></p>
</form>
</body>
</html>
