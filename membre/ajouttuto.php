<?php
    session_start();
    if (!isset($_SESSION['login'])) {
    header ('Location: index.php');
    exit();
    }
    ?>
<?php
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['envoyer']) && $_POST['envoyer'] == 'Envoyer') {
// on teste l'existence de nos variables. On teste également si elles ne sont pas vides
if ((isset($_POST['name']) && !empty($_POST['name']))  && (isset($_POST['shortdescrib']) && !empty($_POST['shortdescrib'])) && (isset($_POST['language']) && !empty($_POST['language'])) && (isset($_POST['content']) && !empty($_POST['content']))&& (isset($_POST['author']) && !empty($_POST['author']))) {
// on teste les deux  données voir si elles ne sont pas identiques
if ($_POST['name'] == $_POST['language']) {
$erreur = 'Les 2 champs sont identiques.';
}
else {
$base = mysql_connect ('localhost', 'root', 'marsien13');
mysql_select_db ('teammorttp', $base);

// on recherche si un tuto du meme nom existe déjà
$sql = 'SELECT count(*) FROM Tutos WHERE name="'.mysql_escape_string($_POST['name']).'"';
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
$data = mysql_fetch_array($req);

if ($data[0] == 0) {
$sql = 'INSERT INTO Tutos VALUES("", "'.mysql_escape_string($_POST['language']).'", "'.mysql_escape_string($_POST['shortdescrib']).'", "'.mysql_escape_string($_POST['name']).'", "'.mysql_escape_string($_POST['content']).'", "'.mysql_escape_string($_POST['author']).'", "'.mysql_escape_string($_POST['online']).'")';
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());


header('Location: tuto/confirmcreate.php');
exit();
}
else {
$erreur = 'Un tuto porte déjà le meme nom.';
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
  <title>Formulaire Ajout Tuto</title>
  <!--Css-->
  <link rel="stylesheet" type="text/css" href="css/addtuto.css">
  <!--Js-->
  <script src="tuto/ckeditor/ckeditor.js"></script>
</head>
<body>
<form action="ajouttuto.php" method="post">
  <h1>Ajouter un Nouveau Tuto</h1>
  <div class="inset">
  <p>
    <label for="name">Nom</label>
    <input name="name" id="name" type="text" value="<?php if (isset($_POST['name'])) echo htmlentities(trim($_POST['name'])); ?>">
  </p>
  <p>
    <label for="language">Language</label>
    <select name="language">
        <option value=""> ----- Choisir le Language ----- </option>
        <option value="C"> C </option>
        <option value="Cplusplus"> C++ </option>
        <option value="HtmlCss"> Html + Css </option>
        <option value="Javascript"> Javascript </option>
        <option value="Jquery"> Jquery </option>
        <option value="PHP"> PHP </option>
        <option value="Python"> Python </option>
        <option value="Ruby"> Ruby </option>
        <option value="RubyonRails"> Rails </option>
    </select>
  </p>
  </br>
  <p>
    <label for="shortdescrib">Courte Description</label>
    <textarea rows="5" name="shortdescrib" id="shortdescrib" cols="50" ></textarea>
    <input name="author" type="hidden" value="<?php echo htmlentities(trim($_SESSION['login'])); ?>">
  </p>
  </br>
  <p>
    <label for="content">Votre Tuto</label>
    <textarea name="content" id="content" rows="10" cols="80"  ></textarea>
  </p>
  </br>
  <p>
    <label for="online">Publier votre tuto ?</label>
    <input type="checkbox" name="online" value="online">
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
                CKEDITOR.replace( 'content' );
</script>
</body>
</html>
