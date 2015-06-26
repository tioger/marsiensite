
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Marsien Dashboard</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="capitalize" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo htmlentities(trim($_SESSION['login'])); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu" id="dmwidth">
                        
                        <li>
                            <a href="../deconnexion.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li >
                        <a href="../../index.php"><i class="fa fa-fw fa-globe"></i> Retour au Site</a>
                    </li>
                    <li >
                        <a href="../index.php"><i class="fa fa-fw fa-globe"></i> Retour à l'Espace Membre</a>
                    </li>
                    <?php 
                        if(isset($_SESSION['admin'])) 
                            echo "<li class='borderwhite' >
                                      <a href='index.php'><i class='fa fa-fw fa-dashboard'></i> Infos Générales</a>
                                  </li>"; 
                    ?>
                    <li class="borderwhite" >
                        <a><i class='fa fa-fw fa-user'></i>Gestion Membre et Admin</a>
                        <ul >
                            <?php 
                                if(isset($_SESSION['admin'])) 
                                    echo "<li>
                                          <a href='userlist.php'><i class='fa fa-long-arrow-right fa-inverse'></i> Liste des Membres</a>
                                      </li>"; 
                            ?>
                            <?php 
                                if(isset($_SESSION['admin'])) 
                                    echo "<li>
                                             <a href='adminlist.php'><i class='fa fa-long-arrow-right fa-inverse'></i> Liste des Admins</a>
                                          </li>"; 
                            ?>
                            <?php 
                                if(isset($_SESSION['admin']))
                                    echo "<li>
                                              <a href='ajoutmembre.php'><i class='fa fa-long-arrow-right fa-inverse'></i> Ajout Membre</a>
                                          </li>";
                            ?>
                            <?php 
                                if(isset($_SESSION['admin']))
                                    echo "<li>
                                              <a href='ajoutadmin.php'><i class='fa fa-long-arrow-right fa-inverse'></i> Ajout Admin</a>
                                          </li>";
                            ?>
                        </ul>
                    </li>
                    <li class="borderwhite" >
                        <a><i class='fa fa-fw fa-bars '></i>Gestion Tutos et Presse</a>
                        <ul >
                            <?php 
                                if(isset($_SESSION['admin']))
                                    echo "<li>
                                              <a href='commentlist.php'><i class='fa fa-long-arrow-right fa-inverse'></i> Liste des Coms</a>
                                          </li>";
                            ?>
                            <?php 
                                if(isset($_SESSION['admin']))
                                    echo "<li>
                                              <a href='tutolist.php'><i class='fa fa-long-arrow-right fa-inverse'></i> Liste des Tutos</a>
                                          </li>";
                            ?>
                            <?php 
                                if(isset($_SESSION['admin']))
                                    echo "<li>
                                              <a href='press.php'><i class='fa fa-long-arrow-right fa-inverse'></i> Liste des Articles</a>
                                          </li>";
                            ?>
                        </ul>
                    </li>
                    <li class="borderwhite" >
                        <a><i class='fa fa-fw fa-bars '></i>Gestion des Promos</a>
                        <ul >
                            <?php 
                                if(isset($_SESSION['admin']))
                                    echo "<li>
                                              <a href='promos.php'><i class='fa fa-long-arrow-right fa-inverse'></i> Liste des Promos</a>
                                          </li>";
                            ?>
                            <?php  
                                include ("../../../bdd/localhostpdo/_mysql.php");
                             
                                // On récupère tout le contenu de la table commentary
                                $reponse = $bdd->query("SELECT * FROM Promos ORDER BY ID ");
                                while ($donnees = $reponse->fetch()){
                            ?>
                                <li>
                                    <a href='editpromo.php?year=<?php echo $donnees["year"] ?>'><i class='fa fa-long-arrow-right fa-inverse'></i> <?php echo $donnees["year"] ?></a>
                                </li>
                          
                            <?php
                              }
                              $reponse->closeCursor();
                            ?> 
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>