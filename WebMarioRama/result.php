<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './Include.php';

if (isset($_GET["motclef"])) {
    $motclef = $_GET["motclef"];

    $result = rechercheJeu($motclef);

    $text = '';
    if (!empty($result)) {
        foreach ($result as $mot) {

            $text .= '<a href="./ficheJeux.php?page=figheJeu&id=' . $mot['idJeu'] . '" class="list-group-item">' . $mot["NomJeu"] . '</a>';
        }
    } else {
        $text = '<a class="list-group-item list-group-item-danger">Aucun résultat pour ' . $motclef . '</a>';
    }

    echo $text;
}

