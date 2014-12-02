<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './DB/connection.php';

function getAllType() {
    $bdd = connect();
    $sql = 'SELECT * From types';

    $st = prepareExecute($sql, $bdd)->FetchAll();

    return $st;
}

function getIdType($nom) {
    $bdd = connect();
    $sql = 'SELECT idType From types WHERE NomType=:nom';

    $st = prepareExecute($sql, $bdd, array('nom' => $nom))->Fetch();

    return $st;
}

function getTypeById($id){
    $bdd = connect();
    $sql = 'SELECT idType From etre WHERE idJeu=:id';

    $idType = prepareExecute($sql, $bdd, array('id' => $id))->Fetch();

    $sql = 'SELECT NomType FROM types WHERE idType=:idType';
    $st = prepareExecute($sql, $bdd, array('idType' => $idType['idType']))->Fetch();
    return $st;
}
    
