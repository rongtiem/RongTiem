<!--{{ Form::open(array('url'=>'file','files'=>true)) }}

<input style="display: ;" type="file" name="file" id="file" ng-file-select="onFileSelect($files)" /> 

<button type="submit" class="btn btn-primary pull-right">pic</button>
{{ Form::close() }}-->

{{ Form::open(array('url'=>'file','files'=>true))}} 
<fieldset><legend>Add Book Image Form</legend> 
	<div> 

		{{ Form::file('file') }} 
		{{ Form::submit('save', array('name' => 'submit')) }} 
		{{ Form::close() }} 
	</div>
