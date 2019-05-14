<?php ob_start();?>
<?php include('include/header.php');?>
	<div class="row">
		<?php
        include("../inc/connect.php");
        include("../inc/function.php");
        if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range')>=1))
        {
            $id=$_GET['id'];
            $query_id="SELECT id,username FROM user WHERE id={$id} ";
            $result_id=mysqli_query($connect,$query_id);
            kt_query($result_id,$query_id);
            if(mysqli_num_rows($result_id)==1)
            {
                list($id,$username)=mysqli_fetch_array($result_id,MYSQLI_NUM);
            }
            else
            {
                echo "<p style='color:red'>ID không tồn tại</p>";
            }
        }
        else
        {
            header("location:list_user.php");
            exit();
        }
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $status=$_POST['status'];
            $passwordnew=($_POST['passwordnew']);//mã hóa md5 và tách khoản trắng bằng trim
            $query="SELECT id,username,status FROM user WHERE id='{$id}'";
            $result=mysqli_query($connect,$query);
            kt_query($result,$query);
                // nếu người dùng nhập mật khẩu mới ko trùng khớp, hàm trim để tách khoảng trắng
                if(trim($_POST['passwordnew'])!=trim($_POST['passwordre']))
                {
                    echo "<p style='color:red'>Mật khẩu mới không khớp</p>";
                }
                else // ngược lại insert vô database
                {
                    $query_a="UPDATE user 
                                SET password='{$passwordnew}',
                                status={$status}
                                WHERE id='{$id}'";
                    $result_a=mysqli_query($connect,$query_a);
                    kt_query($result_a,$query_a);
                    // đưa ra thông báo thành công hay không
                    if(mysqli_affected_rows($connect)==1)
                    {
                        echo "<p style='color:green'>Khôi phục mật khẩu thành công</p>";
                    }
                    else
                    {
                        echo "<p style='color:red'>Khôi phục mật khẩu không thành công</p>";
                    }
                }
        }
			
		?>
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
			<h3>Khôi phục mật khẩu</h3>
			<form action="" method="post" name="frmadd_video">
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" placeholder="username" value="<?php if(isset($username)){ echo $username; } ?>" disabled="true">
                    <label><?php if(isset($error) && in_array('username',$error)){ echo '<p style="color:red">Bạn chưa nhập username</p>'; } ?></label>
				</div> <!-- end form group -->
				
				<div class="form-group">
					<label>Mật khẩu mới</label>
					<input type="password" name="passwordnew" class="form-control" placeholder="Mật khẩu mới" value="">
                    <label><?php if(isset($error) && in_array('username',$error)){ echo '<p style="color:red">Bạn chưa nhập username</p>'; } ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Nhập lại mật khẩu</label>
					<input type="password" name="passwordre" class="form-control" placeholder="Nhập lại mật khẩu mới" value="">
                    <label><?php if(isset($error) && in_array('username',$error)){ echo '<p style="color:red">Bạn chưa nhập username</p>'; } ?></label>
				</div> <!-- end form group -->
				<?php 
                    if(isset($status)==1)
                    {
                 ?>
                  <div class="form-group">
					<label style="display: block;">Trạng thái</label>
					<label class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Hiển thị</label>
					<label class="radio-inline"><input type="radio" name="status" value="0">Không hiển thị</label>
				</div> <!-- end form group -->
                <?php       
                    }
                    else
                    {
                ?>
                <div class="form-group">
					<label style="display: block;">Trạng thái</label>
					<label class="radio-inline"><input type="radio" name="status" value="1">Hiển thị</label>
					<label class="radio-inline"><input type="radio" name="status" value="0" checked="checked">Không hiển thị</label>
				</div> <!-- end form group -->
                <?php        
                    }
                ?>
				
				<input class="btn btn-primary" type="submit" name="submit" value="Thêm mới">
			</form>
		</div> <!-- end col 12 -->
	</div> <!-- end row -->
<?php include('include/footer.php'); ?>
<?php ob_flush(); ?>