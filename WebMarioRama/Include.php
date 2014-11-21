<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

/* * **********************************************
 *  **          VARIABLES GLOBALES              ***
 *  ********************************************* */

$page = 'home';

/* * ***********************************************
 *  **           GESTION DE LA SESSION           ***  
 *  ********************************************** */

/*
 * Charge les variables depuis la session
 */

function LoadFromSession() {
    global $page;

    if (isset($_SESSION['page'])) {
        $page = $_SESSION['page'];
    }
}

/*
 * Save les variables dans la session
 */

function SaveInSession() {
    global $page;

    $_SESSION['page'] = $page;
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
    }else{
        $page = 'home';
    }
}

/* * ***********************************************
 *  **       AFFICHAGE DES BLOCS DE LA PAGE      ***  
 *  ********************************************** */

/**
 * Fonction pour afficher le pied de page
 * @return string Html du pied de page
 */
function displayFooter(){
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
function displayNav(){
    global $page;
    
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
    if($page == 'home'){
       $text .= '<li class="active"><a href="./Index.php?page=home">Home</a></li>'; 
    }else{
        $text .= '<li><a href="./Index.php?page=home">Home</a></li>'; 
    }
    
    $text .= '<li><a href="#">Jeux</a></li>';
    $text .= '<li><a href="#">Consoles</a></li> ';
    $text .= '</ul>';
    $text .= '<ul class="nav navbar-nav navbar-right">';
    $text .= '<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
    $text .= '<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
    $text .= '</ul>';
    $text .= '</section>';
    $text .= '</section>';
    $text .= '</nav>';
    
    return $text;
}




