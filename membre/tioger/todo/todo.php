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
	<link href="css/todo.css" rel="stylesheet">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<!--Js-->
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<script	type="text/javascript" src="js/todo.js"></script>
</head>
<body>
	<?php include 'navbar.php' ; ?>

<div class="container" style="margin-top:100px;">
   <?php echo 'Bienvenue sur votre profil '; echo $_SESSION["name"] ; ?>
   
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="todolist not-done">
             <h1>Todos</h1>
				<form action="todo.php" method="post">
					<input type="text" class="form-control add-todo" placeholder="Add todo">
					<input type="submit"  id="checkAll" class="btn btn-success" value="Ajouter tache">
                  </form>
                    <hr>
                    <ul id="sortable" class="list-unstyled">
                    <li class="ui-state-default">
                        <div class="checkbox">
                            Take out the trash<div id="buttonpannel"><a href="delete.php"><i class="fa fa-times"></i></a><a href="edit.php"><i class="fa fa-pencil-square-o"></i></a></div>

                        </div>
                    </li>
                    <li class="ui-state-default">
                        <div class="checkbox">
                            Take out the trash<div id="buttonpannel"><a href="delete.php"><i class="fa fa-times"></i></a><a href="edit.php"><i class="fa fa-pencil-square-o"></i></a></div>

                        </div>
                    </li>
					<li class="ui-state-default">
                        <div class="checkbox">
                            Take out the trash<div id="buttonpannel"><a href="delete.php"><i class="fa fa-times"></i></a><a href="edit.php"><i class="fa fa-pencil-square-o"></i></a></div>

                        </div>
                    </li>
					<li class="ui-state-default">
                        <div class="checkbox">
                            Take out the trash<div id="buttonpannel"><a href="delete.php"><i class="fa fa-times"></i></a><a href="edit.php"><i class="fa fa-pencil-square-o"></i></a></div>

                        </div>
                    </li>
                </ul>
                <hr>
            </div>
        </div>
       
    </div>
</div>
</div>
</body>
</html>