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

// Test si l'utilisateur est connecté
if (!$connect) {
    header('location: ./index.php?page=home');
}

// Initialise les variables d'erreur
$console = '';
$erreur = '';
$existJeu = false;

// Test s'il y a un envoie
if (isset($_POST['submit'])) {
    // Initialisation des variable
    $titre = strip_tags(trim($_POST['titre']));
    $date = $_POST['dateSortie'];
    $console = $_POST['console'];
    $video = NULL;
    $img = NULL;
    $type = NULL;
    $desc = NULL;

    // Test l'existance de la date et la met au bon format
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

    // Récupère la description si existante
    if (!empty($_POST['description'])) {
        $desc = strip_tags(trim($_POST['description']));
    } else {
        $desc = NULL;
    }

    // Récupère le type de jeu
    if (!empty($_POST['type'])) {
        $type = $_POST['type'];
    } else {
        $type = NULL;
    }
    if (!existJeu($titre)) {
        // Traitement de l'image uploader
        if (!empty($_FILES['file']['name'])) {
            // Information de l'image
            $chemin_tmp = $_FILES['file']['tmp_name'];
            $pathinfo = pathinfo($_FILES['file']['name']);
            $extension = $pathinfo['extension'];

            //Test si le dossier du jeux exist pas. S'il n'exist pas le dossier est créé.
            $dossier = './Media/' . str_replace(' ', '', $titre);
            if (!file_exists($dossier)) {
                mkdir($dossier);
            }

            // Initialisation du chemin avec le nom de l'image et son extension
            $cheminImage = $dossier . '/' . str_replace(' ', '', $titre) . '_POCHETTE.' . $extension;
            move_uploaded_file($chemin_tmp, $cheminImage); // Upload l'image
            $img = $cheminImage;
        }

        // Traitement de la vidéo uploader
        if (!empty($_FILES['video']['name'])) {
            // Information de la video
            $chemin_tmp_video = $_FILES['video']['tmp_name'];
            $pathinfo = pathinfo($_FILES['video']['name']);
            $extension = $pathinfo['extension'];

            //Test si le dossier du jeux exist pas. S'il n'exist pas le dossier est créé.
            $dossier = './Media/' . str_replace(' ', '', $titre);
            if (!file_exists($dossier)) {
                mkdir($dossier);
            }

            // Initialisation du chemin avec le nom de la vidéo et son extension
            $cheminVideo = $dossier . '/' . str_replace(' ', '', $titre) . '_VIDEO.' . $extension;
            move_uploaded_file($chemin_tmp_video, $cheminVideo); // Upload l'image
            $video = $cheminVideo;
        }

        // Traitement avec la base de données
        $id = addGame($titre, $date, $desc, $video, $img); // Ajout des informations concernant le jeu
        $idConsole = getId($console); // Récupère l'id de la console
        jeuConsole($id, $idConsole['idConsole']); // Associe le jeu à la console

        if ($type != NULL) {
            $idType = getIdType($type); // Récupère l'id du type du jeu
            jeuType($id, $idType['idType']); // Associe le jeu avec le type
        }

        // Redirige sur la page du jeu
        header('location: ./ficheJeux.php?page=ficheJeu&id=' . $id);
    }else{
        $existJeu = true;
    }
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
            <section class="col-sm-12">
                <article class="panel panel-default">
                    <section class='panel-heading'>
                        <h3 class='panel-title'>
                            Ajout d'un jeux
                        </h3>
                    </section>
                    <section class="panel-body">

                        <?php
                        if($existJeu){
                            echo displayError(' Le jeu existe déjà');
                        }
                        ?>
                        <section class='col-sm-5 col-sm-offset-4'>
                            <form action='./ajoutJeu.php' method='post' role='form' class="form-horizontal" enctype="multipart/form-data">
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
                                    <label  for="picture">Pochette du jeu :</label>
                                    <input type="file" name="file" id="picture" required/>

                                    <label  for="video">Video (Trailer) :</label>
                                    <input type="file" name="video" id="video" />

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