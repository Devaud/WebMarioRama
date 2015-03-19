<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './DB/connection.php';

/**
 * Ajout un jeux
 * @param string $nomJeu Nom du jeu
 * @param date $date date du jeu
 * @param string $desc description du jeu
 * @param string $video lien de la vidéo
 * @param string $ImgJeu lien de la pochette
 * @return id id du jeu qui vient d'être entré
 */
function addGame($nomJeu, $date, $desc, $video, $ImgJeu) {
    $bdd = connect();
    $sql = 'INSERT INTO jeux(NomJeu, DateJeu, Descriptif, video, ImgJeu) VALUES (:nom, :date, :desc, :video, :img)';

    if (prepareExecute($sql, $bdd, array('nom' => $nomJeu, 'date' => $date, 'desc' => $desc, 'video' => $video, 'img' => $ImgJeu))) {
        return $bdd->lastInsertId();
    } else {
        return NULL;
    }
}

/**
 * Associe un jeu a une console
 * @param string $idJeu id du jeu
 * @param string $idConsole id de la console
 */
function jeuConsole($idJeu, $idConsole) {
    $bdd = connect();
    $sql = 'INSERT INTO concerne(idJeu, idConsole) VALUES (:idJeu, :idConsole)';

    prepareExecute($sql, $bdd, array('idConsole' => $idConsole, 'idJeu' => $idJeu));
}

/**
 * Associe un jeu a un type
 * @param string $idJeu id du jeu
 * @param string $idType id du type
 */
function jeuType($idJeu, $idType) {
    $bdd = connect();
    $sql = 'INSERT INTO etre(idJeu, idType) VALUES (:idJeu, :idType)';

    prepareExecute($sql, $bdd, array('idType' => $idType, 'idJeu' => $idJeu));
}

/**
 * Récupère les informations d'un jeu
 * @param string $id id du jeu
 * @return array tableau des informations du jeu
 */
function getGame($id) {
    $bdd = connect();
    $sql = 'SELECT * FROM jeux WHERE idJeu=:id';

    $st = prepareExecute($sql, $bdd, array('id' => $id))->Fetch();

    return $st;
}

/**
 * Récupère tout les jeux entre deux dates
 * @param date $dateDebut date de début
 * @param date $dateFin date de fin
 * @return array tableau des jeux
 */
function getAllGameBetweenTwoDate($dateDebut, $dateFin) {
    $bdd = connect();
    $sql = 'SELECT * FROM jeux WHERE DateJeu > :dateDebut AND DateJeu < :dateFin';

    $st = prepareExecute($sql, $bdd, array('dateDebut' => $dateDebut, 'dateFin' => $dateFin + 1))->FetchAll();

    return $st;
}

/**
 * Ràcupère les jeux qui sont concernée par une console
 * @param string $id id de la console
 * @return array tableau des console
 */
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

/**
 * Récupère l'id du jeu via son nom
 * @param string $nom nom du jeu
 * @return string nom du jeu
 */
function getIdJeu($nom) {
    $bdd = connect();
    $sql = 'SELECT idJeu FROM jeux WHERE NomJeu=:name';

    $st = prepareExecute($sql, $bdd, array('name' => $nom))->Fetch();

    return $st['idJeu'];
}

/**
 * Test si le jeu existe déjà
 * @param string $nom nom du jeu
 * @return bool vrai, faux selon l'existance du jeu
 */
function existJeu($nom) {
    $bdd = connect();
    $sql = 'SELECT NomJeu FROM jeux WHERE NomJeu=:jeu';

    $st = prepareExecute($sql, $bdd, array('jeu' => $nom))->Fetch();

    return (!empty($st)) ? true : false;
}

/**
 * Recherche un jeu dans la base de donnée par rapport à un mot clé
 * @param string $motclef mot clé
 * @return array donnée trouvée
 */
function rechercheJeu($motclef) {
    $bdd = connect();
    $sql = 'SELECT idJeu, NomJeu FROM jeux WHERE NomJeu LIKE :motclef';

    $st = prepareExecute($sql, $bdd, array("motclef" => $motclef . "%"))->FetchAll();
    
    return $st;
}

function supprimerConcerner($id){
    $bdd = connect();
    $sql = 'DELETE FROM concerne WHERE idJeu=:id';
    prepareExecute($sql, $bdd, array('id' => $id));
}

function supprimerTypes($id){
    $bdd = connect();
    $sql = 'DELETE FROM etre WHERE idJeu=:id';
    prepareExecute($sql, $bdd, array('id' => $id));
}

function supprimerCommentaires($id){
    $bdd = connect();
    $sql = 'DELETE FROM commentaires WHERE idJeu=:id';
    prepareExecute($sql, $bdd, array('id' => $id));
}

function supprimerJeu($id){
    $bdd = connect();
    $sql = 'DELETE FROM jeux WHERE idJeu=:id';
    prepareExecute($sql, $bdd, array('id' => $id));
}