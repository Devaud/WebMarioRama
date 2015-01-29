<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './DB/connection.php';

/**
 * Récupère tout les styles qui sont dans la base de données
 * @return array Tableau des styles
 */
function getAllType() {
    $bdd = connect();
    $sql = 'SELECT * From types';

    $st = prepareExecute($sql, $bdd)->FetchAll();

    return $st;
}

/**
 * Récupère l'id d'un type
 * @param string $nom nom du type
 * @return string id du type
 */
function getIdType($nom) {
    $bdd = connect();
    $sql = 'SELECT idType From types WHERE NomType=:nom';

    $st = prepareExecute($sql, $bdd, array('nom' => $nom))->Fetch();

    return $st;
}

/**
 * Réupère un type associé a un jeu
 * @param string $id id du jeu
 * @return string id du type trouvé
 */
function getTypeById($id){
    $bdd = connect();
    $sql = 'SELECT idType From etre WHERE idJeu=:id';

    $idType = prepareExecute($sql, $bdd, array('id' => $id))->Fetch();

    $sql = 'SELECT NomType FROM types WHERE idType=:idType';
    $st = prepareExecute($sql, $bdd, array('idType' => $idType['idType']))->Fetch();
    return $st;
}

/**
 * Vérifie si un type existe
 * @param string $type nom du type
 * @return boolean true si le type existe déjà
 */
function existType($type){
    $bdd = connect();
    $sql = 'SELECT NomType FROM types WHERE NomType=:type';
    
    $st = prepareExecute($sql, $bdd, array('type' => $type))->Fetch();
    
    return (!empty($st)) ? true : false;
}

/**
 * Ajout du type
 * @param string $type nom du type
 */
function ajoutType($type){
    $bdd = connect();
    $sql = 'INSERT INTO types (NomType) VALUES (:type)';
    
    prepareExecute($sql, $bdd, array('type' => $type));
}

/**
 * Récpère les infomrations dans la table
 * @param string $table nom de la table
 * @return string le résultat de la requete
 */
function getListe($table){
    $bdd = connect();
    $sql = 'SELECT * FROM ' . $table;
    $st = prepareExecute($sql, $bdd)->FetchAll();
    
    return $st;
}
    
