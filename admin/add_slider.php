<?php 
include('include/header.php'); 
include('../inc/Images.class.php');
?>
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
				// up ảnh
						// tạo đường dẫn folder upload ảnh
						$link_folder="upload/";
						// tạo đường dẫn file, nối với hàm basename để lấy tên file
						$link_img=$link_folder.basename($_FILES['anhdaidien']['name']);
						/*echo "<pre>";
						print_r($_FILES);
						echo "</pre>";
						echo $link_img;*/
						// nếu đã chọn ảnh thì làm tiếp
						if($_FILES['anhdaidien']['size']!=NULL)
						{
							
								// kiểm tra kích thước ảnh
								if($_FILES['anhdaidien']['size']>1000000)
								{
									// nếu lớn hơn 2MB (2tr byte)
									$error['anhdaidien']="Ảnh bạn up quá kích thước cho phép";
								}
								// kiểm tra định dạng ảnh
								// lấy thông tin truyền vào, lấy tên và đuôi mở rộng của file
									$check_img= pathinfo($_FILES['anhdaidien']['name'],PATHINFO_EXTENSION);
									// những đuôi file hỗ trợ
									$img_allow=array('jpg','jpeg','png','gif');
									// kiểm tra file nếu ko nằm trong mảng, đưa về đuôi thường
									if(!in_array(strtolower($check_img), $img_allow))
									{
										$error['anhdaidien']="File ảnh không hỗ trợ";
									}
								// kiểm tra ảnh có tồn tại trong hệ thống chưa
								if(file_exists("../".$link_img))
									{
										$error['anhdaidien']="Ảnh đã tồn tại trong hệ thống";
									}
								
								
						} // end if !NULL
						else 
						{
							$error['anhdaidien']="Vui lòng chọn file";
						}
						if(empty($error))
						{
							// kiểm tra và chuyển từ file tạm lên server
							move_uploaded_file($_FILES['anhdaidien']['tmp_name'], "../".$link_img);
					  /*
					    // cresize,crop ảnh
					   // cắt đuôi ảnh ra
					  $temp1=explode('.',$img); // cắt ra được 2 phần, temp[0] là tên,temp[1] là đuôi
					  // kiểm tra đuôi là jpeg thành đổi thành jpg
					  if($temp1[1]=='jpeg' or $temp1[1]=='JPEG')
					  {
					  	$temp1[1]='jpg';
					  }
					  	// kiểm tra đổi tên hoa thành thường
					  	$temp1[1]=strtolower($temp1[1]);
						// tạo ra đường dẫn cresize và crop ảnh
						$thumb='upload/resized/'.$temp1[0].'_thumb'.'.'.$temp1[1];// đường dẫn + tên hình+tên thumb+ đuôi ảnh
						$img_thumb=new Image('../'.$link_img); // class trong thư viện image cresize (chứa đường dẫn hình)
						/*
						// bắt đầu cresize ảnh
						if($img_thumb->getWidth()>700)
						{
							$img_thumb->resize(700, 700);
						}
						// bắt đầu crop ảnh
						$img_thumb->resize(1280, 468);
						$img_thumb->save($temp1[0].'thumb','../upload/resized');
						 
					  */
					  	
					include("../inc/connect.php");	
					$query="INSERT INTO anhslide(title,anhslide,status) 
									VALUES ('{$title}','{$link_img}',$status)";//lưu vào csdl các trường sau
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
			<h3>Thêm mới slider</h3>
			<form action="" method="post" name="frmadd_video" enctype="multipart/form-data">
				<div class="form-group">
					<label>Tiêu đề</label>
					<input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề" value="<?php if(isset($_POST['title'])){ echo ($_POST['title']); } ?>">
					<label><?php if(isset($error) && in_array('title',$error)){echo '<p style="color:red">Bạn chưa nhập tiêu đề</p>';} ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Ảnh đại diện</label>
					<input type="file" name="anhdaidien">
					<label><?php if(isset($error['anhdaidien'])){echo $error['anhdaidien'];} ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Link</label>
					<input type="text" name="link" class="form-control" placeholder="Link slider" value="<?php if(isset($_POST['link'])){ echo ($_POST['link']); } ?>">
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