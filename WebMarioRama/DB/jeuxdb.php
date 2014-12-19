<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './DB/connection.php';

function addGame($nomJeu, $date, $desc, $video, $ImgJeu) {
    $bdd = connect();
    $sql = 'INSERT INTO jeux(NomJeu, DateJeu, Descriptif, video, ImgJeu) VALUES (:nom, :date, :desc, :video, :img)';

    if (prepareExecute($sql, $bdd, array('nom' => $nomJeu, 'date' => $date, 'desc' => $desc, 'video' => $video, 'img' => $ImgJeu))) {
        return $bdd->lastInsertId();
    } else {
        return NULL;
    }
}

function jeuConsole($idJeu, $idConsole) {
    $bdd = connect();
    $sql = 'INSERT INTO concerne(idJeu, idConsole) VALUES (:idJeu, :idConsole)';

    prepareExecute($sql, $bdd, array('idConsole' => $idConsole, 'idJeu' => $idJeu));
}

function jeuType($idJeu, $idType) {
    $bdd = connect();
    $sql = 'INSERT INTO etre(idJeu, idType) VALUES (:idJeu, :idType)';

    prepareExecute($sql, $bdd, array('idType' => $idType, 'idJeu' => $idJeu));
}

function getGame($id) {
    $bdd = connect();
    $sql = 'SELECT * FROM jeux WHERE idJeu=:id';

    $st = prepareExecute($sql, $bdd, array('id' => $id))->Fetch();

    return $st;
}

function getAllGameBetweenTwoDate($dateDebut, $dateFin) {
    $bdd = connect();
    $sql = 'SELECT * FROM jeux WHERE DateJeu > :dateDebut AND DateJeu < :dateFin';

    $st = prepareExecute($sql, $bdd, array('dateDebut' => $dateDebut, 'dateFin' => $dateFin + 1))->FetchAll();

    return $st;
}

function getJeuxById($id) {
    $bdd = connect();

    $sql = 'SELECT idJeu FROM concerne WHERE idConsole=:id';
    $concerne = prepareExecute($sql, $bdd, array('id' => $id))->FetchAll();

    if (!empty($concerne)) {
        foreach ($concerne as $JeuId) {
            $sql = 'SELECT NomJeu FROM jeux WHERE idJeu=:id';
            $id = $JeuId['idJeu'];
            $console = prepareExecute($sql, $bdd, array('id' => $id))->Fetch();

            $st[] = $console['NomJeu'];
        }
    } else {
        $st = NULL;
    }


    return $st;
}

function getIdJeu($nom) {
    $bdd = connect();
    $sql = 'SELECT idJeu FROM jeux WHERE NomJeu=:name';

    $st = prepareExecute($sql, $bdd, array('name' => $nom))->Fetch();

    return $st['idJeu'];
}

function existJeu($nom){
    $bdd = connect();
    $sql = 'SELECT NomJeu FROM jeux WHERE NomJeu=:jeu';

    $st = prepareExecute($sql, $bdd, array('jeu' => $nom))->Fetch();

    return (!empty($st)) ? true : false;
}
