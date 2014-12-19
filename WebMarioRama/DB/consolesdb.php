<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './DB/connection.php';

function getAllConsole() {
    $bdd = connect();
    $sql = 'SELECT * From consoles';

    $st = prepareExecute($sql, $bdd)->FetchAll();

    return $st;
}

function getId($nom) {
    $bdd = connect();
    $sql = 'SELECT idConsole From consoles WHERE NomConsole=:nom';

    $st = prepareExecute($sql, $bdd, array('nom' => $nom))->Fetch();

    return $st;
}

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

function getConsole($id){
    $bdd = connect();
    $sql = 'SELECT * From consoles WHERE idConsole=:id';

    $st = prepareExecute($sql, $bdd, array('id' => $id))->Fetch();

    return $st;
}

function addConsole($nom, $date, $img = NULL, $proc = NULL, $memoire = NULL, $format = NULL){
    $bdd = connect();
    $sql = 'INSERT INTO consoles (NomConsole, ImgConsole, DateConsole, Processeur, Memoire, FormatJeux) VALUES (:nom, :img, :date, :proc, :memoire, :format)';
    
    if (prepareExecute($sql, $bdd, array('nom' => $nom, 'img' => $img, 'date' => $date, 'proc' => $proc, 'memoire' => $memoire, 'format' => $format))) {
        return $bdd->lastInsertId();
    } else {
        return NULL;
    }
}

function existConsole($nom){
    $bdd = connect();
    $sql = 'SELECT NomConsole FROM consoles WHERE NomConsole=:console';

    $st = prepareExecute($sql, $bdd, array('console' => $nom))->Fetch();

    return (!empty($st)) ? true : false;
}