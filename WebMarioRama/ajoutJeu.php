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
                    <section class='panel-heading'>
                        <h3 class='panel-title'>
                            Ajout d'un jeux
                        </h3>
                    </section>
                    <section class="panel-body">
                        <form action='' method='post'>
                            <label>Titre :</label>
                            <input type='text' name='titre' id='titre' placeholder='Mario' required/><br />
                            <label>Date de sortie :</label>
                            <input type='date' name='dateSortie' id='dateSortie' required/><br />
                            <label>Description :</label>
                            <textarea name='description' id='description' rows="3" cols='20' required></textarea><br />
                            <label>Type :</label>
                            <select>
                                <option value='arcade'>Arcade</option>
                                <option value='Puzzle'>Puzzle</option>
                            </select><br />
                            <label>Plate-formes</label>
                            <select>
                                <option value='Nes'>Nes</option>
                                <option value='WII'>WII</option>
                            </select><br />
                        </form>
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