/**
 * @author Tafadzwa Munyurwa
 */
$(document).ready(function(e) {
	$("#map_error").hide();
	var pyro_stations = [];
	var emer_sites = [];
	var curr_location = [];
	var curr_pos = [sessionStorage.getItem("geo_lat"), sessionStorage.getItem("geo_lon")];
	var map;

	initilize();

	function initilize() {
		var mapOptions = {
			zoom : 18,
			mapTypeId : google.maps.MapTypeId.ROADMAP,
			center : new google.maps.LatLng(curr_pos[0], curr_pos[1])
		};
		map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		google.maps.event.addListener(map, 'dblclick', function(e) {
			$('#lat').val(e.latLng.lat());
			$('#lon').val(e.latLng.lng());
		});

		addStationObject(StationObject(markerObject(curr_pos[0], curr_pos[1], "You are here"), "current_location"));
	}

	function StationObject(_marker, _type) {
		Station = {
			marker : _marker,
			type : _type
		}

		return Station;
	}


	window.StationObject = StationObject;

	function addStationObject(Object) {
		if (Object.type == "pyro") {
			pyro_stations.push(Object);
		} else if (Object.type == "emerg") {
			emer_sites.push(Object);
		} else if (Object.type == "current_location") {
			curr_location.push(Object)
		}

		Object.marker.setMap(map);
	}


	window.addStationObject = addStationObject;

	function markerObject(_lat, _lon, _title) {
		newMarker = new google.maps.LatLng(_lat, _lon);
		var marker = new google.maps.Marker({
			position : newMarker,
			map : map,
			title : _title,
			animation : google.maps.Animation.DROP,
		});
		google.maps.event.addListener(marker, 'click', function(e) {
			$('#lat').val(e.latLng.lat());
			$('#lon').val(e.latLng.lng());
			$('#name').val(findMarker(lat, lon).title)
		});
		return marker;
	}


	window.markerObject = markerObject;

	function findMarker(lat, lon) {
		if (pyro_stations) {
			for (i in pyro_stations) {
				if (lat == pyro_stations[i].marker.position.hb && lon == pyro_stations[i].marker.position.ib) {
					return pyro_stations[i];
				}
			}
			
			for (i in emer_sites) {
				if (lat == emer_sites[i].marker.position.hb && lon == emer_sites[i].marker.position.ib) {
					return emer_sites[i];
				}
			}

			for (i in emer_sites) {
				if (lat == curr_location[i].marker.position.hb && lon == curr_location[i].marker.position.ib) {
					return curr_location[i];
				}
			}
			return false;
		}
	}


	window.findMarker = findMarker;
});
