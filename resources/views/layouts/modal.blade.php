<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLabel"></h3>
      </div>
      <div class="modal-body"></div>
  </div>
</div>
</div>


<script>
	$('#exampleModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var rota = button.data('rota') // Extract info from data-* attributes
	
		var create	= rota.search(/create/i);
		var edit	= rota.search(/edit/i);
	    if( create>=0 ){
	    	$(".modal-title").text('Cadastrar / Registrar');
	    }else if( edit>=0 ){
	    	$(".modal-title").text('Editar');
	    }else{
	    	$(".modal-title").text('Visualizar');
	    }
		  
		$.get( rota, function( data ) {
			$(".modal-body").html(data);
		});
	});

	$('#exampleModal').on('hidden.bs.modal', function (event) {

		$(".modal-title").text('');
		$(".modal-body").html('');
      
	});
</script>
