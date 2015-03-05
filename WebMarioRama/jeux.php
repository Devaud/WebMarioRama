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
        <link rel="stylesheet" href="./css/bootstrap-theme.min.css" />
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
            <section class="col-sm-12">
                <section class="panel panel-default">
                    <section class="panel-heading">
                        <h3 class="panel-title">Liste des jeux par tranche de 10 ans</h3>
                    </section>
                    <section class="panel-group panel panel-default" id="accordion" role="tablist" aria-multiselectable="true">

                        <!-- ----------------- 1981 - 1991 ------------------ -->
                        <section class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    1981 - 1991
                                </a>
                            </h4>
                        </section>
                        <section id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <section class="list-group">
                                <?php echo displayListeJeux('1981', '1991'); ?>
                            </section>
                        </section>
                        <!-- --------------------- Fin ---------------------- -->

                        <!-- ------------------ 1992 - 2002 ----------------- -->
                        <section class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    1992 - 2002
                                </a>
                            </h4>
                        </section>
                        <section id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <ul class="list-group">
                                <?php echo displayListeJeux('1992', '2002'); ?>
                            </ul>
                        </section>
                        <!-- --------------------- Fin --------------------- -->

                        <!-- ----------------- 2003 - 2013 ----------------- -->
                        <section class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    2003 - 2013
                                </a>
                            </h4>
                        </section>
                        <section id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <ul class="list-group">
                                <?php echo displayListeJeux('2003', '2013'); ?>
                            </ul>
                        </section>
                        <!-- --------------------- Fin --------------------- -->

                        <!-- ----------------  2014 - XXXX ----------------- -->
                        <section class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    2014 - Aujourd'hui
                                </a>
                            </h4>
                        </section>
                        <section id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <ul class="list-group">
                                <?php echo displayListeJeux('2014', '2015'); ?>
                            </ul>
                        </section>
                        <!-- --------------------- Fin --------------------- -->
                    </section>
                </section>
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