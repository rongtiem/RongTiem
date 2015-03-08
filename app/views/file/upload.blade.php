{{ Form::open(array('files'=>true)) }}
	
	{{ Form::file('file') }}
	<br/>
	{{ Form::submit() }}
{{ Form::close() }}
