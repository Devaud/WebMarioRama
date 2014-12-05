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

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $jeu = getGame($id);

    $idJeu = $jeu['idJeu'];
    $type = getTypeById($jeu['idJeu']);
    $pochette = $jeu['ImgJeu'];
    $nomJeux = $jeu['NomJeu'];
    $descr = $jeu['Descriptif'];
    $date = $jeu['DateJeu'];
    $video = $jeu['Video'];
    $videoNULL = false;

    if ($video == '') {
        $videoNULL = true;
        $video = 'pas de video disponible';
    }
}

if (isset($_POST['submit'])) {
    $console = $_POST['console'];
    
    $idConsole = getId($console); // Récupère l'id de la console
    jeuConsole($id, $idConsole['idConsole']); // Associe le jeu à la console
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
                            echo $nomJeux;
                            ?>
                        </h3>
                    </section>
                    <section class="panel-body">
                        <!-- ------------------ Pochette ------------------- -->
                        <section class="col-sm-4">
                            <img src="<?php echo $pochette; ?>" alt="<?php echo $nomJeux . ' pochette' ?>" class="img-responsive img-rounded"/>
                        </section>
                        <!-- ---------------- Fin Pochette ----------------- -->

                        <!-- ----------------- information ----------------- -->
                        <section class="col-sm-8">
                            <article class="panel panel-default">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        Date de sortie : <?php echo $date; ?>
                                    </li>
                                    <li class="list-group-item">
                                        Type : <?php echo $type['NomType']; ?>
                                    </li>
                                    <li class="list-group-item">
                                        Descriptif : <br /> <?php echo $descr; ?>
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

                                    <?php
                                    if ($videoNULL) {
                                        echo $video;
                                    } else {
                                        echo displayVideo($video);
                                    }
                                    ?>

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
                                    <?php echo displayPlateformes($idJeu); ?>
                                    <section class='list-group-item'>
                                        <form method='POST' action='./ficheJeux.php?page=figheJeu&id=<?php echo $id; ?>' class='form-horizontal'>
                                            <section class='form-group col-sm-offset-12'>
                                                <section class='col-sm-7'>
                                                    <select class="form-control" name="console">
                                                        <?php
                                                        echo displayOptionConsole();
                                                        ?>
                                                    </select>
                                                </section>
                                                <section class='col-sm-3'>
                                                    <input type="submit" id="submit" class="btn btn-default" name="submit" value="Ajouter" />
                                                </section>

                                            </section>
                                        </form>
                                    </section>
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