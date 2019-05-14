<?php 
	$connect=mysqli_connect("localhost","root","","cuoiki");
	if (!$connect) 
	{
		echo 'kết nối thất bại';	
	}
	else 
	{
		mysqli_set_charset($connect,'utf8');	
	}
 ?>