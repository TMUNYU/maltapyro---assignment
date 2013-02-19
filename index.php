<!DOCTYPE html>
<html>
	<head>
		<meta name="description" content="Emergency system for Malta's pyrotechnics industry">
		<meta name="keywords" content="Malta, Pyrotechnics, Malta Emergency system">
		<meta name="author" content="Tafadzwa Munyurwa">
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" type="text/css" href="css/shared.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<title>Malta Pyro - Home</title>

	</head>
	<body>
		<div id="wrapper">
			<div id="header_wrapper"></div>
			<header>
				<input class="field" id="username" input type="text" placeholder="User Name">
				</input>
				<input class="field" id = "password" input type="password" placeholder="Password">
				</input>
				<p class="button" id="login_button">
					Login
				</p>
				<p class="button" id="more">
					More...
				</p>
			</header>
				<p id="error">

				</p>
				<p id="circle">
					We
				</p>
				<p id="other_1" class="other">
					Save lives
				</p>
				<p id="other_2" class="other">
					by the byte...
				</p>
		</div>

	</body>
	<script>
		$('#login_button').click(function(event) {
			var usn = $('#username').val();
			var pass = $('#password').val();
			$.ajax({
				type : "POST",
				url : "php/login.php",
				data : "username=" + usn + "&password=" + pass,
				success : function(html) {
					if (html == true) {
						window.open("homemap.php", "_self", "fullscreen=yes");
						sessionStorage.current_user = usn;
					} else {
						$('#error').empty().append(html);
					}
				},
			});
		});
	</script>
</html>