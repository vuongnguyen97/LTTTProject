<?php include('include/header.php');
 
?>
	<div class="row">
		<?php
        include("../inc/connect.php");
        //include("../inc/function.php");
			$error=array(); 
            if($_GET['id'] && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range')>=1))
            {
                $id=$_GET['id'];
               
                // đổ dữ liệu ra ổ 
                $query_d="SELECT username,hoten,dienthoai,email,status FROM user WHERE id={$id}";
                $result_d=mysqli_query($connect,$query_d);
                //kt_query($result_d,$query_d);
                // kiểm tra id có tồn tại không
                if(mysqli_num_rows($result_d)==1)
                {
                    list($username,$hoten,$dienthoai,$email,$status)=mysqli_fetch_array($result_d,MYSQLI_NUM);
                }
                else
                {
                    echo '<p style="color:red">ID không tồn tại</p>';
                }
            }
            else
            {
                header("location:list_user.php");
                exit();
            }
			if ($_SERVER['REQUEST_METHOD']=='POST') 
			{
				
				if (empty($_POST['hoten'])) {
					$error[]='hoten';
				}
				else {
					$hoten=$_POST['hoten'];
				}
                if (empty($_POST['dienthoai'])) {
					$error[]='dienthoai';
				}
				else {
					$dienthoai=$_POST['dienthoai'];
				}
                
				if (empty($_POST['email'])) {
					$error[]='email';
				}
				else {
					$email=$_POST['email'];
				}
                if (empty($_POST['level'])) {
					$error[]='level';
				}
				else {
					$level=$_POST['level'];
				}
                if (empty($_POST['status'])) {
					$error[]='status';
				}
				else {
					$status=$_POST['status'];
				}
				if (empty($error)) 
				{
					include("../inc/connect.php");
					include("../inc/function.php");
					
                    // kiểm tra email có tồn tại trong database hay chưa
                   // $query_b="SELECT email FROM user WHERE email='{$email}'";
                   // $result_b=mysqli_query($connect,$query_b);
                   // kt_query($result_b,$query_b);
                    // nếu có trong database
                 //   if(mysqli_num_rows($result_b)==1)
                   // {
                   //     echo '<p style="color:red">Email đã tồn tại, vui lòng đặt Email khác</p>';
                  //  }
                 //   else
                 //   {
                        // ngược lại thêm vào database
                        $query_c="UPDATE user
                                    SET username='{$username}',
                                        hoten='{$hoten}',
                                        dienthoai='{$dienthoai}',
                                        email='{$email}',
                                        status={$status},
                                        level={$level}
                                    WHERE id={$id}";
                        $result_c=mysqli_query($connect,$query_c);
                        kt_query($result_c,$query_c);
                        if(mysqli_affected_rows($connect)==1)
                        {
                            echo '<p style="color:green">Sửa user thành công</p>';
                        }
                        else
                        {
                            echo '<p style="color:red">Bạn chưa sửa gì</p>';
                        }
                        $username=$password=$hoten=$dienthoai=$email=$status=$level='';
                  //  }
                    
				}
				else 
                {
					echo '<p style="color:red">Bạn hãy nhập đầy đủ thông tin</p>';
				}
                
			} 
		?>
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
			<h3>Sửa user</h3>
			<form action="" method="post" name="frmadd_video">
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" placeholder="username" value="<?php if(isset($username)){ echo $username; } ?>" disabled="true">
                    <label><?php if(isset($error) && in_array('username',$error)){ echo '<p style="color:red">Bạn chưa nhập username</p>'; } ?></label>
				</div> <!-- end form group -->
				
				<div class="form-group">
					<label>Họ Tên</label>
					<input type="text" name="hoten" class="form-control" placeholder="" value="<?php if(isset($hoten)){ echo $hoten; } ?>">
					<label><?php if(isset($error) && in_array('hoten',$error)){echo '<p style="color:red">Bạn chưa nhập họ tên</p>';} ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Điện thoại</label>
					<input type="text" name="dienthoai" class="form-control" placeholder="" value="<?php if(isset($dienthoai)){ echo $dienthoai; } ?>">
					<label><?php if(isset($error) && in_array('dienthoai',$error)){echo '<p style="color:red">Bạn chưa nhập số điện thoại</p>';} ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" placeholder="" value="<?php if(isset($email)){ echo $email; } ?>">
					<label><?php if(isset($error) && in_array('email',$error)){echo '<p style="color:red">Bạn chưa nhập email</p>';} ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Level</label>
					<input type="text" name="level" class="form-control" placeholder="0 or 1">
					<label><?php if(isset($error) && in_array('level',$error)){echo '<p style="color:red">Bạn chưa nhập level</p>';} ?></label>
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