<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './DB/connection.php';

function getAllType(){
    $bdd = connect();
    $sql = 'SELECT NomType From types';
    
    $st = prepareExecute($sql, $bdd)->FetchAll();
    
    return $st;
}

