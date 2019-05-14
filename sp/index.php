<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset='utf-8'>

<head>
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

	<!-- META ===================================================== -->
	<title>Smooth Products Demo</title>
	<meta name="description" content="A lightweight and dead simple lightbox script">

	<!-- Favicon  ========================================== -->
	<link rel="icon" href="favicon.ico">

	<!-- CSS ====================================================== -->
	<link rel="stylesheet" href="sp/css/smoothproducts.css">
	<!-- Demo CSS (don't use) -->
</head>

<body>
		<div class="sp-wrap">
			<a href="images/sanpham/tvbox/vibox v1 pro/1.jpg"><img src="images/sanpham/tvbox/vibox v1 pro/1.jpg" alt=""></a>
			<a href="images/sanpham/tvbox/vibox v1 pro/2.jpg"><img src="images/sanpham/tvbox/vibox v1 pro/2.jpg" alt=""></a>
			<a href="images/sanpham/tvbox/vibox v1 pro/3.jpg"><img src="images/sanpham/tvbox/vibox v1 pro/3.jpg" alt=""></a>
			<a href="images/sanpham/tvbox/vibox v1 pro/4.jpg"><img src="images/sanpham/tvbox/vibox v1 pro/4.jpg" alt=""></a>
			<a href="images/sanpham/tvbox/vibox v1 pro/5.jpg"><img src="images/sanpham/tvbox/vibox v1 pro/5.jpg" alt=""></a>
			<a href="images/sanpham/tvbox/vibox v1 pro/0.jpg"><img src="images/sanpham/tvbox/vibox v1 pro/0.jpg" alt=""></a>
		</div>

	<!-- JS ======================================================= -->
	<script type="text/javascript" src="sp/js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="sp/js/smoothproducts.min.js"></script>
	<script type="text/javascript">
	/* wait for images to load */
	$(window).load(function() {
		$('.sp-wrap').smoothproducts();
	});
	</script>

</body>

</html>
