<?php
    session_start();
    if (!isset($_SESSION['login'])) {
    header ('Location: ../index.php');
    exit();
    }
    ?>
<?php
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['envoyer']) && $_POST['envoyer'] == 'Envoyer') {
  // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
  if ((isset($_POST['Titre']) && !empty($_POST['Titre']))  && (isset($_POST['DATE']) && !empty($_POST['DATE'])) && (isset($_POST['Source']) && !empty($_POST['Source'])) && (isset($_POST['Contenu']) && !empty($_POST['Contenu']))&& (isset($_POST['Auteur']) && !empty($_POST['Auteur']))) {
    // on teste les deux  données voir si elles ne sont pas identiques
    if ($_POST['Titre'] == $_POST['Source']) {
      $erreur = 'Les 2 champs sont identiques.';
    }
    else {
      include ("../../../bdd/localhostpdo/_mysql.php");
      // on teste si un tuto à le meme nom
      $Titre = $_POST['Titre'];
      $sql = "SELECT * FROM Press WHERE Titre = ? ";
      $req = $bdd->prepare($sql);
      $req->execute(array($Titre));
      $rows = $req->fetch(PDO::FETCH_NUM);
      // si on obtient une réponse, alors l'utilisateur est un membre
      if ( $rows[0] == false) {
        if(isset($_POST['online']) && !empty($_POST['online'])){
          $online = $_POST['online'];
        }
        else{
          $online = "";
        }
        $req = $bdd->prepare("INSERT INTO Press(PressID, Source, DATE, Titre, Contenu, Auteur, Lien) VALUES(:PressID, :Source, :DATE, :Titre, :Contenu, :Auteur, :Lien)");
        $req->execute(array(
          "PressID" => "",
          "Source" => $_POST['Source'],
          "DATE" => $_POST['DATE'],
          "Titre" => $_POST['Titre'],
          "Contenu" => $_POST['Contenu'],
          "Auteur" => $_POST['Auteur'],
          "Lien" => $_POST['Lien']));
        header('Location: press/confirmcreate.php');
        exit();
      }
      else {
        $erreur = 'Un article porte déjà le meme nom.';
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
  <meta http-equiv="X-UA-Compatible" Contenu="IE=edge,chrome=1">
  <title>Formulaire Ajout Article</title>
  <!--Css-->
  <link rel="stylesheet" type="text/css" href="css/addtuto.css">
  <!--Js-->
  <script src="press/ckeditor/ckeditor.js"></script>
</head>
<body>
<form action="ajoutpress.php" method="post">
  <h1>Ajouter un Nouvel Article</h1>
  <div class="inset">
  <p>
    <label for="Titre">Titre</label>
    <input name="Titre" id="Titre" type="text" value="<?php if (isset($_POST['Titre'])) echo htmlentities(trim($_POST['Titre'])); ?>">
  </p>
  <p>
    <label for="Source">Source</label>
    <input name="Source" id="Source" type="text" value="<?php if (isset($_POST['Source'])) echo htmlentities(trim($_POST['Source'])); ?>">
  </p>
  </br>
  <p>
    <label for="Auteur">Auteur</label>
    <input name="Auteur" id="Auteur" type="text" value="<?php if (isset($_POST['Auteur'])) echo htmlentities(trim($_POST['Auteur'])); ?>">
  </p>
  </br>
  <p>
    <label for="DATE">Date</label>
    <input name="DATE" id="DATE" type="text" value="<?php if (isset($_POST['DATE'])) echo htmlentities(trim($_POST['DATE'])); ?>">
  </p>
  </br>
  <p>
    <label for="Lien">Lien vers l'Article</label>
    <input name="Lien" id="Lien" type="text" value="<?php if (isset($_POST['Lien'])) echo htmlentities(trim($_POST['Lien'])); ?>">
  </p>
  </br>
  <p>
    <label for="Contenu">Votre Article</label>
    <textarea name="Contenu" id="Contenu" rows="10" cols="80"  ></textarea>
  </p>
  </br>
  </div>
  <p class="p-container">
    <input name="envoyer" id="go" value="Envoyer" type="submit">
  </p>
  <p id="errormsg"><?php if (isset($erreur)) echo '<br /><br />',$erreur;?></p>
</form>
<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'Contenu' );
</script>
</body>
</html>
