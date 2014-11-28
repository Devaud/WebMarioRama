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

if($connect){
    header('location: ./index.php?page=home');
}

if(isset($_POST['submit'])){
    $pseudo = $_POST['pseudo'];
    $mdp = sha1($_POST['password']);
    
    $pseudo = strip_tags(trim($pseudo));
    
    if(connectUser($pseudo, $mdp)){
        $user = $pseudo;
        $connect = true;
        header('location: ./index.php?page=home');
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
            <section class="col-sm-12 marg">
                <article class="panel panel-default">
                    <section class="panel-heading">
                        <h3 class="panel-title">
                            Login
                        </h3>
                    </section>
                    <section class="panel-body">
                        <section class="col-sm-4 col-sm-offset-4">
                            <article>
                                <form action="./Login.php?page=login" method="post" class="form-horizontal" role="form">
                                    <section class="form-group col-sm-offset-5">
                                        <label for="pseudo">Pseudo :</label>
                                        <input type="text" id="pseudo" name="pseudo" class="form-control" placeholder="Pseudo" class="form-control" required autofocus/>
                                    </section>
                                    <section class="form-group">
                                        <label for="password">Password :</label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" class="form-control" required autofocus/>
                                    </section>
                                    <input type="submit" id="submit" class="btn btn-default" name="submit" value="Login" />
                                </form>
                            </article>
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