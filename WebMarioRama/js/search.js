/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    // quand une touche est relachée sur l'input recherche
    $("#recherche").keyup(function () {
        var recherche = $(this).val(); // Récupère le mot clé
        var data = 'motclef=' + recherche;
        if (recherche.length > 1) {
            // Fonction ajax
            $.ajax({
                type: "GET",
                url: "result.php",
                data: data,
                success: function (server_response) {
                     $("#resultat").html(server_response).show();
                }
            });
        }
    });
});

