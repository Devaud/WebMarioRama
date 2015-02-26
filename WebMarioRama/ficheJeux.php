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

// Récupère l'id du jeu
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $jeu = getGame($id); // Cherche le jeu
    // Récupère les infos
    $idJeu = $jeu['idJeu'];
    $type = getTypeById($jeu['idJeu']);
    $pochette = $jeu['ImgJeu'];
    $nomJeux = $jeu['NomJeu'];
    $descr = $jeu['Descriptif'];
    $date = $jeu['DateJeu'];
    $video = $jeu['Video'];
    $videoNULL = false;

    // Test s'il y a une vidéo
    if ($video == '') {
        $videoNULL = true;
        $video = 'pas de video disponible';
    }
}

// Test si c'est un ajout
if (isset($_POST['ajoutAsso'])) {
    $console = $_POST['console'];

    $idConsole = getId($console); // Récupère l'id de la console
    jeuConsole($id, $idConsole['idConsole']); // Associe le jeu à la console
}

$erreurCommentaire = false;
$success = false;

// Test si un commentaire est ajouté
if (isset($_POST['commenter'])) {
    $pseudo = trim(strip_tags($_POST['pseudo']));
    $commentaire = trim(strip_tags($_POST['commentaire']));

    if (!empty($pseudo) && !empty($commentaire)) {
        $date = date('d-m-y');
        addCommentaire($idJeu, $commentaire, $pseudo, $date);
        $success = true;
    } else {
        $erreurCommentaire = true;
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/Normalize.css" />
        <link rel="shortcut icon" type="image/png-icon" href="./res/favicon.png" />
        <!-- Fichier pour bootstrap -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/jscript.js" ></script>
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
                                    echo ($videoNULL) ? $video : displayVideo($video);
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
                                    <?php
                                    if ($connect) {
                                        echo displayAjout($idJeu);
                                    }
                                    ?>
                                </section>
                            </article>
                        </section>
                        <!-- --------------- Fin Plate-formes -------------- -->

                    </section>
                </article>
            </section>
            <!-- ----------------------- Fin Contenu ----------------------- -->

            <!-- ----------------------- Commentaire ----------------------- -->
            <section class="col-sm-8">
                <article class="panel panel-default">
                    <section class="panel-heading">
                        <h3 class="panel-title">
                            Commentaire
                        </h3>
                    </section>
                    <?php
                        if($success){
                            echo displaySuccess(' Commentaire ajouté avec succes');
                        }
                    ?>

                    <section class="panel-body">
                        <?php
                        echo displayCommentaire($idJeu);
                        ?>
                    </section>
                </article>
            </section>


            <section class="col-sm-4">
                <article class="panel panel-default">
                    <section class="panel-body">
                        <?php
                        if ($erreurCommentaire) {
                            echo displayError(' Le nom et/ou le commentaire ne peut pas être vide');
                        }
                        ?>
                        <fieldset>
                            <legend>
                                Ajouter un commentaire
                            </legend>
                            <form id="formCommentaire" method="post" action="./ficheJeux.php?page=figheJeu&id=<?php echo $idJeu ?>">
                                <section class="form-group" id="pseudoGroup">
                                    <label class="control-label" for="pseudo">Pseudo</label>
                                    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre pseudo" />

                                    <span class="glyphicon glyphicon-remove form-control-feedback cacher" aria-hidden="true"></span>
                                    <span id="inputError2Status cacher" class="sr-only">(error)</span>
                                </section>
                                <section class="form-group" id="commentaireGroup">
                                    <label for="commentaire">Commentaire</label>
                                    <textarea class="form-control" rows="3" name="commentaire" id="commentaire" placeholder="Votre commentaire"></textarea>

                                    <span class="glyphicon glyphicon-remove form-control-feedback cacher" aria-hidden="true"></span>
                                    <span id="inputError2Status cacher" class="sr-only">(error)</span>
                                </section>
                                <button type="submit" name="commenter" class="btn btn-default" id="envoyer">Commenter</button>
                            </form>
                        </fieldset>
                    </section>
                </article>
            </section>
            <!-- --------------------- Fin Commentaire --------------------- -->



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