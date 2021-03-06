<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

include './DB/usersdb.php';
include './DB/typesdb.php';
include './DB/consolesdb.php';
include './DB/jeuxdb.php';
include './DB/commentairesdb.php';


/* * **********************************************
 *  **          VARIABLES GLOBALES              ***
 *  ********************************************* */

$page = 'home';
$connect = false;
$user = '';

/* * ***********************************************
 *  **           GESTION DE LA SESSION           ***  
 *  ********************************************** */

/*
 * Charge les variables depuis la session
 */

function LoadFromSession() {
    global $page, $connect, $user;

    if (isset($_SESSION['page'])) {
        $page = $_SESSION['page'];
    }

    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }

    if (isset($_SESSION['connect'])) {
        $connect = $_SESSION['connect'];
    }
}

/*
 * Save les variables dans la session
 */

function SaveInSession() {
    global $page, $user, $connect;

    $_SESSION['page'] = $page;
    $_SESSION['user'] = $user;
    $_SESSION['connect'] = $connect;
}

/* * ***********************************************
 *  **          GESTION DE LA NAVIGATION         ***  
 *  ********************************************** */

/*
 * Lit la page de destination reçue
 */

function ManageNavigation() {
    global $page;

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
}

/* * ***********************************************
 *  **       AFFICHAGE DES BLOCS DE LA PAGE      ***  
 *  ********************************************** */

/**
 * Fonction pour afficher le pied de page
 * @return string Html du pied de page
 */
function displayFooter() {
    $text = '<footer class="col-sm-12">';
    $text .= '<section class="panel panel-footer">';
    $text .= '<p>CFPT-I Examen M152 2014-2015 Devaud Alan & Geinoz Mathieu</p>';
    $text .= '</section>';
    $text .= '</footer>';

    return $text;
}

/**
 * Fonction pour afficher le menu
 * @return string Html du menu
 */
function displayNav() {
    global $page, $connect;

    $text = '<nav class="navbar navbar-default">';
    $text .= '<section class="container-fluid">';
    $text .= '<section class="navbar-header">';
    $text .= '<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">';
    $text .= '<span class="sr-only">Toggle navigation</span>';
    $text .= '<span class="icon-bar"></span>';
    $text .= '<span class="icon-bar"></span>';
    $text .= '<span class="icon-bar"></span>';
    $text .= '</button>';
    $text .= '<a class="navbar-brand" href="./Index.php?page=home">WebMarioRama</a>';
    $text .= '</section>';
    $text .= '<section id="navbarCollapse" class="collapse navbar-collapse">';
    $text .= '<ul class="nav navbar-nav">';
    if ($page == 'home') {
        $text .= '<li class="active"><a href="./Index.php?page=home">Home</a></li>';
    } else {
        $text .= '<li><a href="./index.php?page=home">Home</a></li>';
    }

    if (!$connect) {
        if ($page == 'jeux') {
            $text .= '<li class="active"><a href="./jeux.php?page=jeux">Jeux</a></li>';
        } else {
            $text .= '<li><a href="./jeux.php?page=jeux">Jeux</a></li>';
        }
    } else {
        $text .= '<li class="dropdown">';
        $text .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Jeux  <span class="caret"></span></a>';
        $text .= '<ul class="dropdown-menu" role="menu">';
        $text .= '<li><a href="./jeux.php?page=jeux">Liste jeux</a></li>';
        $text .= '<li><a href="./ajoutJeu.php?page=ajoutJeu">Ajouter un jeu</a></li>';
        $text .= '<li><a href="./ajoutType.php?page=ajoutType">Ajouter un type de jeu</a></li>';
        $text .= '</ul>';
        $text .= '</li>';
    }

    if (!$connect) {
        if ($page == 'consoles') {
            $text .= '<li class="active" ><a href="./Consoles.php?page=consoles">Consoles</a></li> ';
        } else {
            $text .= '<li><a href="./Consoles.php?page=consoles">Consoles</a></li> ';
        }
    } else {
        $text .= '<li class="dropdown">';
        $text .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Consoles  <span class="caret"></span></a>';
        $text .= '<ul class="dropdown-menu" role="menu">';
        $text .= '<li><a href="./Consoles.php?page=consoles">Liste consoles</a></li>';
        $text .= '<li><a href="./ajoutConsole.php?page=ajoutConsole">Ajouter une console</a></li>';
        $text .= '</ul>';
        $text .= '</li>';
    }



    $text .= '</ul>';

    $text .= '<ul class="nav navbar-nav navbar-right">';
    $text .= '<li><button onclick="mute()" class="btn btn-default "><span class="glyphicon glyphicon-volume-up" id="volume"></span></button><audio autoplay="autoplay" loop="loop" id="player"><source src="./Media/soundtrack.mp3" type="audio/mpeg" /><source src="./Media/soundtrack.ogg" type="audio/ogg" />Your browser does not support the audio element.</audio></li>';
    if ($connect) {
        $text .= '<li><a href="./logout.php"><span class="glyphicon glyphicon-log-out"></span> logout</a></li>';
    } else {
        if ($page == 'login') {
            $text .= '<li class="active"><a href="./login.php?page=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
        } else {
            $text .= '<li><a href="./login.php?page=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
        }
    }


    $text .= '</ul>';
    $text .= '</section>';
    $text .= '</section>';
    $text .= '</nav>';

    return $text;
}

