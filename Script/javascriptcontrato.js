$(document).ready(function(){
    $('#campo').keyup(function(){
        $('form').submit(function(){
            var dados = $(this).serialize();
            $.ajax({
                url: 'processacontrato.php',
                method: 'post',
                dataType: 'html',
                data: dados,
                success: function(data){
                    $('#resultado').empty().html(data);
                }
            });
            return false;
        });
        $('form').trigger('submit'); 
    });
});
