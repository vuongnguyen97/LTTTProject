<?php include('include/header.php'); ?>
	<div class="row">
		<?php
			$error=array(); 
			if ($_SERVER['REQUEST_METHOD']=='POST') 
			{
				if (empty($_POST['title'])) 
				{
					$error[]='title';
				}	
				else 
				{
					$title=$_POST['title'];
				}
				if (empty($_POST['link'])) {
					$error[]='link';
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
				if (empty($error)) 
				{
					include("../inc/connect.php");
					$query="INSERT INTO video(title,link,orthernum,status) 
							VALUES ('{$title}','{$link}',$orthernum,$status)";
					$result=mysqli_query($connect,$query) or die("Lỗi rồi {$query}".mysqli_error($connect));
					if(mysqli_affected_rows($connect)==1)
					{
						echo '<p style="color:green">Thêm video thành công</p>';
					}
					else 
					{
						echo '<p style="color:red">Thêm video thất bại</p>';
					}
					$_POST['title']='';
					$_POST['link']='';
					$_POST['orthernum']='';
				}
				else {
					echo '<p style="color:red">Bạn hãy nhập đầy đủ thông tin</p>';
				}
			} 
		?>
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
			<h3>Thêm mới video</h3>
			<form action="" method="post" name="frmadd_video">
				<div class="form-group">
					<label>Tiêu đề</label>
					<input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề" value="<?php if(isset($_POST['title'])){ echo ($_POST['title']); } ?>">
                    <label><?php if(isset($error) && in_array('title',$error)){ echo '<p style="color:red">Bạn chưa nhập tiêu đề</p>'; } ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Link</label>
					<input type="text" name="link" class="form-control" placeholder="Link" value="<?php if(isset($_POST['link'])){ echo ($_POST['link']); } ?>">
					<label><?php if(isset($error) && in_array('link',$error)){echo '<p style="color:red">Bạn chưa nhập link video</p>';} ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Thứ tự</label>
					<input type="text" name="orthernum" class="form-control" placeholder="Nhập thứ tự">
					<label><?php if(isset($error) && in_array('orthernum',$error)){echo '<p style="color:red">Bạn chưa nhập thứ tự video</p>';} ?></label>
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