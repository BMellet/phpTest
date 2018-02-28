var input = $('#input');
var boxPseudo = $('#pseudo');
var verif = $('#verif');
var input2 = $('#input2');
var verif2 = $('#verif2');
input.keyup(check);
function check() {

    $.ajax({
        url: 'testPseudo.php',
        type: 'GET',
        dataType: 'html',
        data: 'pseudo=' + input.val(),
        success: function (data) {
            if (data == 1) {
                verif.html( "Pseudo disponible");

            } else if (data == 0) {
                verif.html("");
            } else {
                verif.html("Pseudo Indisponible");
            }
        },
        error: function () {
        }
    });
}