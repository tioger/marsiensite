
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
    <h2>Salut <?php echo ucfirst($_POST["name"]); ?>  ! </h2>
    <?php if($_POST["name"] == "steven" or $_POST["name"] == "iris"){
        echo '<h2>Bienvenue sur votre pannel admin</h2>
                    <div id="tre">Votre  adresse mail est '; echo $_POST["email"]; echo '</div>';
    } 
    else{
        echo'<h2>Casse Toi tu pue!</h2>';
    }
    ?>
<table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Prenom</th>
          <th>Email</th>
          <th style="width: 36px;"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $_POST["name"]; ?></td>
          <td><?php echo $_POST["lastname"]; ?></td>
          <td><?php echo $_POST["email"] ?></td>
          <td>
              <a href="user.html"><i class="fa fa-pencil"></i></a>
              <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-times"></i></a>
          </td>
        </tr>

      </tbody>
    </table>
</div>
</body>
</html>