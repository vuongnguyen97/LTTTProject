<?php 
ob_start();
include('include/header.php'); 
include('../inc/Images.class.php');
?>
	<div class="row">
		<?php
		include_once("../inc/connect.php");
			$error=array(); 
			if($_GET['lid'] && filter_var($_GET['lid'],FILTER_VALIDATE_INT,array('min_range')>=1))
            {
                $id=$_GET['lid'];
               
                // đổ dữ liệu ra ổ 
                $query_d="SELECT title,anhslide,link,status FROM anhslide WHERE id={$id}";
                $result_d=mysqli_query($connect,$query_d);
                //kt_query($result_d,$query_d);
                // kiểm tra id có tồn tại không
                if(mysqli_num_rows($result_d)==1)
                {
                    list($title,$anhslide,$link,$status)=mysqli_fetch_array($result_d,MYSQLI_NUM);
                }
                else
                {
                    echo '<p style="color:red">ID không tồn tại</p>';
                }
            }
            else
            {
                header("location:list_slide.php");
                exit();
            }
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
					  	
					if ($title && $link && $anhslide && $status ) 
					{
					include("../inc/connect.php");
					$query="UPDATE anhslide
							SET title='{$title}',
								anhslide={$anhslide},
								link='{$link}',
								status={$status} 
							WHERE id={$id}";
					$result=mysqli_query($connect,$query) or die("Lỗi rồi {$query}".mysqli_error($connect));
					echo '<p style="color:green">Sửu slider thành công</p>';
					}
					else {
						echo '<p style="color:red">Sửu không thành công</p>';
					}
				}
				else 
                {
					echo '<p style="color:red">Vui lòng điền đầy đủ thông tin</p>';
				}
				
			} 
		?>
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
			<h3>Sửa slider</h3>
			<form action="" method="post" name="frmadd_video" enctype="multipart/form-data">
				<div class="form-group">
					<label>Tiêu đề</label>
					<input type="text" name="title" class="form-control" placeholder="Tiều đề" value="<?php if(isset($title)){ echo ($title); } ?>">
					<label><?php if(isset($error) && in_array('title',$error)){echo '<p style="color:red">Bạn chưa nhập tiêu đề</p>';} ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Ảnh đại diện</label>
					<img src="<?php if(isset($anhslide)){ echo $anhslide; } ?>" alt="">
					<input type="file" name="anhdaidien">
					<label><?php if(isset($error['anhdaidien'])){echo $error['anhdaidien'];} ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label>Link</label>
					<input type="text" name="link" class="form-control" placeholder="Link slider" value="<?php if(isset($link)){ echo ($link); } ?>">
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
				<input class="btn btn-primary" type="submit" name="submit" value="Thêm mới">
			</form>
		</div> <!-- end col 12 -->
	</div> <!-- end row -->
<?php include('include/footer.php'); ?>