/**
 * Affiche les option du type
 * @return string code html
 */
function displayOptionType() {
    $text = '';

    $arrayType = getAllType();

    foreach ($arrayType as $type) {
        $text .= '<option value="' . $type['NomType'] . '" name="' . $type['idType'] . '">' . $type['NomType'] . '</option>';
    }

    return $text;
}

/**
 * Affiche les options des consoles
 * @return string code html
 */
function displayOptionConsole() {
    $text = '';

    $arrayConsole = getAllConsole();

    foreach ($arrayConsole as $console) {
        $text .= '<option value="' . $console['NomConsole'] . '" name="' . $console['idConsole'] . '" >' . $console['NomConsole'] . '</option>';
    }

    return $text;
}

/**
 * Affiche les plates-formes qui sont relier a un jeu
 * @param string $id id du jeu
 * @return string code html
 */
function displayPlateformes($id) {
    $arrayPlateformes = getNameById($id);
    $text = '';

    for ($i = 0; count($arrayPlateformes) > $i; $i++) {
        $idConsole = getId($arrayPlateformes[$i]);
        $text .= '<a href = "./ficheConsole.php?page=ficheConsole&console=' . $idConsole['idConsole'] . '" class = "list-group-item">' . $arrayPlateformes[$i] . '</a>';
    }

    return $text;
}

/**
 * Affiche les jeux qui sont relier a une plate-forme
 * @param string $id id de la plate-forme
 * @return string code html
 */
function displayJeux($id) {
    $arrayJeux = getJeuxById($id);
    $text = '';

    if ($arrayJeux != NULL) {
        for ($i = 0; count($arrayJeux) > $i; $i++) {
            $idJeu = getIdJeu($arrayJeux[$i]);
            $text .= '<a href = "./ficheJeux.php?page=ficheJeux&id=' . $idJeu . '" class = "list-group-item">' . $arrayJeux[$i] . '</a>';
        }
    } else {
        $text = 'Il n\'y a pas de jeux associé';
    }


    return $text;
}

/**
 * Affiche une vidéo
 * @param string $link chemin de la video concernée
 * @param string $poster Poster de la vidée, poster par défaut existant
 * @return string
 */
function displayVideo($link, $poster = './Media/mario_poster_default.jpeg') {
    $text = '';
    $text .= '<video width="100%" controls preload="metadata" poster="' . $poster . '">
                                        <source src="' . $link . '" type="video/mp4" />
                                    </video>';

    return $text;
}

/**
 * Affiche une liste de jeu entre deux années
 * @param date $dateDebut année de début
 * @param date $dateFin année de fin
 * @return string code html
 */
function displayListeJeux($dateDebut, $dateFin) {
    $text = '';

    $arrayJeux = getAllGameBetweenTwoDate($dateDebut, $dateFin);

    foreach ($arrayJeux as $jeux) {
        $text .= '<a class="list-group-item" href="./ficheJeux.php?page=figheJeu&id=' . $jeux['idJeu'] . '" >' . $jeux['NomJeu'] . '</a>';
    }

    return $text;
}

