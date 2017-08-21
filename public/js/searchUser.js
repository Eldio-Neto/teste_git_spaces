$.getScript("http://"+window.location.hostname+"/js/app.js", function(){

	//Require APP.js to Use Bootstrap AXIOS
	//alert("Script loaded but not necessarily executed.");

});

/**
 * Código envia string e pega retorno, seja erro seja sucesso
 */

$('#nomeButton').click(function(e)
		{
			if( $('input[name="nome"]').val().length <= 2 ){
				var notify = '<div class="alert alert-danger alert-dismissable">'+
				'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>'
				+'Campo de pesquisa Deve conter no minimo 3 caracteres'+
				'</div>';
				$('div[id="form-message"]').append(notify);
				return;
			}
    		var $form = $('#formCE');
	        e.preventDefault(); //keeps the form from behaving like a normal (non-ajax) html form
	        var url = 'user/search';
	        var formData = {};
	        //submit a POST request with the form data
	        formData[ 'nome' ]		= $('input[name="nome"]').val();//.attr('name')
	        formData[ '_token' ]	= $('input[name="_token"]').val();
	        
	        //submits an array of key-value pairs to the form's action URL
	        $.post(url, formData, function(response)
	        {
	        	
	            //handle successful validation
	        	//check if response is not a URL
				if( jQuery.type( response ) === "array" ) {
					
					if(response.length == 0){
						$('#tableUser').html( '<h3>Nenhum usuário encontrado com esses parâmetros</h3>' );
						return;
					}
					
					var table = '<table class="table table-hover table-striped">'+
								'<thead align="center"> <tr> <th>Selecione o Usuário</th> </tr> </thead>'+
								'<tbody>';
					
					$.each(response, function( index, value ) {
						table = table+
							'<tr> <td> <input class="w3-radio" type="radio" name="Users_idUsers" value="'+value.id+'">'+
							'   '+value.first_name+' '+value.last_name+'</td> </tr>';
						});
					
					table = table+'</tbody> </table>';
					$('#tableUser').html( table );
					
				}else{
					$form.html(response);
				}
				
	        }).fail(function(response)
	        {console.log(response);
	            //handle failed validation
	            //check if response is not a Page 
				if( response.responseText.startsWith('<') ) {
					$form.html(response.responseText);
				}else{
		            var responseText = JSON.parse(response.responseText);
					$.each(responseText, function(i, item) {
		            	var notify = '<div class="alert alert-danger alert-dismissable">'+
	        				'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>'
							+item+
							'</div>';
						$form.find('#form-message').append(notify)
	    	        });
				}
	            
	        });
	    });