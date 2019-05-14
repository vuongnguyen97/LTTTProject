<?php include('include/header.php'); ?>
<?php include('../inc/function.php'); ?>
	<div class="row">
		<h3>Danh sách tài khoản</h3>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<table class="table table-hover">
				<tr>
					<th>Mã</th>
					<th>Username</th>
					<th>Password</th>
					<th>Họ tên</th>
					<th>Điện thoại</th>
					<th>Email</th>
					<th>Trạng thái</th>
					<th>Level</th>
					<th>Reset mật khẩu</th>
					<th>Sữa</th>
					<th>Xóa</th>
				</tr>
				<?php 
					include("../inc/connect.php");
					$query="SELECT * FROM user ORDER BY id DESC ";
					$result=mysqli_query($connect,$query);
					kt_query($result,$query); // Hàm kiểm tra có lỗi sql ko
					while ($user=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
					{

				?>
				<tr>
					<td><?php echo $user['id']; ?></td>
					<td><?php echo $user['username']; ?></td>
					<td><?php echo $user['password']; ?></td>
					<td><?php echo $user['hoten']; ?></td>
					<td><?php echo $user['dienthoai']; ?></td>
					<td><?php echo $user['email']; ?></td>
					<td>
						<?php if( $user['status']==1){echo 'Hiển thị';}
							  else {echo 'Không hiển thị';} 	
						?>		
					</td>
					<td><?php echo $user['level']; ?></td>
					<td>
						<a href="reset_pass.php?id=<?php echo $user['id']; ?>">
							<img src="../images/reset.png" width="16" align="center">
						</a>
					</td>
					<td>
						<a href="edit_user.php?id=<?php echo $user['id']; ?>">
							<img src="../images/edit.png" width="16">
						</a>
					</td>	
					<td>
						<a onclick="return confirm('Bạn thực sự muốn xóa không');" 
						   href="delete_user.php?id=<?php echo $user['id'] ?>">
							<img src="../images/delete.png" width="16">
						</a>
					</td>
									
				</tr>
				<?php
					}
				 ?>
			</table>
		</div>
	</div>
<?php include('include/footer.php'); ?>