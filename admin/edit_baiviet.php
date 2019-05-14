<?php ob_start(); ?>
<?php include('include/header.php'); ?>

	<div class="row">
<?php 
	// nếu tồn tại $_GET['id'] và là số nguyên nằm trong mảng phải lớn hơn
	if($_GET['id'] && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'>=1)))
	{
		$id=$_GET['id'];
	}
	// ngược lại không phải số thì đưa về trang chủ
	else 
	{
		header('location:index.php');
		exit();
	}
 ?>
		<?php
			$error=array(); 
			if ($_SERVER['REQUEST_METHOD']=='POST') 
			{
				if(empty($_POST['title']))
				{
					$messege="title";
				}
				else 
				{
					$title=$_POST['title'];	
				}
				
			}
		?>
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
			<?php include("../inc/function.php");?>
			<?php include("../inc/connect.php");?>
			<h3>Sửa bài viết</h3>
			<form action="" method="post" name="frmadd_video" enctype="multipart/form-data">
				<div class="form-group" >
					<label style="display: block;">Danh mục bài viết</label>
					<?php select_categories('name', 'class'); ?>
					</div> <!-- end form group -->
				<div class="form-group">
					<label>Tiêu đề</label>
					<input type="text" name="title" class="form-control" placeholder="Tiều đề" value="<?php if(isset($title)){echo $title;} ?>">
					<label><?php if(isset($error) && in_array('title',$error)){echo '<p style="color:red">Bạn chưa nhập tiêu đề</p>';} ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Ảnh đại diện</label>
					<p><img src="../<?php  ?>" alt=""></p>
					<input type="file" name="img">
					<!-- tạo ra input hidden để khi người dùng không sửa gì nó sẽ hiện ảnh củ -->
					<input type="hidden" name="img_hidden" value="<?php ?>">
					<label><?php if(isset($thongbao)){echo $thongbao;} ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label style="display: block;">Ngày đăng</label>
					<div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd"> 
						<input class="form-control" readonly="true" type="text" name="ngaydang"> 
						<span class="input-group-addon">
							<i class="glyphicon glyphicon-calendar"></i>
						</span> 
					</div>
				</div> <!-- end form group -->
				<div class="form-group">
					<label style="display: block;">Giờ đăng</label>
					<?php 
						date_default_timezone_set('Asia/Ho_Chi_Minh');
						$gio=date('g:i A'); // g là giờ, i là phút, A là AM/PM
					 ?>
					<input type="text" class="form-control" name="giodang" value="<?php echo $gio; ?>"/>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Thứ tự</label>
					<input type="text" name="ordernum" class="form-control" placeholder="Thứ tự">			
				</div> <!-- end form group -->
				<div class="form-group">
					<label style="display: block;">Trạng thái</label>
					<?php
                        if(isset($status)==0)
                         {                                                                                 
                    ?>
					<label class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Hiển thị</label>
					<label class="radio-inline"><input type="radio" name="status" value="0">Không hiển thị</label>
					<?php
                         }
                         else                                                                               {          
                    ?>
                    <label class="radio-inline"><input type="radio" name="status" value="1">Hiển thị</label>
					<label class="radio-inline"><input type="radio" name="status" value="0" checked="checked">Không hiển thị</label>
                    <?php
                         }
                    ?>
				</div> <!-- end form group -->
				<input class="btn btn-primary" type="submit" name="submit" value="Sửa">
			</form>
		</div> <!-- end col 12 -->
	</div> <!-- end row -->
<?php include('include/footer.php'); ?>
<?php ob_flush(); ?>