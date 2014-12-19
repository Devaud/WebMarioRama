<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './DB/connection.php';

/**
 * Récupèe toute les consoles
 * @return array tableau des consoles
 */
function getAllConsole() {
    $bdd = connect();
    $sql = 'SELECT * From consoles';

    $st = prepareExecute($sql, $bdd)->FetchAll();

    return $st;
}

/**
 * Récupère l'id selon le nom
 * @param string $nom nom de la console
 * @return string id de la console
 */
function getId($nom) {
    $bdd = connect();
    $sql = 'SELECT idConsole From consoles WHERE NomConsole=:nom';

    $st = prepareExecute($sql, $bdd, array('nom' => $nom))->Fetch();

    return $st;
}

/**
 * Récupère le nom des console associé a un jeu
 * @param string $id id du jeu
 * @return array tableau du nom des consoles
 */
function getNameById($id) {
    $bdd = connect();

    $sql = 'SELECT idConsole FROM concerne WHERE idJeu=:id';
    $concerne = prepareExecute($sql, $bdd, array('id' => $id))->FetchAll();

    foreach ($concerne as $consoleId) {
        $sql = 'SELECT NomConsole FROM consoles WHERE idConsole=:id';
        $id = $consoleId['idConsole'];
        $console = prepareExecute($sql, $bdd, array('id' => $id))->Fetch();
        
        $st[] = $console['NomConsole'];
    }
    
    return $st;
}

/**
 * Récupère une console
 * @param string $id id de la console
 * @return array Tableau des informations de la console
 */
function getConsole($id){
    $bdd = connect();
    $sql = 'SELECT * From consoles WHERE idConsole=:id';

    $st = prepareExecute($sql, $bdd, array('id' => $id))->Fetch();

    return $st;
}

/**
 * Ajout une console
 * @param string $nom Nom de la console
 * @param array $date date de sortie
 * @param string $img lien de l'image
 * @param string $proc processor de la console
 * @param string $memoire mémoire de la console
 * @param string $format format des jeu
 * @return id id du dernier élément ajouter
 */
function addConsole($nom, $date, $img = NULL, $proc = NULL, $memoire = NULL, $format = NULL){
    $bdd = connect();
    $sql = 'INSERT INTO consoles (NomConsole, ImgConsole, DateConsole, Processeur, Memoire, FormatJeux) VALUES (:nom, :img, :date, :proc, :memoire, :format)';
    
    if (prepareExecute($sql, $bdd, array('nom' => $nom, 'img' => $img, 'date' => $date, 'proc' => $proc, 'memoire' => $memoire, 'format' => $format))) {
        return $bdd->lastInsertId();
    } else {
        return NULL;
    }
}

/**
 * Test si la console existe déjà
 * @param string $nom nom de la console
 * @return bool vrai, faux selon l'existance de la console
 */
function existConsole($nom){
    $bdd = connect();
    $sql = 'SELECT NomConsole FROM consoles WHERE NomConsole=:console';

    $st = prepareExecute($sql, $bdd, array('console' => $nom))->Fetch();

    return (!empty($st)) ? true : false;
}