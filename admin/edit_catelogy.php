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
        if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
           {
         	$id=$_GET['id'];
           }
        else
        {
        	header('Location: list_catelogy.php');
        	exit();
        }
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
        			//Kiểm tra trùng db
        			
        			$query="UPDATE menu
        			SET menu_name='{$title}',
        				home={$status}
        			WHERE id={$id}
        				";
        
        			$results=mysqli_query($connect,$query);
        			kt_query($results,$query);
        			if(mysqli_affected_rows($connect)==1)
        			{
        				echo "<p style='color:green;'>Sửa thành công</p>";	
        			}
        			else 
        			{
        				echo "<p>Sửa không thành công</p>";
        				header('location: add_catelogy.php');
        			}
        			}
        			$_POST['title']='';
        		}
        	else
        	{
        		$message="<p class='required'>Bạn hãy nhập đầy đủ thông tin</p>";
        	}
			
   
        ?>
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <?php
            if(isset($message))
            {
            	echo $message;
            }$query_e="SELECT * FROM menu WHERE id={$id}";
   			$result_e=mysqli_query($connect,$query_e);
			$menu=mysqli_fetch_array($result_e);
            ?>
        <h3>Sửa danh mục</h3>
        <form action="" method="post" name="frmadd_video" enctype="multipart/form-data">
            <div class="form-group" >
                <label>Tên danh mục</label>
                <input type="text" name="title" class="form-control" value="<?php echo $menu['menu_name'] ?>" placeholder="Nhập tên danh mục">
                <label><?php
                    if(isset($errors) && in_array('title',$errors))
                    {
                    	echo "<p class='required'>Bạn chưa nhập tên danh mục</p>";
                    }
                    ?></label>
            </div>
            <div class="form-group">
                <label style="display: block;">Trạng thái</label> 
                    <?php if( $menu['home']==1)
                    {
                    ?>
                    <label class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Hiển thị</label>
                    <label class="radio-inline"><input type="radio" name="status" value="0">Không hiển thị</label>
                    <?php    
                    }
                      else 
                      {   
                    ?> 
                    <label class="radio-inline"><input type="radio" name="status" value="1">Hiển thị</label>
                    <label class="radio-inline"><input type="radio" name="status" value="0">Không hiển thị</label>
                    <?php 
                        }
                     ?> 
                
                
            </div>
            <!-- end form group -->
            <input class="btn btn-primary" type="submit" name="submit" value="Sửa">
        </form>
    </div>
    <!-- end col 12 -->
</div>
<!-- end row -->
<?php include('include/footer.php'); ?>