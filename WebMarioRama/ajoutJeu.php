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
            <section class="col-sm-12">
                <article class="panel panel-default">
                    <section class='panel-heading'>
                        <h3 class='panel-title'>
                            Ajout d'un jeux
                        </h3>
                    </section>
                    <section class="panel-body">

                        <section class='col-sm-5 col-sm-offset-4'>
                            <form action='' method='post' role='form' class="form-horizontal">
                                <section class='form-group'>
                                    <label>Titre :</label>
                                    <input type='text' class='form-control' name='titre' id='titre' placeholder='Mario' required/>
                                    <label>Date de sortie :</label>
                                    <input type='date' class='form-control' name='dateSortie' id='dateSortie' required/>
                                    <label>Description :</label>
                                    <textarea name='description' id='description' class="form-control" rows="3" required></textarea>
                                    <label>Type :</label>
                                    <select class="form-control">
                                        <option value='arcade'>Arcade</option>
                                        <option value='Puzzle'>Puzzle</option>
                                    </select>
                                    <label>Plate-formes</label>
                                    <select class="form-control">
                                        <option value='Nes'>Nes</option>
                                        <option value='WII'>WII</option>
                                    </select>
                                </section>
                            </form>
                        </section>


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