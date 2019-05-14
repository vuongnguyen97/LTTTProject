<?php 
session_start();

if(isset($_SESSION['giohang']))
{ 
	if(isset($_GET['id']))
	{ 
		$id = $_GET['id']; 
		if($id = 0) 
		{
			unset($_SESSION['giohang']);
		}
		else
		{
			unset($_SESSION['giohang'][$id]);
		}
			$_SESSION['giohang']=array_values($_SESSION['giohang']);
			header("location:chitietgiohang.php");
		exit();
	}

}


?>