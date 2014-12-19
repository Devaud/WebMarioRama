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

if (!$connect) {
    header('location: ./index.php?page=home');
}

$erreur = '';
$erreurConsoleDate = false;
$erreurExist = false;

if (isset($_POST['submit'])) {
    // Initialisation des variable
    $nomConsole = (!empty($_POST['nomConsole'])) ? $_POST['nomConsole'] : NULL;
    $date = (!empty($_POST['dateSortie'])) ? $_POST['dateSortie'] : NULL;

    // Vérifie si les informations ne sont pas vide et initialise les variables
    $processeur = (!empty($_POST['processeur'])) ? $_POST['processeur'] : NULL;
    $memoire = (!empty($_POST['memoire'])) ? $_POST['memoire'] : NULL;
    $formaJeu = (!empty($_POST['formatJeu'])) ? $_POST['formatJeu'] : NULL;

    // Test l'existance de la date et la met au bon format
    if ($date != NULL) {

        $dn = DateTime::createFromFormat("Y-m-d", $date);
        if ($dn) {
            $date = $dn->format("Y-m-d");
        } else {
            $erreur = "La date n'est pas au bon format (AAAA-MM-JJ) ou n'est pas entrée<br />";
        }
    }

    if ($nomConsole != NULL && $date != NULL) {
        if (!existConsole($nomConsole)) {
            // Traitement de l'image uploader
            if (!empty($_FILES['file']['name'])) {
                // Information de l'image
                $chemin_tmp = $_FILES['file']['tmp_name'];
                $pathinfo = pathinfo($_FILES['file']['name']);
                $extension = $pathinfo['extension'];

                //Test si le dossier du jeux exist pas. S'il n'exist pas le dossier est créé.
                $dossier = './Media/' . str_replace(' ', '', $nomConsole);
                if (!file_exists($dossier)) {
                    mkdir($dossier);
                }

                // Initialisation du chemin avec le nom de l'image et son extension
                $cheminImage = $dossier . '/' . str_replace(' ', '', $nomConsole) . '_CONSOLE.' . $extension;
                move_uploaded_file($chemin_tmp, $cheminImage); // Upload l'image
                $img = $cheminImage;
            }

            $id = addConsole($nomConsole, $date, $img, $processeur, $memoire, $formatJeu);

            // Redirige sur la page de la console
            header('location: ./ficheConsole.php?page=ficheConsole&console=' . $id);
        } else {
            $erreurExist = true;
        }
    } else {
        $erreurConsoleDate = true;
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/Normalize.css" />
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
                        if ($erreurConsoleDate) {
                            echo displayError(' Le nom ou la date sont manquante !');
                        }

                        if ($erreurExist) {
                            echo displayError(' Cette console existe déjà');
                        }
                        ?>
                        <section class='col-sm-5 col-sm-offset-4'>
                            <form action='./ajoutConsole.php?page=ajoutConsole' method='post' role='form' class="form-horizontal" enctype="multipart/form-data">
                                <section class='form-group'>
                                    <label>Nom console :</label>
                                    <input type='text' class='form-control' name='nomConsole' id='nomConsole' placeholder='WII U' required/>
                                    <label>Date de sortie :</label>
                                    <input type='date' class='form-control' name='dateSortie' id='dateSortie' required/>
                                    <label>Processeur :</label>
                                    <input type='text' class='form-control' name='processeur' id='processeur' />
                                    <label>Mémoire :</label>
                                    <input type='text' class='form-control' name='memoire' id='memoire' />
                                    <label>Format des jeux : </label>
                                    <input type='text' class='form-control' name='formatJeu' id='formatJeu' />
                                    <label  for="picture">Pochette du jeu :</label>
                                    <input type="file" name="file" id="picture" required/>
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