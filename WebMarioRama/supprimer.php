<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './Include.php';
LoadFromSession();

if (isset($_GET['type']) && isset($_GET['id']) && $connect) {
    $jeu = $_GET['id'];
    $titre = getJeuxById($jeu);

    supprimerCommentaires($jeu);
    supprimerConcerner($jeu);
    supprimerTypes($jeu);
    supprimerJeu($jeu);

    $dossier = './Media/' . str_replace(' ', '', $titre);
    rrmdir($dossier);

    header('location: ./jeux.php?page=jeux');
} else {
    header('location: ./index.php?page=home');
    exit();
}



