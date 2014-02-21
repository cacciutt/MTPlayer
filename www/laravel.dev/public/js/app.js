
var projectTrack = angular.module('PolytechMTPProject', ['ui.bootstrap']);
 
projectTrack.config(function($interpolateProvider) {
	$interpolateProvider.startSymbol('{*');
	$interpolateProvider.endSymbol('*}');
});


projectTrack.controller('TrackCtrl', function ($scope, $http, $modal, $log) {

	$scope.tracks = [];
	var modalInstance = null;

	// Get tracks thanks to a hidden input
	//$scope.tracks = JSON.parse(angular.element('#jsontracks').val());

	// Ajax HTTP Request
	$http.get('/track/get').success(function(data) {
		console.log(data);
		$scope.tracks = data;

		angular.element('#loading').hide(); angular.element('#app').show();
	});

	// Watches if a track is added or removed
	$scope.$watch('tracks', function() {
		$scope.remaining = $scope.tracks.length;
	}, true);


	// Remove a track
	$scope.removeTrack = function(index) {
		var track = $scope.tracks[index];

		if (confirm("Delete " + track.title + " from " + track.artist + " ?")) {
			$http.post("/track/delete", {track_id: track.id})
				.success(function(data, status, headers, config) {
	    			$scope.tracks.splice(index, 1);
				}).error(function(data, status, headers, config) {
					alert("Cannot delete this track :\n" . data);
				});
		}
	}

	// Edit a track
	$scope.editTrack = function(index) {
		var track = $scope.tracks[index];
		openDialog(false, track, index);

	}

	// Insert a track
	$scope.addTrack = function() {
		openDialog(true, 
			{
				artist: "",
				title: "",
				genre: "",
				duration: "",
				mp3_path:"",
				picture_path: "",
			});
	}

	// Opens a track dialog in creation mode or edit mode with a given track
	function openDialog (creation, track, index) {
		modalInstance = $modal.open({
			templateUrl: 'track_form.html',
	      	controller: TrackFormCtrl,
	     	resolve: {
	        	creation: function () {
	          		return creation;
	        	},
	        	track: function() {
	        		return track;
	        	},
	        	index: function() {
	        		return index;
	        	}
	      	}
    	});

    	modalInstance.result.then(function (formData) {
    		// If the track is a new one
    		if (formData.new) {

    			// Insert a new track in the database
	    		$http.post("/track/insert", formData)
				.success(function(data, status, headers, config) {
		    		formData.id = data;
	    			$scope.tracks.push(formData);
				}).error(function(data, status, headers, config) {
					alert("Cannot create this track :\n" . data);
				});

    		}
			else {
				// Update the current track
				$http.post("/track/update", formData)
				.success(function(data, status, headers, config) {
	    			//$scope.tracks.push(formData);
	    			$scope.tracks[formData.index] = formData;
				}).error(function(data, status, headers, config) {
					alert("Cannot update this track :\n" . data);
				});
				
			}


    	}, function () {
      		$log.info('Modal dismissed at: ' + new Date());
    	});
	}

	var TrackFormCtrl = function ($scope, $modalInstance, creation, track, index) {

		$scope.formTitle = creation? "Add a new track" : "Edit track";

		// Do not update the table data when setting new values
		$scope.track = angular.copy(track);

		$scope.genres = ['Genre', 'Electronic', 'Folk', 'Hip hop', 'Jazz', 'Pop', 'Rock'];

		// TODO: Set the default choice as the current one
		$scope.track.genre = $scope.genres[0];

		$scope.ok = function () {
			$scope.values = {
				id: $scope.track.id,
				artist: $scope.track.artist,
				title: $scope.track.title,
				genre: $scope.track.genre,
				duration: $scope.track.duration,
				mp3_path: $scope.track.mp3_path,
				picture_path: $scope.track.picture_path,

				new: creation,
				index: index,
			};

			$modalInstance.close($scope.values);
		};

		$scope.cancel = function () {
			$modalInstance.dismiss('cancel');
		};
	};
});
