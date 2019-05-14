<?php 
	include('../inc/connect.php');
	include('../inc/function.php');
	if (isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'>=1)))
	{
		$id=$_GET['id'];
		$query="DELETE FROM video WHERE id='{$id}'";
		$result=mysqli_query($connect,$query);
		kt_query($result,$query);
		header('location:list_video.php');
	}
	else {
		header('location:list_video.php');	
	}
 ?>