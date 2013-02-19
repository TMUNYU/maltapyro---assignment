<!DOCTYPE html>
<html>
	<head>
		<meta name="description" content="Emergency system for Malta's pyrotechnics industry">
		<meta name="keywords" content="Malta, Pyrotechnics, Malta Emergency system">
		<meta name="author" content="Tafadzwa Munyurwa">
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/shared.css">
		<link rel="stylesheet" type="text/css" href="css/home.css">
		<link rel="stylesheet" type="text/css" href="css/map_edit.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkmiq2h0mAJufmug8-nBPzstefg1IRQIQ&sensor=false"></script>
		<title>Malta Pyro - Home</title>

	</head>
	<body>
		<div id="wrapper">
			<div id="map_canvas"></div>
			<div id="header_wrapper"></div>
			<header class="statics">
				<div id="prof_pic_wrapper">
					<img id="prof_pic" src="#" alt="Smiley face">
				</div>
				<div id="banner">
					<div id="prof_brief">
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
					<div id="alerts">

					</div>
					<div id="search">
						<input  placeholder="Enter search text."/>
						<p class="button">
							Search
						</p>
					</div>
				</div>
			</header>
			<div class="menu" id="menu_back"></div>
			<div class="menu" class="statics">
				<p class="button"  id="_add">
					Add
				</p>
				<p class="button" id="_edit">
					Edit
				</p>
				<p class="button" id="_delete">
					Delete
				</p>
				<p class="button" id="_more">
					More...
				</p>
			</div>
		</div>

	</body>
	<script src="js/map_functions.js"></script>
</html>