<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './DB/connection.php';

function getAllConsole(){
    $bdd = connect();
    $sql = 'SELECT * From consoles';
    
    $st = prepareExecute($sql, $bdd)->FetchAll();
    
    return $st;
}

function getId($nom){
    $bdd = connect();
    $sql = 'SELECT idConsole From consoles WHERE NomConsole=:nom';
    
    $st = prepareExecute($sql, $bdd, array('nom' => $nom))->Fetch();
    
    return $st;
}
