<?php include('include/header.php');
 
?>
	<div class="row">
		<?php
        include("../inc/connect.php");
        include("../inc/function.php");
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $password=$_POST['password'];//mật khẩu cũ, 
            $passwordnew=($_POST['passwordnew']);//mã hóa md5 và tách khoản trắng bằng trim
            $query="SELECT id,username FROM user WHERE id='{$_SESSION['uid']}' AND password='{$password}' ";
            $result=mysqli_query($connect,$query);
            kt_query($result,$query);
            // kiểm tra mật khẩu cũ có giống trong database
            if(mysqli_num_rows($result)==1)
            {
                // nếu người dùng nhập mật khẩu mới ko trùng khớp, hàm trim để tách khoảng trắng
                if(trim($_POST['passwordnew'])!=trim($_POST['passwordre']))
                {
                    echo "<p style='color:red'>Mật khẩu mới không khớp</p>";
                }
                else // ngược lại insert vô database
                {
                    $query_a="UPDATE user 
                                SET password='{$passwordnew}'
                                WHERE id='{$_SESSION['uid']}'";
                    $result_a=mysqli_query($connect,$query_a);
                    kt_query($result_a,$query_a);
                    // đưa ra thông báo thành công hay không
                    if(mysqli_affected_rows($connect)==1)
                    {
                        echo "<p style='color:green'>Đổi mật khẩu thành công</p>";
                    }
                    else
                    {
                        echo "<p style='color:red'>Đổi mật khẩu không thành công</p>";
                    }
                }
            }
            else
            {
                echo "<p style='color:red'>Mật khẩu cũ không đúng</p>";
            }
        }
			
		?>
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
			<h3>Đổi mật khẩu</h3>
			<form action="" method="post" name="frmadd_video">
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" placeholder="username" value="<?php if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?>" disabled="true">
                    <label><?php if(isset($error) && in_array('username',$error)){ echo '<p style="color:red">Bạn chưa nhập username</p>'; } ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Mật khẩu cũ</label>
					<input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu cũ" value="<?php if(isset($username)){ echo $username; } ?>">
                    <label><?php if(isset($error) && in_array('username',$error)){ echo '<p style="color:red">Bạn chưa nhập username</p>'; } ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Mật khẩu mới</label>
					<input type="password" name="passwordnew" class="form-control" placeholder="Nhập mật khẩu mới" value="<?php if(isset($username)){ echo $username; } ?>">
                    <label><?php if(isset($error) && in_array('username',$error)){ echo '<p style="color:red">Bạn chưa nhập username</p>'; } ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Nhập lại mật khẩu</label>
					<input type="password" name="passwordre" class="form-control" placeholder="Nhập lại mật khẩu mới" value="<?php if(isset($username)){ echo $username; } ?>">
                    <label><?php if(isset($error) && in_array('username',$error)){ echo '<p style="color:red">Bạn chưa nhập username</p>'; } ?></label>
				</div> <!-- end form group -->
				
				<div class="form-group">
					<label style="display: block;">Trạng thái</label>
					<label class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Hiển thị</label>
					<label class="radio-inline"><input type="radio" name="status" value="0">Không hiển thị</label>
				</div> <!-- end form group -->
				<input class="btn btn-primary" type="submit" name="submit" value="Thêm mới">
			</form>
		</div> <!-- end col 12 -->
	</div> <!-- end row -->
<?php include('include/footer.php'); ?>