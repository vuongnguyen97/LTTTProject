<?php 
    include("../inc/connect.php");
    include("../inc/function.php");
// kiểm tra id có tồn tại và là số nguyên hay không, mảng từ 1
    if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'>1)))
    {
        $id=$_GET['id'];
        $query="SELECT anhslide,anh_thumb FROM anhslide WHERE id={$id}";
        $result=mysqli_query($connect,$query);
        kt_query($result,$query);
        // truy xuất vào bảng db với 1 dữ liệu đỡ tốn bộ nhớ hơn fetch_array
        $anh=mysqli_fetch_array($result);
        // xóa ảnh trong thư mục
        unlink('../'.$anh['anhslide']);
		unlink('../'.$anh['anh_thumb']);
        $query1="DELETE FROM anhslide WHERE id={$id}";
        $result1=mysqli_query($connect,$query1);
        kt_query($result1,$query1);
        header("location:list_slide.php");
    }
    else
    {
        header("location:list_slide.php");
    }
?>