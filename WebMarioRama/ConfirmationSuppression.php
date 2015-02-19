<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<html>
    <head>
        <title>Confirmation de suppression</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <SCRIPT LANGUAGE="JavaScript">
            function confirmation() {
                var msg = "Voulez-vous vraiment supprimer ce jeu ?";
                if (confirm(msg))
                    location.replace(Notrescript.php);
            }
        </SCRIPT> 

        <INPUT TYPE="Button" onClick="confirmation();" VALUE="Supprimer"> 
</html>
</body>


