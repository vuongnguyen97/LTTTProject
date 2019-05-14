<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Menu</title>
		<link rel="stylesheet" href="menu/css/superfish.css" media="screen">
		<style> body { max-width: 40em; } </style>
		<script src="menu/js/jquery.js"></script>
		<script src="menu/js/hoverIntent.js"></script>
		<script src="menu/js/superfish.js"></script>
		<script>

		(function($){ //create closure so we can safely use $ as alias for jQuery

			$(document).ready(function(){

				// initialise plugin
				var example = $('#example').superfish({
					//add options here if required
				});

				// buttons to demonstrate Superfish's public methods
				$('.destroy').on('click', function(){
					example.superfish('destroy');
				});

				$('.init').on('click', function(){
					example.superfish();
				});

				$('.open').on('click', function(){
					example.children('li:first').superfish('show');
				});

				$('.close').on('click', function(){
					example.children('li:first').superfish('hide');
				});
			});

		})(jQuery);


		</script>
	</head>
	<body>
		<ul class="sf-menu" id="example">
			<li class="current">
				<a href="followed.html">menu item 1</a>
				<ul>
					<li>
						<a href="followed.html">menu item</a>
					</li>
					<li class="current">
						<a href="followed.html">long menu item sets sub width</a>
						<ul>
							<li class="current"><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
						</ul>
					</li>
					<li>
						<a href="followed.html">menu item</a>
						<ul>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
						</ul>
					</li>
					<li>
						<a href="followed.html">menu item</a>
						<ul>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li>
				<a href="followed.html">menu item 2</a>
			</li>
			<li>
				<a href="followed.html">menu item 3</a>
				<ul>
					<li>
						<a href="followed.html">menu item</a>
						<ul>
							<li><a href="followed.html">short</a></li>
							<li><a href="followed.html">short</a></li>
							<li><a href="followed.html">short</a></li>
							<li><a href="followed.html">short</a></li>
							<li><a href="followed.html">short</a></li>
						</ul>
					</li>
					<li>
						<a href="followed.html">menu item</a>
						<ul>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
						</ul>
					</li>
					<li>
						<a href="followed.html">menu item</a>
						<ul>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
						</ul>
					</li>
					<li>
						<a href="followed.html">menu item</a>
						<ul>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
						</ul>
					</li>
					<li>
						<a href="followed.html">menu item</a>
						<ul>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
							<li><a href="followed.html">menu item</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li>
				<a href="followed.html">menu item 4</a>
			</li>	
		</ul>
		
	</body>
</html>