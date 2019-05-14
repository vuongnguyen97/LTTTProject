<?php 
ob_start();
include("inc/header.php"); ?>
				<div style="clear:both"></div>
				<!-- mua hang -->
					<?php include("inc/giohang.php"); ?>
				<!-- end mua hang /- -->
				<div style="clear:both"></div>
				<!-- menu top -->
					<?php include("inc/menu_top.php"); ?>
				<!-- end menu top -->	
			
			<div style="clear:both"></div>
			<?php 
				if($_GET['kid'] && filter_var($_GET['kid'],FILTER_VALIDATE_INT,array('min_range')>=1))
	            {
	                $id=$_GET['kid'];
	               
	                // đổ dữ liệu ra ổ 
	                $query_d="SELECT tensp,anh,gia FROM sanpham WHERE id=$id ";
	                $result_d=mysqli_query($connect,$query_d);
	                //kt_query($result_d,$query_d);
	                // kiểm tra id có tồn tại không
	                if(mysqli_num_rows($result_d)==1)
	                {
	                    list($tensp,$anh,$gia)=mysqli_fetch_array($result_d,MYSQLI_NUM);
	                }
	                else
	                {
	                    echo '<p style="color:red">ID không tồn tại</p>';
	                }
	            }
	            else
	            {
	                header("location:index.php");
	                exit();
	            }
			?>
			<div class="container nopadding">
				<div class="row">
					<div class="row">
						<h2 class="text-center">Giỏ hàng của bạn</h2>
						<div class="container"> 
						 <table id="cart" class="table table-hover table-condensed"> 
						  <thead> 
						   <tr> 
						   	<th style="width:30%">Tên sản phẩm</th>
						    <th style="width:20%">Hình sản phẩm</th>  
						    <th style="width:10%">Giá</th> 
						    <th style="width:8%">Số lượng</th> 
						    <th style="width:22%" class="text-center">Thành tiền</th> 
						    <th style="width:10%"> </th> 
						   </tr> 
						  </thead> 
						  	<tr> 
						   <td data-th="Product"> 
						    <?php echo $tensp; ?>
						   </td>
						   <td data-th="Product"> 
						    <img src="<?php echo $anh; ?>" alt="">
						   </td> 
						   <td data-th="Price"><?php echo number_format($gia)." đ"; ?></td> 
						   <td data-th="Quantity"><input class="form-control text-center" value="1" type="number">
						   </td> 
						   <td data-th="Subtotal" class="text-center"><?php echo number_format($gia)." đ"; ?></td> 
						  </tr> 
						 </table>
						</div>
					</div> <!-- end row -->
					<form action="" method="post" name="form_muahang">
					<div class="row" style="margin-top: 20px;">
						<div class="col-md-9" style="border:1px solid #d0cfcf;">
							<?php 
								$error=array();
								if(isset($_POST['submit'])) // nếu đã bấm nút submit
								{
									if(empty($_POST['name']))
									{
										$error[]='name';
									}
									else {
										$name=$_POST['name'];
									}
									if(empty($_POST['address']))
									{
										$error[]='address';
									}
									else 
									{
										$address=$_POST['address'];
									}
									if(empty($_POST['sdt']))
									{
										$error[]='sdt';
									}
									else {
										$sdt=$_POST['sdt'];
									}
									$mail=$_POST['mail'];
									$note=$_POST['note'];
									$thanhtoan=$_POST['thanhtoan'];
									
									if(empty($error))
									{
									$query_ck="INSERT INTO donhang(sanpham,tongtien,user_name,sdt,diachi,email,ghichu,thanhtoan)
		VALUES('{$tensp}',{$gia},'{$name}',$sdt,'{$address}','{$mail}','{$note}','{$thanhtoan}')";
									$result_ck=mysqli_query($connect,$query_ck);
									if(mysqli_affected_rows($connect)==1)
									{
										header("location:checksuccess.php");
									}
									else 
									{
										echo '<p style="color:red">mua thất bại</p>';
									}
									}
									
									}// submit
							
							 ?>
							 
						 <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
								<label>THÔNG TIN GIAO HÀNG</label>
									<p>* Vui lòng nhập đầy đủ thông tin để chúng tôi giao hàng được chính xác, cảm ơn!</p>
								<div class="form-group">
									<input type="text" name="name" class="form-control" placeholder="Họ tên của bạn? (*)" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>">
									<?php if(isset($error) && in_array('name',$error)){echo '<p style="color:red">Bạn chưa nhập họ tên</p>';} ?>
								</div> <!-- end form group -->
								<div class="form-group">
									<input type="text" name="address" class="form-control" placeholder="số nhà, đường, (tòa nhà), phường/xã… (*)" value="<?php if(isset($_POST['address'])){echo $_POST['address'];} ?>">
									<?php if(isset($error) && in_array('address',$error)){echo '<p style="color:red">Bạn chưa nhập địa chỉ</p>';} ?>
								</div> <!-- end form group -->
								
								<div class="form-group">
									<input type="text" name="sdt" class="form-control" placeholder="Số điện thoại (*)" value="<?php if(isset($_POST['sdt'])){echo $_POST['sdt'];} ?>">
									<?php if(isset($error) && in_array('sdt',$error)){echo '<p style="color:red">Bạn chưa nhập số điện thoại</p>';} ?>
								</div> <!-- end form group -->
								<div class="form-group">
									<input type="text" name="mail" class="form-control" placeholder="Email" value="">
								</div> <!-- end form group -->
								<div class="form-group">
									<input type="text" name="note" class="form-control" placeholder="Ghi chú" value="">
								</div> <!-- end form group -->
								<div class="form-group">
									<label style="display: block;">Thanh toán</label>
									<label class="radio-inline"><input type="radio" name="thanhtoan" value="1" checked="checked">Thanh toán tiền mặt khi nhận hàng</label>
									<label class="radio-inline"><input type="radio" name="thanhtoan" value="0">Chuyển khoản trước qua ngân hàng</label>
								</div> <!-- end form group -->
								
						</div> <!-- end col 12 -->

						</div> <!-- end col md 9 -->
						<div class="col-md-3 quangcao2">
							<ul class="col-md-2 dt-right hidden-xs quangcao3">
		                        <li>
		                                <img src="images/free_deliverd.png" />
		                                <p>Miễn phí vận chuyển với đơn hàng lớn hơn 1.000.000 đ</p>
		                        </li>
		                        <li>
		                                <img src="images/giaohangngaysaukhidat.png" />
		                                <p>Giao hàng ngay sau khi đặt hàng (áp dụng với Hà Nội & HCM)</p>
		                        </li>
		                        <li>
		                                <img src="images/doitra.png" />
		                                <p>Đổi trả trong 3 ngày, thủ tục đơn giản</p>
		                        </li>
		                        <li>
		                                <img src="images/hoadon.png" />
		                                <p>Nhà cung cấp xuất hóa đơn cho sản phẩm này</p>
		                        </li>
	                    	</ul>
	                    	<div class="row">
	                    		<a class="btn btn-warning"  href="index.php">Tiếp tục mua hàng</a>
	                    		<input class="btn btn-success" type="submit" name="submit" value="Hoàn tất thanh toán">
	                    	</div>
						</div> <!-- end col md 3 -->
					</div> <!-- end row -->
					</form>
				</div> <!-- end row -->	
			</div>  <!--container nopadding -->
			
<?php include("inc/footer.php"); ?>
