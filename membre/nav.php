
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Marsien Dashboard</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="capitalize" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo htmlentities(trim($_SESSION['login'])); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu" id="dmwidth">
                        <?php if(isset($_SESSION['admin'])) echo "<li><a href='admin/index.php'><i class='fa fa-fw fa-user'></i> Espace Admin</a></li><li class='divider'></li>"; ?>
                        <?php echo "<li><a href='profil.php?profil=";echo htmlentities(trim($_SESSION['login']));echo "'><i class='fa fa-fw fa-user'></i> Mon Profil</a></li><li class='divider'></li>"; ?>
                        <li>
                            <a href="editprofil.php"><i class="fa fa-fw fa-user "></i> Modifier Mon Profil</a>
                        </li>
                        <li class='divider'>
                        </li>
                        <li>
                            <a href="mytuto.php"><i class="fa fa-fw fa-file-code-o "></i> Mes Tutos</a>
                        </li>
                        <li class='divider'>
                        </li>
                        <li>
                            <a href="deconnexion.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li >
                        <a href="../index.php"><i class="fa fa-fw fa-globe"></i> Retour au Site</a>
                    </li>
                    <li >
                        <a href="index.php"><i class="fa fa-fw fa-table"></i> Calendrier</a>
                    </li>
                    <li>
                        <a href="<?php echo htmlentities(trim($_SESSION['login'])); ?>/" target="_blank"><i class="fa fa-fw fa-desktop"></i> Ma Page</a>
                    </li>
                    <li >
                        <a href="tuto.php"><i class="fa fa-fw fa-file-code-o "></i> Tutoriels</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>