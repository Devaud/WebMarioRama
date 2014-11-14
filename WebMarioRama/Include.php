<?php
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
    $text = '<nav class="navbar navbar-default">';
    $text .= '<section class="container-fluid">';
    $text .= '<section class="navbar-header">';
    $text .= '<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">';
    $text .= '<span class="sr-only">Toggle navigation</span>';
    $text .= '<span class="icon-bar"></span>';
    $text .= '<span class="icon-bar"></span>';
    $text .= '<span class="icon-bar"></span>';
    $text .= '</button>';
    $text .= '<a class="navbar-brand" href="./Index.php">WebMarioRama</a>';
    $text .= '</section>';
    $text .= '<section id="navbarCollapse" class="collapse navbar-collapse">';
    $text .= '<ul class="nav navbar-nav">';
    $text .= '<li class="active"><a href="./Index.php">Home</a></li>';
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

