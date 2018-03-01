var input = $('#input');
var boxPseudo = $('#pseudo');
var input_mdp = $('#mdp');
var verif_mdp2 = $('#mdp2');
var tri_ville =$('#tri')
input.keyup(check);
function check() {

    $.ajax({
        url: 'testPseudo.php',
        type: 'GET',
        dataType: 'html',
        data: 'pseudo=' + input.val(),
        success: function (data) {
            
            switch(parseInt(data))
            {
                case 0:
                    input.removeClass("dispo");
                    $("#btn_register").attr("disabled", true);
                    break;
                
                case 1:
                    input.addClass("dispo");
                    break;
                
                case 2:
                    input.addClass("pas_dispo");
                    input.removeClass("dispo");
                    $("#btn_register").attr("disabled", true);
                    break;
                default:           
                
            }
        },
        error: function () {
        }
    });
}

verif_mdp2.keyup(function(){
    if(input_mdp.val() !== verif_mdp2.val() && input_mdp.val()!=="")
    {
        $("#btn_register").attr("disabled", true);
    }
    else{
        $("#btn_register").attr("disabled", false);
        
    }
})

function suppr(event){
    if(confirm("voulez vous vraiment supprimer cette demande ? "))
    {
        $.ajax({
            url: 'suppression.php',
            type: 'GET',
            dataType: 'html',
            data: 'id=' + event.target.getAttribute("value"),
            success: function (data) {
                location.reload();
            },
            error: function () {
            }
        });
    }

}

//tri des evenements selon les villes //




