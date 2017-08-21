$.getScript("http://"+window.location.hostname+":"+location.port+"/js/app.js", function(){

	//Require APP.js to Use Bootstrap AXIOS
	//alert("Script loaded but not necessarily executed.");

});


/**
 * Código envia formulario e pega retorno, seja erro seja sucesso
 */

//jquery.inputmask after load page
$(document).ready(function() { 

	$.getScript("/Gentelella/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js", function(){
			//Callback inputmask again to enable it on the new added fields
			$(":input").inputmask();
	 });
});

$('form').submit(function(e)
		{
			var $form = $(this);
			e.preventDefault(); //keeps the form from behaving like a normal (non-ajax) html form
			var url = $form.attr('action');
			var formData = {};
			//submit a POST request with the form data
			$form.find(':input').each(function()
			{
				if( $(this).attr('type')=='radio' ){
					formData[ $(this).attr('name') ] = $("input[name='"+$(this).attr('name')+"']:checked").val();
				}else{
					formData[ $(this).attr('name') ] = $(this).val();
				}
			});

			// Performing a POST request
			window.axios.post(url, formData)
			.then(response => {
				//handle successful validation
				var resposta = response.request.responseText
				
				if( 
					resposta.startsWith('<') || //check Debug from API
					!response.request.responseText.startsWith('http') //check if response is not a URL
				) {
					$form.html(resposta);
				}
				 
				window.location.href = resposta;

			})
			.catch(error => {
				if (error.response) {
					//handle failed validation
					var resposta		= error.response.request.responseText;
					if( resposta.startsWith('<') ){ //check Debug from API) 
						$form.html(resposta);
					}
					
					var responseJSON	= JSON.parse(resposta);
					
					var messages		= $('div[id="form-message"]').html('');
					
					$.each(responseJSON, function(i, item) {
						var notify = '<div class="alert alert-danger alert-dismissable">'+
							'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>'
							+item+
							'</div>';
						messages.append(notify)
					});
				}
			});  
		
		});