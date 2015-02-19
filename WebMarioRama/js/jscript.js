/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {

    $("#pseudo").keyup(function () {
        if (!$("#pseudo").val().match(/^[a-z0-9]+$/i)) {
            $("#pseudoGroup").attr("class", "form-group has-error has-feedback");
            $("#pseudo").next(".cacher").show();
        } else {
            $("#pseudoGroup").attr("class", "form-group");
            $("#pseudo").next(".cacher").hide();
        }
    });

    $("#envoyer").click(function () {
        valid = true;

        if ($("#pseudo").val() == "") {
            $("#pseudoGroup").attr("class", "form-group has-error has-feedback");
            $("#pseudo").next(".cacher").fadeIn();
            valid = false;
        } else {
            $("#pseudoGroup").attr("class", "form-group");
            $("#pseudo").next(".cacher").fadeOut();
        }

        if ($("#commentaire").val() == "") {
            $("#commentaireGroup").attr("class", "form-group has-error has-feedback");
            $("#commentaire").next(".cacher").fadeIn();
            valid = false;
        } else {
            $("#commentaireGroup").attr("class", "form-group");
            $("#commentaire").next(".cacher").fadeOut();
        }

        return valid;
    });
});


