<!DOCTYPE html>
<html>
	<head>
		<meta name="description" content="Emergency system for Malta's pyrotechnics industry">
		<meta name="keywords" content="Malta, Pyrotechnics, Malta Emergency system">
		<meta name="author" content="Tafadzwa Munyurwa">
		<meta charset="UTF-8">

		<link rel="stylesheet" type="text/css" href="css/home.css">
		<link rel="stylesheet" type="text/css" href="css/shared.css">
		<link rel="stylesheet" type="text/css" href="css/map_edits.css">
	
		<script src="js/commonFuncions.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkmiq2h0mAJufmug8-nBPzstefg1IRQIQ&sensor=false"></script>
		

		<title>Malta Pyro - Home</title>

		<script>
			var i = sessionStorage.getItem("hasrun");
			if ( typeof (Storage) !== "undefined") {
				if (i == null) {
					sessionStorage.setItem("hasrun", "first");
					i = sessionStorage.getItem("hasrun");
				}
				if (navigator.geolocation) {
					if (i == "first")
						navigator.geolocation.getCurrentPosition(geo_success, geo_fail);
				} else {
					alert("Your browser does not support Geolocation!");
				}
			} else {
				document.getElementById("map_error").innerHTML = "Sorry, your browser does not support web storage. As a result you will not be able to have the weather report!";
			}
			function geo_success(pos) {
				var lat = pos.coords.latitude;
				var lon = pos.coords.longitude;
				sessionStorage.geo_lat = lat;
				sessionStorage.geo_lon = lon;
				if (i == "first") {
					window.location.reload();
					sessionStorage["hasrun"] = "morethanOnce";
					i = sessionStorage.getItem("hasrun");
				}
			}

			function geo_fail(error) {
				switch(error.code) {
					case error.TIMEOUT:
						showError("A timeout occured! Please try again!");
						break;
					case error.POSITION_UNAVAILABLE:
						showError('We can\'t detect your location. Sorry!');
						break;
					case error.PERMISSION_DENIED:
						showError('Please allow geolocation access for this to work.');
						break;
					case error.UNKNOWN_ERROR:
						showError('An unknown error occured!');
						break;
				}
			}

			function showError(msg) {
				document.getElementById("map_error").innerHTML = msg;
			}
		</script>

	</head>
	<body>
		<div id="wrapper">
			<div id="map_canvas"></div>
			<p id="map_error">

			</p>
			<div class="lightbox" id="lightbox_back">

			</div>
			<div class="lightbox"  id="lightbox_main">

				<div id="lightbbox_left">
					<input class="text_inputs" id="lat" placeholder="Latitude" type="number" required="true"/>
					<input class="text_inputs" id="lon" placeholder="Longitude" type="number" required="true"/>
					<input class="text_inputs" id="siteName" placeholder="Name" required="true"/>
				</div>
				<div id="lightbbox_right">
					<textarea id="siteDesc" type="text" placeholder="Site decription..." required="true"></textarea>
				</div>
				<div id="lightbbox_bottom1">
					<p class="checkbox_inputs">
						Pyro Station
						<input id="pyroStation" type="checkbox"/>
					</p>
					<p class="checkbox_inputs">
						Emergancy Station
						<input id="emergStation" type="checkbox"/>
					</p>
				</div>

				<div id="lightbbox_bottom2">
					<p class="sve_button" id="save">
						Save
					</p>
					<p class="sve_button" id="cancle">
						Cancle
					</p>
				</div>
			</div>
			<div class="roundbotom_top" id="header_wrapper"></div>
			<header class="roundbotom_top">
				<div id="top_options_info">
					<div class="top_options_info_children" id="user_info">
						<img src="" alt="profpic" />
						<p>
							First:
						</p>
						<p>
							Last:
						</p>
						<p style="color: blue; cursor: pointer;">
							More...
						</p>
					</div>
					<div class="top_options_info_children" id="alerts">

					</div>
					<div class="top_options_info_children" id="search">
						<div id="search_container">
							<input id="search_box" type="text" placeholder="Enter search text here..." />
							<p class="button" id="search_button">
								Search
							</p>
						</div>
					</div>

				</div>
				<div class="roundbotom_top" id="menu">
					<p id="_add">
						Add
					</p>
					<p id="_edit">
						Edit
					</p>
					<p id="_delete">
						Delete
					</p>
					<p id="_more">
						More..
					</p>
				</div>
			</header>

		</div>

	</body>
	<script src="js/map_functions.js"></script>
	<script src="js/buttons.js"></script>
</html>