<?php include('include/header.php'); 
    include('../inc/Images.class.php');
    include('../inc/function.php');
    include('../inc/connect.php');
    ?>
<style>
    .required
    {
    color: red;
    }
</style>
<div class="row">
    <?php
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
        	$errors=array();
        	if(empty($_POST['title']))
        	{
        		$errors[]='title';
        	}
        	else
        	{
        		$title=$_POST['title'];
        	}
        	$status=$_POST['status'];
        	if(empty($errors))
        		{
        			$query_name="SELECT * FROM menu WHERE menu_name='{$title}' LIMIT 1";
        			$result_name=mysqli_query($connect,$query_name);
        			kt_query($result_name,$query_name);
        			if(mysqli_affected_rows($connect)==1)
        			{
        				echo "<p style='color:green;'>Tên danh mục đã tồn tại</p>";	
        			}
        			else
        			{
        			$query="INSERT INTO menu(menu_name,status) 
        			VALUES('{$title}',$status)";
        
        			$results=mysqli_query($connect,$query);
        			kt_query($results,$query);
        			if(mysqli_affected_rows($connect)==1)
        			{
        				echo "<p style='color:green;'>Thêm mới thành công</p>";	
        			}
        			else 
        			{
        				echo "<p>Thêm mới không thành công</p>";
        				header('location: add_catelogy.php');
        			}
        			}
        			$_POST['title']='';
        		}
        	else
        	{
        		$message="<p class='required'>Bạn hãy nhập đầy đủ thông tin</p>";
        	}
        }
        ?>
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <?php
            if(isset($message))
            {
            	echo $message;
            }
            ?>
        <h3>Thêm danh mục</h3>
        <form action="" method="post" name="frmadd_video" enctype="multipart/form-data">
            <div class="form-group" >
                <label>Tên danh mục</label>
                <input type="text" name="title" class="form-control" value="<?php if(isset($_POST['title'])){echo $_POST['title'];}?>" placeholder="Nhập tên danh mục">
                <label><?php
                    if(isset($errors) && in_array('title',$errors))
                    {
                    	echo "<p class='required'>Bạn chưa nhập tên danh mục</p>";
                    }
                    ?></label>
            </div>
            <div class="form-group">
                <label style="display: block;">Trạng thái</label>
                <label class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Hiển thị</label>
                <label class="radio-inline"><input type="radio" name="status" value="0">Không hiển thị</label>
            </div>
            <!-- end form group -->
            <input class="btn btn-primary" type="submit" name="submit" value="Thêm mới">
        </form>
    </div>
    <!-- end col 12 -->
</div>
<!-- end row -->
<?php include('include/footer.php'); ?>