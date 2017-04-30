@if(Session::has('message-datoCreado'))
	<div class="alert alert-info alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  		{{Session::get('message-datoCreado')}}
  		{{Session::forget('message-datoCreado')}}
	</div>
@endif