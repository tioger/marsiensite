<div class="languagediv">
                                        <h4>Tutos Html+Css</h4>
                                        <?php  
                                           include ("_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE language = "Html+Css"');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <p><?php echo $donnees['name']; ?></p>
                                        <p><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                        <a href="tuto/tutotemplate.php?tuto=<?php echo $donnees['filename']; ?>">Voir le Tuto.</a>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                    </div>
                                    <div class="languagediv">
                                        <h4>Tutos Javascript</h4>
                                        <?php  
                                           include ("_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE language = "Javascript"');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <a href="tuto/<?php echo $donnees['filename']; ?>"><?php echo $donnees['name']; ?></a>
                                        <p><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                    </div>
                                    <div class="languagediv">
                                        <h4>Tutos Jquery</h4>
                                        <?php  
                                           include ("_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE language = "Jquery"');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                    
                                        <a href="tuto/<?php echo $donnees['filename']; ?>"><?php echo $donnees['name']; ?></a>
                                        <p><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                    </div>
                                    <div class="languagediv">
                                        <h4>Tutos PHP</h4>
                                        <?php  
                                           include ("_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE language = "PHP"');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <a href="tuto/<?php echo $donnees['filename']; ?>"><?php echo $donnees['name']; ?></a>
                                        <p><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                    </div>
                                    <div class="languagediv">
                                        <h4>Tutos Python</h4>
                                        <?php  
                                           include ("_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE language = "Python"');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <a href="tuto/<?php echo $donnees['filename']; ?>"><?php echo $donnees['name']; ?></a>
                                        <p><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                    </div>
                                    <div class="languagediv">
                                        <h4>Tutos Ruby</h4>
                                        <?php  
                                           include ("_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE language = "Ruby"');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <a href="tuto/<?php echo $donnees['filename']; ?>"><?php echo $donnees['name']; ?></a>
                                        <p><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                    </div>
                                    <div class="languagediv">
                                        <h4>Tutos Rails</h4>
                                        <?php  
                                           include ("_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE language = "Ruby on Rails"');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <a href="tuto/<?php echo $donnees['filename']; ?>"><?php echo $donnees['name']; ?></a>
                                        <p><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                    </div>
                                    <div class="languagediv">
                                        <h4>Tutos C</h4>
                                        <?php  
                                           include ("_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE language = "C"');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <a href="tuto/<?php echo $donnees['filename']; ?>"><?php echo $donnees['name']; ?></a>
                                        <p><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                    </div>
                                    <div class="languagediv">
                                        <h4>Tutos C++</h4>
                                        <?php  
                                           include ("_mysql.php"); 
                                            // On récupère tout le contenu de la table Tuto
                                            $reponse = $bdd->query('SELECT * FROM Tutos WHERE language = "C++"');

                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch())
                                            {
                                        ?>
                                        <a href="tuto/<?php echo $donnees['filename']; ?>"><?php echo $donnees['name']; ?></a>
                                        <p><?php echo utf8_decode($donnees['shortdescrib']); ?></p>
                                        <?php

                                        }

                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>
                                    </div>