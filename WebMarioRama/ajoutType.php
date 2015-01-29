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

$typeExist = false;
$typeError = false;
$ajoutOk = false;

if (isset($_POST['submit'])) {
    $type = strip_tags(trim($_POST['type']));

    if (!empty($type)) {
        if (!existType($type)) {
            ajoutType($type);
            $ajoutOk = true;
        } else {
            $typeExist = true;
        }
    } else {
        $typeError = true;
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
            <section class="col-sm-9 marg col-sm-offset-1">
                <article class="panel panel-default">
                    <?php
                    if ($typeExist) {
                        echo displayError(' Le type existe déjà');
                    }

                    if ($typeError) {
                        echo displayError(' Le type ne peut pas être vide');
                    }

                    if ($ajoutOk) {
                        echo displaySuccess(' Type ajouté avec succes');
                    }
                    ?>
                    <table  class="table">
                        <tr>
                            <th>#</th><th>Nom type</th>
                        </tr>
                        <?php
                        echo liste('types', array('id' => 'idTye', 'nom' => 'NomType'));
                        ?>
                    </table>

                    <section class="panel-footer">
                        <form class="form-horizontal" method="POST" action="./ajoutType.php?page=ajoutType">
                            <section class="form-group">
                                <label for="type" class="col-sm-2 control-label">Nom du type*</label>
                                <section class="col-sm-10">
                                    <input type="text" class="form-control" id="type" placeholder="Course" name="type"/>
                                </section>
                            </section>

                            <section class="form-group">
                                <section class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="submit" class="btn btn-default">Valider</button>
                                </section>
                            </section>
                            <p>Les champs avec * sont obligatoires</p>
                        </form>
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