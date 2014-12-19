<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'include.php';
LoadFromSession();

// Test si l'utilisateur est connecté
if ($connect) {
    $user = '';
    $connect = false;
}
SaveInSession();
header('location: ./index.php?page=home');

