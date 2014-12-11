/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function mute() {
    var vid = document.getElementById("player");
    var volume = document.getElementById("volume");

    if (!vid.muted) {
        vid.muted = true;
        volume.className = "glyphicon glyphicon-volume-off";
    } else {
        vid.muted = false;
        volume.className = "glyphicon glyphicon-volume-up";
    }



}