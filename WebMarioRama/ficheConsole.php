<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include './Include.php';
LoadFromSession();
ManageNavigation();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/Normalize.css"
              <!-- Fichier pour bootstrap -->
              <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>

        <!-- Fichier créer par nous -->
        <link rel="stylesheet" href="./css/style.css">

        <title>WebMarioRama</title>
    </head>
    <body>
        <section id="page" class="col-sm-offset-1 col-sm-10">
            <!-- --------------------------- Menu -------------------------- -->
            <?php
            echo displayNav();
            ?>
            <!-- ------------------------- Fin Menu ------------------------ -->

            <!-- -------------------------- Contenu ------------------------ -->
            <section class="col-sm-12 marg">
                <article class="panel panel-default">
                    <section class="panel-heading">
                        <h3 class="panel-title">
                            Nom de la console
                        </h3>
                    </section>
                    <section class="panel-body">
                        <!-- ------------------ ImageConsole ------------------- -->
                        <section class="col-sm-4">
                            <article class="panel panel-default">
                                <section class="panel-body">
                                    <img src="./Img/N64.png" alt="Nintendo 64"/>
                                </section>
                                <div class="row">
                                    <div class="col-xs-4 col-md-3">
                                        <a href="#" class="thumbnail">
                                            <img src="./Img/N64.png" alt="test">
                                        </a>                                    
                                    </div>
                                    <div class="col-xs-4 col-md-3">
                                        <a href="#" class="thumbnail">
                                            <img src="./Img/N64.png" alt="test">
                                        </a>
                                        
                                    </div>
                                    <div class="col-xs-4 col-md-3">
                                        <a href="#" class="thumbnail">
                                            <img src="./Img/N64.png" alt="test">
                                        </a>
                                        
                                    </div>
                                </div></article>

                        </section>
                        <!-- ---------------- Fin Pochette ----------------- -->

                        <!-- ----------------- Caractéristiques ----------------- -->
                        <section class="col-sm-4">
                            <article class="panel panel-default">
                                <section class="panel-heading">
                                    <h4 class="panel-title">
                                        Caractéristiques
                                    </h4>
                                </section>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        Date de sortie : .....
                                    </li>
                                    <li class="list-group-item">
                                        Processeur : .....
                                    </li>
                                    <li class="list-group-item">
                                        Mémoire : ....
                                    </li>
                                    <li class="list-group-item">
                                        Format jeux : ....
                                    </li>
                                </ul>
                            </article>
                        </section>
                        <!-- -------------- Fin caractéristiques ---------------- -->

                        <!-- ----------------- Jeux supportés ----------------- -->
                        <section class="col-sm-4">
                            <article class="panel panel-default">
                                <section class="panel-heading">
                                    <h4 class="panel-title">
                                        Jeux supportés
                                    </h4>
                                </section>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                       Mario1

                                    </li>
                                    <li class="list-group-item">
                                        Mario2
                                    </li>
                                    <li class="list-group-item">
                                        Mario3
                                    </li>
                                    <li class="list-group-item">
                                        Mario4
                                    </li>
                                </ul>
                            </article>
                        </section>
                        <!-- -------------- Fin caractéristiques ---------------- -->                      
                    </section>
                </article>
            </section>
            <!-- ----------------------- Fin Contenu ----------------------- -->

            <!-- ----------------------- Pied de page ---------------------- -->
            <?php
            echo displayFooter();
            ?>
            <!-- --------------------- Fin Pied de page -------------------- -->
        </section>
    </body>
</html>
<?php
SaveInSession();
?>