/**
 * Affiche l'ajout d'une console pour une liaison entre une console et un jeu
 * @param string $id id du jeu
 * @return string code html
 */
function displayAjout($id) {

    $text = '';

    $text .='<section class=\'list-group-item\'>';
    $text .= '<form method=\'POST\' action=\'./ficheJeux.php?page=figheJeu&id=' . $id . '\' class=\'form-horizontal\'>';
    $text .= '<section class=\'form-group col-sm-offset-12\'>';
    $text .= '<section class=\'col-sm-7\'>';
    $text .= '<select class="form-control" name="console">';
    $text .= displayOptionConsole();
    $text .= '</select>';
    $text .= '</section>';
    $text .= '<section class=\'col-sm-3\'>';
    $text .= '<input type="submit" id="submit" class="btn btn-default" name="ajoutAsso" value="Ajouter" />';
    $text .= '</section>';
    $text .= '</section>';
    $text .= '</form>';
    $text .= '</section>';

    return $text;
}

/**
 * Affiche les consoles
 * @return string code html
 */
function displayConsoles() {

    $text = '';
    $array = getAllConsole();

    foreach ($array as $value) {
        $text .= '<section class="col-sm-4 col-md-3">';
        $text .= '<section class="thumbnail">';
        $text .= '<section class="caption">';
        $text .= '<h3>' . $value['NomConsole'] . '</h3>';
        $text .= '</section>';
        $text .= '<a href="./ficheConsole.php?page=ficheConsole&console=' . $value['idConsole'] . '">';
        $text .= '<img src="' . $value['ImgConsole'] . '" alt="' . $value['NomConsole'] . '" class="img-responsive img-rounded">';
        $text .= '</a>';
        $text .= '</section>';
        $text .= '</section>';
    }

    return $text;
}

/**
 * Affiche un message d'erreur
 * @param string $message le message d'erreur
 * @return string code html
 */
function displayError($message) {
    $text = '';

    $text .= '<section class="alert alert-danger" role="alert">';
    $text .= '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>';
    $text .= '<span class="sr-only">Error:</span>';
    $text .= $message;
    $text .= '</section>';

    return $text;
}

/**
 * Affiche un message de success
 * @param string $message message
 * @return string Le message avec html
 */
function displaySuccess($message) {
    $text = '';

    $text .= '<section class="alert alert-success" role="alert">';
    $text .= '<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>';
    $text .= '<span class="sr-only">Success:</span>';
    $text .= $message;
    $text .= '</section>';

    return $text;
}

/**
 * Affiche de la liste
 * @param string $table nom de la table
 * @return string code html de la liste
 */
function liste($table, $champ) {
    $array = getListe($table);
    $text = '';

    foreach ($array as $value) {
        $text .= '<tr>';
        $text .= '<td>' . $value[0] . '</td><td>' . $value[1] . '</td>';
        $text .= '</tr>';
    }

    return $text;
}

/**
 * Affiche les commentaires
 * @param integer $idJeu id du jeu concerner
 * @return string code html commentaire
 */
function displayCommentaire($idJeu) {
    $array = getCommentaire($idJeu);

    $text = '';


    if (!empty($array)) {
        foreach ($array as $comms) {
            $text .= '<article class="col-sm-12 marg">';
            $text .= '<section class = "col-sm-6 commsPseudo">' . $comms['Pseudo'] . '</section>';
            $text .= '<section class = "col-sm-6 commsDate">' . $comms['DatePublication'] = date("d-m-Y", strtotime($comms['DatePublication'])) . '</section>';
            $text .= '<section class = "col-sm-12 comms"><p>' . $comms['Commentaire'] . '</p></section>';
            $text .= '</article>';
        }
    } else {
        $text .= '<article class="col-sm-12 marg">';
        $text .= '<p>Il n\'y a pas de commentaire disponible.</p>';
        $text .= '</article>';
    }



    return $text;
}

/**
 * (Code trouvé sur openclassroom)
 * Fonction pour supprimer un dossier et tous ses éléments
 * @param string $dir chemin du dossier
 */
function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir . "/" . $object) == "dir")
                    rmdir($dir . "/" . $object);
                else
                    unlink($dir . "/" . $object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}
