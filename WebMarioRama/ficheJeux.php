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
        <div id="page">
            <!-- --------------------------- Menu -------------------------- -->
            <?php 
            echo displayNav();
            ?>
            <!-- ------------------------- Fin Menu ------------------------ -->

            <!-- -------------------------- Contenu ------------------------ -->
            <section class="container-fluid">
                <section class="col-sm-12">
                    <section class="panel panel-default">
                        <p>bdsmkélvmdslékymvsadvasdvasv
                            sav
                            sa
                            vsavsa</p>
                        <p>vsav
                            sadv
                            as</p>
                        <p> vsa
                            vvs
                            csacsa</p>
                    </section>
                </section>
            </section>
            <!-- ----------------------- Fin Contenu ----------------------- -->

            <!-- ----------------------- Pied de page ---------------------- -->
            <?php 
            echo displayFooter();
            ?>
            <!-- --------------------- Fin Pied de page -------------------- -->
        </div>
    </body>
</html>
<?php
SaveInSession();
?>