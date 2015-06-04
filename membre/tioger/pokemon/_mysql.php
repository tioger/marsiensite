<?php

try

{

    $bdd = new PDO('mysql:host=teammorttp.mysql.db;dbname=teammorttp;charset=utf8', 'teammorttp', 'marsien13');

}

catch (Exception $e)

{

        die('Erreur : ' . $e->getMessage());

}

?>