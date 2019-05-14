<?php include('include/header.php'); ?>
<?php include('../inc/function.php'); ?>
	<div class="row">
		<h3>Danh sách bài viết</h3>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<table class="table table-hover">
				<tr>
					<th>Mã</th>
					<th>Danh mục bài viết</th>
					<th>Tiêu đề</th>
					<th>Ảnh</th>
					<th>Lượt xem</th>
					<th>Ngày đăng</th>
					<th>Giờ đăng</th>
					<th>Thứ tự</th>
					<th>Trạng thái</th>
					<th>Sữa</th>
					<th>Xóa</th>
				</tr>
				<?php 
					include("../inc/connect.php");
					
					$query1="SELECT * FROM baiviet ORDER BY orthernum DESC";
					$result1=mysqli_query($connect, $query1);
					// hàm kiểm tra lỗi mysql
					kt_query($result1, $query1);
					while ($listbaiviet=mysqli_fetch_array($result1, MYSQLI_ASSOC)) 
					{					
				?>
				<tr>
					<td><?php echo $listbaiviet['id']; ?></td>
					<td><?php echo $listbaiviet['danhmucbaiviet']; ?></td>
					<td><?php echo $listbaiviet['title']; ?></td>
					<td><img src="../<?php echo $listbaiviet['hinhanh']; ?>" width="100"/></td>
					<td><?php echo $listbaiviet['view']; ?></td>
					<td><?php echo $listbaiviet['ngaydang']; ?></td>
					<td><?php echo $listbaiviet['giodang']; ?></td>
					<td><?php echo $listbaiviet['orthernum']; ?></td>
					<td><?php echo $listbaiviet['status']; ?></td>
					<td>
						<a href="edit_baiviet.php?id=<?php echo $listbaiviet['id']; ?>">
							<img src="../images/edit.png" width="16">
						</a>
					</td>	
					<td>
						<a onclick="return confirm('Bạn thực sự muốn xóa không');" 
						   href="delete_baiviet.php?id=<?php echo $listbaiviet['id']; ?>">
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