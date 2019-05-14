<?php 
	include('include/header.php');
	include('../inc/Images.class.php');
?>
<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		
			<h3>Thêm mới bài viết</h3>
			<form action="" method="post" name="frmadd_video" enctype="multipart/form-data">
				<?php 
				$error=array();
				 	include("../inc/function.php");
					 include("../inc/connect.php");
					
					if($_SERVER['REQUEST_METHOD']=='POST') // nếu đã bấm nút submit
					{
						if(empty($_POST['tenbatky']))
						{
							$parent_id=0;
						}
						else {
							$parent_id=$_POST['tenbatky'];
						}
						if(empty($_POST['title']))
						{
							$error[]='title';
						}
						else {
							$title=$_POST['title'];
						}
						if(empty($_POST['tomtat']))
						{
							$error[]='tomtat';
						}
						else 
						{
							$tomtat=$_POST['tomtat'];
						}
						if(empty($_POST['noidung']))
						{
							$error[]='noidung';
						}
						else {
							$noidung=$_POST['noidung'];
						}
						if(empty($_POST['ordernum']))
						{
							$ordernum=0;
						}
						else {
							$ordernum=$_POST['ordernum'];
						}
						$status=$_POST['status'];
						$link_img='';
						$img_name='';
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
							/*// cresize,crop ảnh
							   // cắt đuôi ảnh ra
							  $temp1=explode('.',$img_name); // cắt ra được 2 phần, temp[0] là tên,temp[1] là đuôi
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
								
								// bắt đầu cresize ảnh
								if($img_thumb->getWidth()>700)
								{
									$img_thumb->resize(700, 700);
								}
								$img_thumb->save($temp1[0].'thumb','../upload/resized');
							  
							 */
							// tách dấu - để lấy ngày tháng năm theo thứ tự
							$ngaydang=$_POST['ngaydang'];	
							
							$giodang=$_POST['giodang'];
							// insert dữ liệu vào database
							$query="INSERT INTO baiviet(danhmucbaiviet,title,tomtat,noidung,hinhanh,ngaydang,giodang,orthernum,status)
								VALUES($parent_id,'{$title}','{$tomtat}','{$noidung}','{$link_img}','{$ngaydang}','{$giodang}',$ordernum,$status)";
							$result=mysqli_query($connect, $query);
							kt_query($result, $query);// hàm kt lỗi query trong inc/function.php
							if (mysqli_affected_rows($connect)==1) // nếu thêm thành công 
							{
								echo '<p style="color:green">Thêm bài viết thành công</p>';
							}	
							else
		                    {
		                        echo '<p style="color:red">Thêm bài viết thất bại</p>';
		                    }
						}
						else {
							$messege='<p style="color:red">Vui lòng nhập đầy đủ thông tin</p>';
						}
					}
				 ?>
				 <?php if(isset($messege)) echo $messege; ?>
				 <div class="form-group">
					<label style="display: block" name="parent_id">Danh mục cha</label>
					<?php select_categories('tenbatky','tengicungduoc');?>
				</div> <!-- end form group -->
				
				<div class="form-group">
					<label>Tiêu đề</label>
					<input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề" value="<?php if(isset($_POST['title'])){ echo ($_POST['title']); } ?>">
					<label><?php if(isset($error) && in_array('title',$error)){echo '<p style="color:red">Bạn chưa nhập tiêu đề</p>';} ?></label>
				</div> <!-- end form group -->
				
				<div class="form-group">
					<label style="display: block">Tóm tắt</label>
					<textarea name="tomtat" style="width: 100%;height: 150px;"></textarea>
					<label><?php if(isset($error) && in_array('tomtat',$error)){echo '<p style="color:red">Bạn chưa nhập tóm tắt</p>';} ?></label>			
				</div> <!-- end form group -->
				<div class="form-group">
					<label style="display: block">Nội dung</label>
					<textarea name="noidung" id="noidung" style="width: 100%;height: 150px;">
						<?php if(isset($_POST['noidung'])){echo $_POST['noidung'];}?>
					</textarea>
					<label><?php if(isset($error) && in_array('noidung',$error)){echo '<p style="color:red">Bạn chưa nhập nội dung</p>';} ?></label>
				</div> <!-- end form group -->
				<div class="form-group">
					<label style="display: block;">Ảnh đại diện</label>
					<input type="file" name="anhdaidien" value=""/>
					<?php 
						if(isset($error['anhdaidien']))
						{
							echo $error['anhdaidien'];
						}
					 ?>
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
					<input type="text" name="ordernum" class="form-control" placeholder="Nhập thứ tự">			
				</div> <!-- end form group -->
				<div class="form-group">
					<label style="display: block;">Trạng thái</label>
					<label class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Hiển thị</label>
					<label class="radio-inline"><input type="radio" name="status" value="0">Không hiển thị</label>
				</div> <!-- end form group -->
				<input class="btn btn-primary" type="submit" name="submit" value="Thêm mới">
			</form>
</div> <!-- end col 12 -->
<?php include("include/footer.php"); ?>
