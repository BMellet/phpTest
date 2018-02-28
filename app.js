var input = $('#input');
var boxPseudo = $('#pseudo');
var verif = $('#verif');
var input2 = $('#input2');
var verif2 = $('#verif2');
input.keyup(check);
function check() {
    verif.removeClass("ok");
   $.ajax({
       url : 'testPseudo.php',
       type : 'GET',
       dataType : 'html',
       data : 'pseudo=' + input.val(),
       success : function(data){
           if(data == "1"){
               verif.html("Pseudo indisponible");
               verif.removeClass.removeClass("ok");
           }else if(data == "0"){
            boxPseudo.removeClass("dispo");
               verif.removeClass("ok");
            }else{
                boxPseudo.addClass("dispo");
                verif.addClass("ok");
               
           }
       },
       error : function(){
       }
   });
}