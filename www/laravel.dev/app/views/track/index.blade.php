@extends('main') 

@section('style')
<style>
  body {
    padding-top: 50px;
  }
</style>
@stop

@section('content')
@if(Auth::check())

	<div id="loading">LOADING</div>
	<div id="app" ng-controller="TrackCtrl">

		<p>
	    	<span id="track-count"><strong>{*remaining*}</strong> tracks</span>
	    </p>

		<table class="table table-striped table-bordered table-condensed" id="track-list">
			<thead>
				<tr>
			    	<th>Artist</th>
			    	<th>Title</th>
			    	<th>Genre</th>
			    	<th>Duration</th>
			    	<th>Song picture</th>
			    	<th>Direct link</th>
				</tr>
			</thead>
			<tbody>
			    <tr ng-repeat="track in tracks" ng-dblclick="editTrack($index)">
			    	<td>{*track.artist*}</td>
			    	<td>{*track.title*}</td>
			    	<td>{*track.genre*}</td>
			    	<td>{*track.duration*}</td>
			    	<td><img src="/data/{*track.picture_path*}" width="50px" height="50px"/></td>
			    	<td>{*track.mp3_path*}</td>

			    	<td><button class="btn btn-default" ng-click="editTrack($index)"><i class="fa fa-pencil-square-o"></i> Edit</button><br/>
			    		<button class="btn btn-default" ng-click="removeTrack($index)"><i class="fa fa-times"></i> Delete</button>
			    	</td>
			    </tr>
			</tbody>
		</table>

		<div style="text-align:center;">
		    <script type="text/ng-template" id="track_form.html">
		        <div class="modal-header">
		            <h3>{*formTitle*}</h3>
		        </div>
		        <div class="modal-body">
		        	<form role="form" id="formUpload" name="formUpload" method="post" action="/track/upload" enctype="multipart/form-data">
						<div class="form-group">
							<label>Song information</label>
							<input class="form-control" ng-model="track.artist" type="text" placeholder="Artist">
							<input class="form-control" ng-model="track.title" type="text" placeholder="Title">
							<select class="form-control" ng-model="track.genre" ng-options="g for g in genres"></select>
						</div>
						<div class="form-group">
				           Please select one or more audio files :<br/>
							<input type="file" multiple name="formFiles[]" id="formFiles"/>
							<input type="submit" value="Send">
							<div id="message"></div>
							<br />
							<div id="status"></div>
						</div>
						<div class="form-group">
							<label>Picture</label>
							<p>
								<img src="/data/{*track.picture_path*}"/>
							</p>
							<!--
							<form action="pic_upload.php" method="post" enctype="multipart/form-data" id="upload-form">
							<input type="hidden" name="x1" id="x1">
							<input type="hidden" name="y1" id="y1">
							<input type="hidden" name="x2" id="x2">
							<input type="hidden" name="y2" id="y2">
							<div>
								<input class="form-control" type="file" onchange="fileSelectHandler()" id="image_file" name="image_file">
							</div>
							<div class="error"></div>
							<div class="step2">
								<img id="preview">
								<div class="info">
									<input type="hidden" name="filesize" id="filesize">
									<input type="hidden" name="filetype" id="filetype">
									<input type="hidden" name="filedim" id="filedim">
									<input type="hidden" name="w" id="w">
									<input type="hidden" name="h" id="h">
									<input type="hidden" value="{*track.picture_path*}" name="filename" id="filename">
									<input type="hidden" value="{*track.id*}" name="track_id" id="track_id">
								</div>

								<button class="form-control" id="submit-pic">Upload</button></div></form>

							<input class="form-control" ng-model="track.picture_path" type="text" placeholder="Picture"><br/>-->
							</div>
						</div>
					</form>
		        </div>
		        <div class="modal-footer">
		            <button class="btn btn-primary" ng-click="ok()">OK</button>
		            <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
		        </div>
		    </script>

		    <button class="btn btn-default" id="add-track" ng-click="addTrack()"><i class="fa fa-plus"></i> Add a new track</button>
		</div>
	</div>
@endif

@stop
