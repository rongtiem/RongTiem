{{ Form::open(array('url'=>'file','files'=>true)) }}
	
	{{ Form::file('file') }}
	<br/>
	{{ Form::submit() }}
{{ Form::close() }}
