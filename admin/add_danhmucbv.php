<?php include('include/header.php');?>

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
				$orthernum=$_POST['orthernum'];
				$link=$_POST['link'];
				$status=$_POST['status'];
                $link_img='';
				if(empty($error)) 
				{
                    if(($_FILES['img']['type']!="image/gif") && ($_FILES['img']['type']!="image/png") && ($_FILES['img']['type']!="image/jpg") && ($_FILES['img']['type']!="image/jpeg"))
                       {
                           $thongbao= "Không hỗ trợ loại file này";
                       }
                       elseif($_FILES['img']['size']>1000000)
                       {
                           $thongbao= "Ảnh phải nhỏ hơn 1MB";
                       }
                       elseif($_FILES['img']['size']=='')
                       {
                           $thongbao= 'Bạn chưa chọn ảnh';
                       }
                    else
                       {
                           $img=$_FILES['img']['name'];
                           $link_img="upload/".$img;
                           move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$img);
                       }
					include("../inc/connect.php");
                   
					$query="INSERT INTO anhslide(title,anhslide,link,orthernum,status) 
									VALUES ('{$title}','{$link_img}','{$link}',$orthernum,$status)";
					$result=mysqli_query($connect,$query) or die("Lỗi rồi {$query}".mysqli_error($connect));
					if(mysqli_affected_rows($connect)==1)
                    {
                        echo '<p style="color:green">Thêm ảnh slider thành công</p>';
                    }
                    else
                    {
                        echo '<p style="color:red">Thêm slider thất bại</p>';
                    }
				}
				else 
                {
					echo '<p style="color:red">Vui lòng điền đầy đủ thông tin</p>';
				}
			} 
		?>
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<?php include("../inc/function.php");?>
		<?php include("../inc/connect.php");?>
			<h3>Thêm mới danh mục bài viết</h3>
			<form action="" method="post" name="frmadd_video" enctype="multipart/form-data">
				<div class="form-group">
					<label>Danh mục bài viết</label>
					<input type="text" name="title" class="form-control" placeholder="Nhập tiều đề" value="<?php if(isset($_POST['title'])){ echo ($_POST['title']); } ?>">
					<label><?php if(isset($error) && in_array('title',$error)){echo '<p style="color:red">Bạn chưa nhập tiêu đề</p>';} ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Danh mục cha</label>
				<?php select_categories('tenbatky','tengicungduoc');?>
				</div> <!-- end form group -->
				<div class="form-group">
					<label style="display: block;">Hiển thị menu</label>
					<label class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Hiển thị</label>
					<label class="radio-inline"><input type="radio" name="status" value="0">Không hiển thị</label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label style="display: block;">Hiển thị home</label>
					<label class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Hiển thị</label>
					<label class="radio-inline"><input type="radio" name="status" value="0">Không hiển thị</label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Thứ tự</label>
					<input type="text" name="orthernum" class="form-control" placeholder="Nhập thứ tự">
					<label><?php if(isset($error) && in_array('orthernum',$error)){echo '<p style="color:red">Bạn chưa nhập Thứ tự</p>'; } ?></label>
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