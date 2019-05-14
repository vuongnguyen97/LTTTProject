<?php include('include/header.php'); ?>
<?php include('../inc/function.php'); ?>
	<div class="row">
		<h3>Danh sách slide</h3>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<table class="table table-hover">
				<tr>
					<th>Mã</th>
					<th>Tiêu đề</th>
					<th>Ảnh slide</th>
					<th>Link</th>
					<th>Trạng thái</th>
					<th>Sữa</th>
					<th>Xóa</th>
				</tr>
				<?php 
					include("../inc/connect.php");
					$query="SELECT * FROM anhslide ORDER BY id DESC ";
					$result=mysqli_query($connect,$query);
					kt_query($result,$query); // Hàm kiểm tra có lỗi sql ko
					while ($slide1=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
					{

				?>
				<tr>
					<td><?php echo $slide1['id']; ?></td>
					<td><?php echo $slide1['title']; ?></td>
					<td><img src="../<?php echo $slide1['anhslide']; ?>" width="120" ></td>
					<td><?php echo $slide1['link']; ?></td>
					<td>
						<?php if( $slide1['status']==1){echo 'Hiển thị';}
							  else {echo 'Không hiển thị';} 	
						?>		
					</td>
					<td>
						<a href="edit_slide.php?lid=<?php echo $slide1['id']; ?>">
							<img src="../images/edit.png" width="16">
						</a>
					</td>	
					<td>
						<a onclick="return confirm('Bạn thực sự muốn xóa không');" 
						   href="delete_slide.php?id=<?php echo $slide1['id'] ?>">
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