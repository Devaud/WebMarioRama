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
