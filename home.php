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
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkmiq2h0mAJufmug8-nBPzstefg1IRQIQ&sensor=false"></script>

		<title>Malta Pyro - Home</title>

	</head>
	<body>
		<div id="wrapper">
			<div id="map_canvas"></div>
			<div class="roundbotom_top" id="header_wrapper"></div>
			<header class="roundbotom_top">
				<div id="top_options_info">
					<div class="top_options_info_children" id="user_info">
						<img src="" alt="profpic" />
						<p>First: </p>
						<p>Last: </p>
						<p style="color: blue; cursor: pointer;">More... </p>
					</div>
					<div class="top_options_info_children" id="alerts">
						
					</div>
					<div class="top_options_info_children" id="search">
						<div id="search_container">
							<input placeholder="Enter search text here..." />
							<p class="button" id="search_button">Search</p>
						</div>
					</div>
					
				</div>
				<div class="roundbotom_top" id="menu">
					<p id="_add">Add</p>
					<p id="_edit">Edit</p>
					<p id="_delete">Delete</p>
					<p id="_more">More..</p>
				</div>
			</header>

		</div>

	</body>
	<script src="js/map_functions.js"></script>
</html>