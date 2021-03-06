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
        <link rel="stylesheet" href="./css/Normalize.css" />
        <link rel="shortcut icon" type="image/png-icon" href="./Media/MarioHTML5.png" />
        <!-- Fichier pour bootstrap -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/music.js" ></script>

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
                    <section class="panel-body">
                        <h1 align='center'>
                            Introduction

                        </h1>
                        <p>
                            Bienvenu Chers joueuses, Chers joueurs et fans de la série de jeux Mario !
                            Ce site répertorie tous les jeux dans le quel Mario apparait ainsi que les consoles sur lesquelles ces jeux sont disponibles.
                        </p>
                        <h3>
                            Evolution des jeux Mario :
                        </h3>
                        <p align='center'>
                            <img src='./Media/evolution-mario.jpg' src='evolution jeux mario' width='100%'/>
                        </p>

                        <h3>
                            Vidéo de l'évolution des consoles de nintendo :
                        </h3>
                        <video width="100%" controls preload="metadata" poster="./Media/Poster.jpg">
                            <source src="./Media/EvolutionConsoles.mp4" type="video/mp4" />
                        </video>
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