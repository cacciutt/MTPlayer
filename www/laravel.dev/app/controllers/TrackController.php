<?php

class TrackController extends BaseController {

	public $DEFAULT_PICTURE_PATH = "pics/moon.jpg";

	public function index()
	{
		if(Auth::check()) {
			// Get all tracks from the database
			$tracks = Track::all();
			$json_tracks = json_encode(Track::all()->toArray());

			return View::make('track.index')->with("tracks", $tracks)
											   ->with("json_tracks", $json_tracks)
											   ->with("title", "Tracks")
											   ->with("projectname", "MultiTrackPlayer");
		}
		else {
			// The user is not logged in
			return Redirect::to('user/login')->with('message', 'Please login');
		}
		
	}

	public function get_tracks() {
		if (Auth::check()) {
			// Get all tracks from the database
			$tracks = Track::all()->toArray();
			return ($tracks);
		}
	}

	public function delete_track() {
		if (Auth::check()) {
			$track = Track::find(Input::get("track_id"));
			$track->delete();
		}
	}

	public function insert_track() {
		if (Auth::check()) {

			$track = new Track;
			$track->artist = Input::get("artist");
			$track->title = Input::get("title");
			$track->duration = "3:00";
			$track->picture_path = $this->DEFAULT_PICTURE_PATH;

			$track->save();

			echo $insertedId = $track->id;
		}

	}

	public function update_track() {
		if (Auth::check()) {
			$track = Track::find(Input::get("id"));
			$track->artist = Input::get("artist");
			$track->title = Input::get("title");
			$track->genre = Input::get("genre");
			$track->duration = "3:00";
			$track->picture_path = $this->DEFAULT_PICTURE_PATH;

			$track->save();
		}
	}

	public function upload_track() {
		if (Auth::check()) {

			$folderName = date("m.d.Y");
			if (!is_dir('/data/'.$folderName)) {
				mkdir('/data/'.$folderName);
			}

			$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
			if ($fn)
			{
				file_put_contents('/data/' . $folderName . '/' . $fn, file_get_contents('php://input'));
				echo "$fn uploaded";
				exit();
			}
			else {
				if (isset($_FILES) && is_array($_FILES) && array_key_exists('formFiles', $_FILES)) {
					$number_files_send = count($_FILES['formFiles']['name']);
					$dir = '/data/' . $folderName . '/';
					
					if ($number_files_send > 0) {
						for ($i = 0; $i < $number_files_send; $i++) {
							echo '<br/>Reception of : ' . $_FILES['formFiles']['name'][$i];
							$copy = move_uploaded_file($_FILES['formFiles']['tmp_name'][$i], $dir . $_FILES['formFiles']['name'][$i]);
							if ($copy) {
								echo '<br />File ' . $_FILES['formFiles']['name'][$i] . ' copy';
							}
							else {
								echo '<br />No file to upload';
							}
						}
					}
				}   
			}
		}
	}

}