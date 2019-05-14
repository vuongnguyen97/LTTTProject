<?php ob_start(); ?>
<?php include('include/header.php'); ?>
<?php 
	// nếu tồn tại $_GET['id'] và là số nguyên nằm trong mảng phải lớn hơn
	if (isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'>=1))) 
	{
			$id=$_GET['id'];
	}
	else {
		header("location:list_video.php");
		exit();
	}
 ?>
	<div class="row">
		<?php
			$error=array(); 
			$error['title']=$error['link']=$error['orthernum']=NULL;
			$title=$link=$orthernum=$status=NULL;
			if (isset($_POST['submit'])) 
			{
				if (empty($_POST['title'])) 
				{
					$error['title']='Trường tiêu đề không được bỏ trống';		
				}	
				else 
				{
					$title=$_POST['title'];
				}
				if (empty($_POST['link'])) {
					$error['link']='Trường link video không được bỏ trống';
				}
				else {
					$link=$_POST['link'];
				}
				if (empty($_POST['orthernum'])) {
					$orthernum=0;
				}
				else {
					$orthernum=$_POST['orthernum'];
				}
				$status=$_POST['status'];
				if ($title && $link && $orthernum && $status ) 
				{
					include("../inc/connect.php");
					$query="UPDATE video
							SET title='{$title}',
								link='{$link}',
								orthernum={$orthernum},
								status={$status} 
							WHERE id={$id}";
					$result=mysqli_query($connect,$query) or die("Lỗi rồi {$query}".mysqli_error($connect));
					echo '<p style="color:green">Sửu video thành công</p>';
				}
				else {
					echo '<p style="color:red">Sửu không thành công</p>';
				}
			} 
			include("../inc/connect.php");
			$query_id="SELECT title,link,orthernum,status FROM video WHERE id={$id}";
			$result_id=mysqli_query($connect,$query_id);
			//kiểm tra id có tồn tại không
			if (mysqli_num_rows($result_id)==1) 
			{
				list($title,$link,$orthernum,$status)=mysqli_fetch_array($result_id,MYSQLI_NUM);	
			}
			else {
				echo '<p style="color:red">ID không tồn tại</p>';
			}
		?>
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
			<h3>Sửa video <?php if(isset($title)){ echo ($title); } ?></h3>
			<form action="" method="post" name="frmadd_video">
				<div class="form-group">
					<label>Tiêu đề</label>
					<input type="text" name="title" class="form-control" placeholder="Tiều đề" value="<?php if(isset($title)){ echo ($title); } ?>">
					<p style="color: red"><?php echo $error['title']; ?></p>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Link</label>
					<input type="text" name="link" class="form-control" placeholder="Link" value="<?php if(isset($link)){ echo ($link); } ?>">
					<p style="color: red"><?php echo $error['link']; ?></p>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Thứ tự</label>
					<input type="text" name="orthernum" class="form-control" placeholder="Thứ tự" value="<?php if(isset($orthernum)){ echo ($orthernum); } ?>">
					<p style="color: red"><?php echo $error['orthernum']; ?></p>
				</div> <!-- end form group -->
				<div class="form-group">
					<label style="display: block;">Trạng thái</label>
					<?php 
						if ($status==1) 
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
					<label class="radio-inline"><input type="radio" name="status" value="0" checked="checked">Không hiển thị</label>
					<?php		
						}
					 ?>	
				</div> <!-- end form group -->
				<input class="btn btn-primary" type="submit" name="submit" value="Sửa video">
			</form>
		</div> <!-- end col 12 -->
	</div> <!-- end row -->
<?php include('include/footer.php'); ?>
<?php ob_flush(); ?>