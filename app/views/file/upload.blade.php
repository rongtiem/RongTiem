{{ Form::open(array('url'=>'file','files'=>true)) }}
	
	<input style="display: ;" type="file" name="file" id="file" ng-file-select="onFileSelect($files)" /> 

	<button type="submit" class="btn btn-primary pull-right">สร้างกระทู้</button>
{{ Form::close() }}
