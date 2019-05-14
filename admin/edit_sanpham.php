<?php 
ob_start();
    include('include/header.php'); 
    include_once("../inc/connect.php");
    include('../inc/Images.class.php');
    include_once("../inc/function.php");
    ?>
<div class="row">
    <?php 
        $error=array();
        if(isset($_GET['pid']) && filter_var($_GET['pid'],FILTER_VALIDATE_INT,array('min_range'=>1)))
        	   {
        			$id=$_GET['pid'];
        	   }
        	else
        		{
        			header('Location: list_catelogy.php');
        			exit();
        		}
        	if($_SERVER['REQUEST_METHOD']=='POST')
        	{
        		if (empty($_POST['parent_id'])) 
        		{
        			$error[]='parent_id';
        		}
        		else {
        			$parent_id=$_POST['parent_id'];
        		}
        		if (empty($_POST['tensp'])) 
        		{
        			$error[]='tensp';
        		}
        		else {
        			$tensp=$_POST['tensp'];
        		}
        		if (empty($_POST['giasp'])) 
        		{
        			$error[]='giasp';
        		}
        		else {
        			$giasp=$_POST['giasp'];
        		}
        		
        		if (empty($_POST['noidung'])) 
        		{
        			$error[]='noidung';
        		}
        		else {
        			$noidung=$_POST['noidung'];
        		}
        		if (empty($_POST['thongso'])) 
        		{
        			$error[]='thongso';
        		}
        		else {
        			$thongso=$_POST['thongso'];
        		}
        		$giasale=$_POST['giasale'];
        		$khuyenmai=$_POST['khuyenmai'];
        		$video=$_POST['video'];
        		$thongso=$_POST['thongso'];
        		$baohanh=$_POST['baohanh'];
        		$status=$_POST['status'];
        		
        $link_img='';
        		// up ảnh
        		// tạo đường dẫn folder upload ảnh
        		$link_folder="images/sanpham/"; 
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
        		$error['anhdaidien']="<p style='color:red;font-weight:bold;'>Vui lòng chọn file</p>";
        	}
        	if(empty($error))
        	{
        		// kiểm tra và chuyển từ file tạm lên server
        		move_uploaded_file($_FILES['anhdaidien']['tmp_name'], "../".$link_img);
        		$query="UPDATE sanpham
        		SET category_id = '{$parent_id}',
        			tensp ='{$tensp}',
        			gia ='{$giasp}',
        			sale ='{$giasale}',
        			motakhuyenmai='{$khuyenmai}',
        			noidung='{$noidung}',
        			thongso='{$thongso}',
        			anh ='{$link_img}',
        			video='{$video}',
        			baohanhsp='{$baohanh}',
        			status={$status}
        		WHERE id={$id}	
        		";
        		$result=mysqli_query($connect, $query);
        		// kt lỗi mysl
        		kt_query($result, $query);// hàm kt lỗi query trong inc/function.php
        		if (mysqli_affected_rows($connect)==1) // nếu thêm thành công 
        		{
        			echo '<p style="color:green">Sửa thành công</p>';
        		}	
        		else
                      {
                          echo '<p style="color:red">Sửa sản phẩm thất bại</p>';
                      }	
        	}
        	else 
        	{
        		$error[]='<p style="color:red">Vui lòng nhập đầy đủ thông tin</p>';
        	}
        } // end if server
        ?>
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <h3>Sửa sản phẩm </h3>
        <form action="" method="post" name="frmadd_video" enctype="multipart/form-data">
            <div class="form-group">
                <label>Danh mục sản phẩm</label>
                <select name="parent_id" >
                    <option value="">Danh mục sản phẩm</option>
                    <?php 
                        $query_a="SELECT * FROM sanpham WHERE id={$id}";
                        $result_a=mysqli_query($connect,$query_a);
                        $sanpham=mysqli_fetch_array($result_a);
                        $query_e="SELECT * FROM menu";
                         $result_e=mysqli_query($connect,$query_e);
                        
                         while ($dmsp=mysqli_fetch_array($result_e)) {
                         ?>
                    <option value="<?php echo $dmsp['id'] ?>"><?php echo $dmsp['menu_name'] ?></option>
                    <?php	
                        }
                        ?>
                </select>
                <br>
                <label><?php if(isset($error) && in_array('parent_id',$error)){ echo '<p style="color:red">Bạn chưa chọn danh mục sản phẩm</p>'; } ?></label>
            </div>
            <!-- end form group -->
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="tensp" class="form-control" placeholder="" value="<?php echo $sanpham['tensp'] ?>">
                <label><?php if(isset($error) && in_array('tensp',$error)){ echo '<p style="color:red">Bạn chưa nhập tên sản phẩm</p>'; } ?></label>
            </div>
            <!-- end form group -->
            <div class="form-group">
                <label>Giá sản phẩm</label>
                <input type="text" name="giasp" class="form-control" placeholder="" value="<?php echo $sanpham['gia'] ?>">
                <label><?php if(isset($error) && in_array('giasp',$error)){echo '<p style="color:red">Bạn chưa nhập giá sản phẩm</p>';} ?></label>
            </div>
            <!-- end form group -->
            <div class="form-group">
                <label>Giá sale</label>
                <input type="text" name="giasale" class="form-control" placeholder="" value="<?php echo $sanpham['sale'] ?>">					
            </div>
            <!-- end form group -->
            <div class="form-group">
                <label>Mô tả Khuyến mãi</label>
                <textarea name="khuyenmai" id="khuyenmai" style="width: 100%;height: 150px;">
                <?php echo $sanpham['motakhuyenmai'] ?>
                </textarea>
            </div>
            <!-- end form group -->
            <div class="form-group">
                <label>Nội dung chi tiết</label>
                <textarea name="noidung" id="noidung" style="width: 100%;height: 150px;">
                <?php echo $sanpham['noidung'] ?>
                </textarea>
                <label><?php if(isset($error) && in_array('noidung',$error)){echo '<p style="color:red">Bạn chưa nhập nội dung chi tiết</p>';} ?></label>
            </div>
            <!-- end form group -->
            <div class="form-group">
                <label>Thông số</label>
                <input type="text" name="thongso" class="form-control" placeholder="Thông số sản phẩm ở đây" value="<?php echo $sanpham['thongso'] ?>">				
            </div>
            <!-- end form group -->
            <div class="form-group">
                <label style="display:block;">Hình sản phẩm</label>
                <input type="file" name="anhdaidien" value=" <?php echo $sanpham['link_img'] ?>" id="hinhsp"/>
                <?php echo $sanpham['anh'] ?>
            </div>
            <!-- end form group -->
            <div class="form-group">
                <label>Video</label>
                <input type="text" name="video" class="form-control" value="<?php echo $sanpham['link'] ?>">					
            </div>
            <!-- end form group -->
            <div class="form-group">
                <label style="display: block;">Bảo hành</label>
                <label class="radio-inline"><input type="radio" name="baohanh" value="1" checked="checked">6 tháng</label>
                <label class="radio-inline"><input type="radio" name="baohanh" value="0">12 tháng</label>
            </div>
            <!-- end form group -->
            <div class="form-group">
                <label style="display: block;">Trạng thái</label>
                <label class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Còn hàng</label>
                <label class="radio-inline"><input type="radio" name="status" value="0">Hết hàng</label>
            </div>
            <!-- end form group -->
            <input class="btn btn-primary" type="submit" name="submit" value="Sửa">
        </form>
    </div>
    <!-- end col 12 -->
</div>
<!-- end row -->
<?php include('include/footer.php'); ?>