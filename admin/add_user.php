<?php include('include/header.php'); ?>
	<div class="row">
		<?php
			$error=array(); 
			if ($_SERVER['REQUEST_METHOD']=='POST') 
			{
				if (empty($_POST['username'])) 
				{
					$error[]='username';
				}	
				else 
				{
					$username=$_POST['username'];
				}
				if (empty($_POST['password'])) {
					$error[]='password';
				}
				else {
					$password=$_POST['password'];
				}
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
					// kiểm tra username có tồn tại trong database hay chưa
                    $query_a="SELECT username FROM user WHERE username='{$username}'";
                    $result_a=mysqli_query($connect,$query_a);
                    kt_query($result_a,$query_a);
                    // kiểm tra email có tồn tại trong database hay chưa
                    $query_b="SELECT email FROM user WHERE email='{$email}'";
                    $result_b=mysqli_query($connect,$query_b);
                    kt_query($result_b,$query_b);
                    // nếu có trong database
                    if(mysqli_num_rows($result_a)==1)
                    {
                        echo '<p style="color:red">Username đã tồn tại, vui lòng đặt username khác</p>';
                    }
                    elseif(mysqli_num_rows($result_b)==1)
                    {
                        echo '<p style="color:red">Email đã tồn tại, vui lòng đặt Email khác</p>';
                    }
                    else
                    {
                        // ngược lại thêm vào database
                        $query_c="INSERT INTO user(username,password,hoten,dienthoai,email,status,level)
                          VALUES('{$username}','{$password}','{$hoten}','{$dienthoai}','{$email}',{$status},{$level})";
                        $result_c=mysqli_query($connect,$query_c);
                        kt_query($result_c,$query_c);
                        if(mysqli_affected_rows($connect)==1)
                        {
                            echo '<p style="color:green">Thêm user thành công</p>';
                        }
                        else
                        {
                            echo '<p style="color:red">Thêm user thất bại</p>';
                        }
                        $username=$password=$hoten=$dienthoai=$email=$status=$level='';
                    }
                    
				}
				else {
					echo '<p style="color:red">Bạn hãy nhập đầy đủ thông tin</p>';
				}
			} 
		?>
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
			<h3>Thêm mới user</h3>
			<form action="" method="post" name="frmadd_video">
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" placeholder="Nhập username" value="<?php if(isset($_POST['username'])){ echo ($_POST['username']); } ?>">
                    <label><?php if(isset($error) && in_array('username',$error)){ echo '<p style="color:red">Bạn chưa nhập username</p>'; } ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" placeholder="Nhập password">
					<label><?php if(isset($error) && in_array('password',$error)){echo '<p style="color:red">Bạn chưa nhập password</p>';} ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Họ Tên</label>
					<input type="text" name="hoten" class="form-control" placeholder="Nhập họ tên" value="<?php if(isset($_POST['hoten'])){ echo ($_POST['hoten']); } ?>">
					<label><?php if(isset($error) && in_array('hoten',$error)){echo '<p style="color:red">Bạn chưa nhập họ tên</p>';} ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Điện thoại</label>
					<input type="text" name="dienthoai" class="form-control" placeholder="Nhập Sdt" value="<?php if(isset($_POST['dienthoai'])){ echo ($_POST['dienthoai']); } ?>">
					<label><?php if(isset($error) && in_array('dienthoai',$error)){echo '<p style="color:red">Bạn chưa nhập số điện thoại</p>';} ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" placeholder="Nhập Email" value="<?php if(isset($_POST['email'])){ echo ($_POST['email']); } ?>">
					<label><?php if(isset($error) && in_array('email',$error)){echo '<p style="color:red">Bạn chưa nhập email</p>';} ?></label>
				</div> <!-- end form group -->
				<?php 
                    if(isset($level)==0)
                    {
                 ?>
                  <div class="form-group">
					<label style="display: block;">Thành viên</label>
					<label class="radio-inline"><input type="radio" name="level" value="1" checked="checked">Kích hoạt</label>
					<label class="radio-inline"><input type="radio" name="level" value="0">Chưa kích hoạt</label>
				</div> <!-- end form group -->
                <?php       
                    }
                    else
                    {
                ?>
                <div class="form-group">
					<label style="display: block;">Thành viên</label>
					<label class="radio-inline"><input type="radio" name="level" value="1">Kích hoạt</label>
					<label class="radio-inline"><input type="radio" name="level" value="0" checked="checked">Chưa kích hoạt</label>
				</div> <!-- end form group -->
                <?php        
                    }
                ?>
				<?php 
                    if(isset($status)==0)
                    {
                 ?>
                  <div class="form-group">
					<label style="display: block;">Trạng thái</label>
					<label class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Kích hoạt</label>
					<label class="radio-inline"><input type="radio" name="status" value="0">Chưa kích hoạt</label>
				</div> <!-- end form group -->
                <?php       
                    }
                    else
                    {
                ?>
                <div class="form-group">
					<label style="display: block;">Trạng thái</label>
					<label class="radio-inline"><input type="radio" name="status" value="1">Kích hoạt</label>
					<label class="radio-inline"><input type="radio" name="status" value="0" checked="checked">Chưa kích hoạt</label>
				</div> <!-- end form group -->
                <?php        
                    }
                ?>
				
				<input class="btn btn-primary" type="submit" name="submit" value="Thêm mới">
			</form>
		</div> <!-- end col 12 -->
	</div> <!-- end row -->
<?php include('include/footer.php'); ?>