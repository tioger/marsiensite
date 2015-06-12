<?php
    session_start();
    if (!isset($_SESSION['login'])) {
    header ('Location: ../index.php');
    exit();
    }
    ?>
<?php
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
  // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
  if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))) {
    // on teste les deux mots de passe
    if ($_POST['pass'] != $_POST['pass_confirm']){
      $erreur = 'Les 2 mots de passe sont différents.';
    }
    else {
       include ("../../../bdd/localhostpdo/_mysql.php");
       // on teste si ce login est déjà utilisé
      $login = $_POST['login'];
      $sql = "SELECT * FROM admin WHERE login = ? ";
      $req = $bdd->prepare($sql);
      $req->execute(array($login));
      $rows = $req->fetch(PDO::FETCH_NUM);
      // si on obtient aucune réponse alors on crée le membre
        if ( $rows[0] == false) {
          $pass =md5($_POST['pass']);
          $req = $bdd->prepare("INSERT INTO admin(id, login, pass_md5) VALUES(:id, :login, :pass)");
          $req->execute(array(
            "id" => "",
            "login" => $_POST['login'],
            "pass" => $pass));
          header('Location: index.php');
          exit();
        }
        else {
          $erreur = 'Un admin possède déjà ce login.';
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
  <title>Ajouter un Admin</title>
  <!--Css-->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!--Js-->
</head>
<body>
  
<form action="ajoutadmin.php" method="post">
  <h1>Ajout Admin</h1>
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
  <p id="errormsg">
    <?php
      if (isset($erreur)) echo '<br /><br />',$erreur;
    ?>
  </p>
</form>
</body>
</html>
