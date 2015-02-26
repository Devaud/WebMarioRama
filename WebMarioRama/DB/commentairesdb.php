<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './DB/connection.php';

/**
 * Récupère les commentaires conercnant un id
 * @param integer $idJeu id conercner
 * @return array tableau des éléments récupérés
 */
function getCommentaire($idJeu){
    $bdd = connect();
    $sql = 'SELECT Commentaire, DatePublication, Pseudo FROM commentaires NATURAL JOIN jeux WHERE idJeu=:idJeu';

    $st = prepareExecute($sql, $bdd, array('idJeu' => $idJeu))->FetchAll();

    return $st;
}

/**
 * Insere un nouveau commentaire
 * @param integer $idJeu id du jeu concerner
 * @param string $comms commentaire
 * @param string $pseudo pseudo du commentateur
 * @param date $date date de la publication
 */
function addCommentaire($idJeu, $comms, $pseudo, $date){
    $bdd = connect();
    $sql = 'INSERT INTO commentaires (Commentaire, Pseudo, DatePublication, idJeu) VALUES (:comms, :pseudo, :datePublication, :idJeu)';
    
    $st = prepareExecute($sql, $bdd, array('comms' => $comms, 'pseudo' => $pseudo, 'datePublication' => $date, 'idJeu' => $idJeu));
}

