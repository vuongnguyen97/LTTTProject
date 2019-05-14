<?php include('include/header.php'); ?>
<?php include('../inc/function.php'); ?>
	<div class="row">
		<h3>Danh sách video</h3>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<table class="table table-hover">
				<tr>
					<th>Mã</th>
					<th>Tiêu đề</th>
					<th>Link</th>
					<th>Thứ tự</th>
					<th>Trạng thái</th>
					<th>Sữa</th>
					<th>Xóa</th>
				</tr>
				<?php 
					include("../inc/connect.php");
					$query="SELECT * FROM video ORDER BY orthernum DESC ";
					$result=mysqli_query($connect,$query);
					kt_query($result,$query); // Hàm kiểm tra có lỗi sql ko
					while ($video=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
					{

				?>
				<tr>
					<td><?php echo $video['id']; ?></td>
					<td><?php echo $video['title']; ?></td>
					<td><?php echo $video['link']; ?></td>
					<td><?php echo $video['orthernum']; ?></td>
					<td>
						<?php if( $video['status']==1){echo 'Hiển thị';}
							  else {echo 'Không hiển thị';} 	
						?>		
					</td>
					<td>
						<a href="edit_video.php?id=<?php echo $video['id']; ?>">
							<img src="../images/edit.png" width="16">
						</a>
					</td>	
					<td>
						<a onclick="return confirm('Bạn thực sự muốn xóa không');" 
						   href="delete_video.php?id=<?php echo $video['id'] ?>">
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