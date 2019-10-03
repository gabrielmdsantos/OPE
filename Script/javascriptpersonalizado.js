$(function(){
	//Pesquisar os cursos sem refresh na página
	$("#nome").keyup(function(){
		
		var nome = $(this).val();
		
		//Verificar se há algo digitado
		if(nome != ''){
			var dados = {
				palavra : nome
			}		
			$.post('classes/busca.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$(".resultado").html(retorna);
			});
		}else{
			$(".resultado").html('');
		}		
	});
});