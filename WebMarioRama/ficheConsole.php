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

// Récupère la console
if (isset($_GET['console'])) {
    $idConsole = $_GET['console'];
    $console = getConsole($idConsole);
}
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
                    <section class="panel-heading">
                        <h3 class="panel-title">
                            <?php echo $console['NomConsole']; ?>
                        </h3>
                    </section>
                    <section class="panel-body">
                        <!-- ------------------ ImageConsole ------------------- -->
                        <section class="col-sm-4">
                            <img src="<?php echo $console['ImgConsole']; ?>" alt="<?php echo 'Image de la console ' . $console['NomConsole']; ?>" class="img-responsive img-rounded"/>
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
                                        Date de sortie : <?php echo ($console['DateConsole'] != NULL) ? $console['DateConsole'] : 'N/A'; ?>
                                    </li>
                                    <li class="list-group-item">
                                        Processeur : <?php echo ($console['Processeur'] != NULL) ? $console['Processeur'] : 'N/A'; ?>
                                    </li>
                                    <li class="list-group-item">
                                        Mémoire : <?php echo ($console['Memoire'] != NULL) ? $console['Memoire'] : 'N/A'; ?>
                                    </li>
                                    <li class="list-group-item">
                                        Format jeux : <?php echo ($console['FormatJeux'] != NULL) ? $console['FormatJeux'] : 'N/A'; ?>
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
                                <section class="list-group">
                                    <?php echo displayJeux($idConsole); ?>
                                </section>
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