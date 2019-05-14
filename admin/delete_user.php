<?php include('../inc/connect.php'); ?>
<?php include('../inc/function.php'); ?>
<?php 
    if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range')>=1))
    {
        $id=$_GET['id'];
        $query="DELETE FROM user WHERE id={$id}";
        $result=mysqli_query($connect,$query);
        kt_query($result,$query);
        header("location:list_user.php");
    }
    else
    {
        header("location:list_user.php");
    }
?>
