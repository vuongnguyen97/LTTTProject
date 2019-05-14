<?php 
session_start();

if(isset($_SESSION['giohang']))
{ 
	if(isset($_GET['cid']))
	{ 
		$id = $_GET['cid']; 
		if($id = 0) 
		{
			unset($_SESSION['giohang']);
		}
		else
		{
			unset($_SESSION['giohang'][$id]);
		}
		
			$_SESSION['giohang']=array_values($_SESSION['giohang']);
			header("location:index.php");

		exit();
	}

}


?>