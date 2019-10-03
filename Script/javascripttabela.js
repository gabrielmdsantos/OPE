$(document).ready(function(){

    $('#nome').keyup(function(){

        $('form').submit(function(){
            var dados = $(this).serialize();

            $.ajax({
                url: 'classes/processa.php',
                method: 'post',
                dataType: 'html',
                data: id,nome,parceiro,
                success: function(data){
                    $('#resultado').empty().html(data);
                }
            });

            return false;
        });

        $('form').trigger('submit');

    });
});