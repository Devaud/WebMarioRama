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
            $text .= $mot["NomJeu"];
        }
    } else {
        $text = "Aucun résultat pour " . $motclef;
    }
    
    echo $text;
}

