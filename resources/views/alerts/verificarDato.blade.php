@if(Session::has('message-dato'))
	<div class="alert alert-warning alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  		{{Session::get('message-dato')}}
  		{{Session::forget('message-dato')}}
	</div>
@endif