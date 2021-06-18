$(document).ready(function(){
    $("#Chercher").click(function(){
        var client = 'id='+ $('#clientId').val()
        $("#resultat").load("data.php",client);
    });  
});