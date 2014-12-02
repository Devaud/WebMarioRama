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

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $jeu = getGame($id);
}
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
                            <?php
                            echo $jeu['NomJeu'];
                            ?>
                        </h3>
                    </section>
                    <section class="panel-body">
                        <!-- ------------------ Pochette ------------------- -->
                        <section class="col-sm-4">
                            <article class="panel panel-default">
                                <section class="panel-body">
                                    <img src="Media/SMB_POCHETTE.jpg" alt="super mario bross pochette" />
                                </section>
                            </article>
                        </section>
                        <!-- ---------------- Fin Pochette ----------------- -->

                        <!-- ----------------- information ----------------- -->
                        <section class="col-sm-8">
                            <article class="panel panel-default">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        Date de sortie : <?php echo $jeu['dateJeu']; ?>
                                    </li>
                                    <li class="list-group-item">
                                        Type : ....
                                    </li>
                                    <li class="list-group-item">
                                        Descriptif : ....
                                    </li>
                                </ul>
                            </article>
                        </section>
                        <!-- -------------- Fin information ---------------- -->

                        <!-- ------------------- Video --------------------- -->
                        <section class="col-sm-4">
                            <article class="panel panel-default">
                                <section class="panel-heading">
                                    Video
                                </section>
                                <section class="panel-body">
                                    <video width="100%" controls preload="metadata" poster="./video/SMB/SMB_POSTER.jpg">
                                        <source src="./video/SMB/SMBGV.mp4" type="video/mp4" />
                                    </video>
                                </section>
                            </article>
                        </section>
                        <!-- ----------------- Fin Video ------------------- -->

                        <!-- ----------------- Plate-formes ---------------- -->
                        <section class="col-sm-4">
                            <article class="panel panel-default">
                                <section class="panel-heading">
                                    <h3 class="panel-title">
                                        Plate-formes  
                                    </h3>
                                </section>
                                <section class="list-group">
                                    <a href="#" class="list-group-item">Nes</a>
                                </section>
                            </article>
                        </section>
                        <!-- --------------- Fin Plate-formes -------------- -->
                        
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