<div class="modal fade" id="upload_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3>Upload A New Pic</h3>
			</div>
			<div class="modal-body">
				<div class="form-group">
					{{ Form::open(array('url' => 'file','files'=>true,'id' => 'upload_modal_form','enctype' => 'multipart/form-data')) }}
					{{ Form::label('photo','Photo')}}
					{{ Form::file('file') }}
					<input ng-model="img" type="file" name="file" id="uploadBanner2" ng-file-select="onFileSelect($files)" multiple/>
					{{ Form::label('description','Description')}}
					{{ Form::text('description','',array('placeholder'=>'Describe your photo here!','id'=>'description','class'=>'span5'))}}
					{{ Form::close()}}	
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">cancel</a>
				<button type="button" onclick="$('#upload_modal_form').submit();" class="btn btn-primary">Upload Pic</button>
			</div>
		</div>	
	</div>
	
</div>