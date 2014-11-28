<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './DB/connection.php';

/**
 * Connection d'un utilisateur
 * @param string $pseudo pseudo de l'utilisateur
 * @param string $pwd mot de passe de l'utilisateur
 * @return string tableau de string que retourne la requête
 */
Function connectUser($pseudo, $pwd) {
    $bdd = connect();
    $sql = 'SELECT Pseudo, MDP FROM users WHERE Pseudo=:pseudo AND MDP=:pwd';
    $st = prepareExecute($sql, $bdd, array('pseudo' => $pseudo, 'pwd' => $pwd))->Fetch();

    if (empty($st)) {
        return false;
    } else {
        return true;
    }
}
