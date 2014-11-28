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

$console = '';
$erreur = '';

if (isset($_POST['submit'])) {
    $titre = strip_tags(trim($_POST['titre']));
    $date = $_POST['dateSortie'];
    $console = $_POST['console'];
    $video = NULL;
    $img = NULL;

    if (empty($date)) {
        $date = NULL;
    } else {
        $dn = DateTime::createFromFormat("Y-m-d", $date);
        if ($dn) {
            $date = $dn->format("Y-m-d");
        } else {
            $erreur = "La date n'est pas au bon format (AAAA-MM-JJ) ou n'est pas entrée<br />";
        }
    }

    if (!empty($_POST['description'])) {
        $desc = strip_tags(trim($_POST['description']));
    } else {
        $desc = NULL;
    }

    if (!empty($_POST['type'])) {
        $type = $_POST['type'];
    } else {
        $type = NULL;
    }
    
    $id = addGame($titre, $date, $desc, $video, $img);
    $idConsole = getId($console);
    jeuConsole($id, $idConsole['idConsole']);
    
    if($type != NULL){
        $idType = getIdType($type);
        jeuType($id, $idType['idType']);
    }
    
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
            <section class="col-sm-12">
                <article class="panel panel-default">
                    <section class='panel-heading'>
                        <h3 class='panel-title'>
                            Ajout d'un jeux
                        </h3>
                    </section>
                    <section class="panel-body">

                        <section class='col-sm-5 col-sm-offset-4'>
                            <form action='./ajoutJeu.php' method='post' role='form' class="form-horizontal">
                                <section class='form-group'>
                                    <label>Titre :</label>
                                    <input type='text' class='form-control' name='titre' id='titre' placeholder='Mario' required/>
                                    <label>Date de sortie :</label>
                                    <input type='date' class='form-control' name='dateSortie' id='dateSortie' required/>
                                    <label>Description :</label>
                                    <textarea name='description' id='description' class="form-control" rows="3"></textarea>
                                    <label>Type :</label>
                                    <select class="form-control" name="type">
                                        <?php
                                        echo displayOptionType();
                                        ?>
                                    </select>
                                    <label>Plate-formes <?php echo $console; ?></label>
                                    <select class="form-control" name="console">
                                        <?php
                                        echo displayOptionConsole();
                                        ?>
                                    </select>
                                    <input type="submit" name="submit" value="Valider" class="btn btn-default"/>
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