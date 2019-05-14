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
				if(isset($_SESSION['giohang']))
				{
			?>
			<div class="container nopadding">
				<div class="row">
					<?php 
					$tongtien=0;
					for ($i=0; $i < count($_SESSION['giohang']); $i++) 
					{ 
						$query_gh="SELECT * FROM sanpham WHERE id=".$_SESSION['giohang'][$i]['id']." ";
			    		$result_gh=mysqli_query($connect,$query_gh);
			    		$giohang=mysqli_fetch_array($result_gh,MYSQLI_ASSOC);
			    		$tongtien=$tongtien + $giohang['gia'] * $_SESSION['giohang'][$i]['soluong'];
					}
		    	 ?>
					<div class="row">
						<h2 class="text-center">Giỏ hàng của bạn</h2>
						<?php 
				        	for($i=0;$i < count($_SESSION['giohang']);$i++)
				        		{
				        		$query_gh1="SELECT * FROM sanpham WHERE id=".$_SESSION['giohang'][$i]['id']." ";
				        		$result_gh1=mysqli_query($connect,$query_gh1);
				        		$giohang1=mysqli_fetch_array($result_gh1,MYSQLI_ASSOC);
				        		$_SESSION['dadathang']=$giohang1;

				        		
				        ?>
						<div class="container"> 
						 <table id="cart" class="table table-hover table-condensed"> 
						  <thead> 
						   <tr> 
						    <th style="width:50%">Tên sản phẩm</th> 
						    <th style="width:10%">Giá</th> 
						    <th style="width:8%">Số lượng</th> 
						    <th style="width:22%" class="text-center">Thành tiền</th> 
						    <th style="width:10%"> </th> 
						   </tr> 
						  </thead> 
						  <tbody><tr> 
						   <td data-th="Product"> 
						    <div class="row"> 
						     <div class="col-sm-2 hidden-xs"><img src="<?php echo $giohang1['anh']; ?>" alt="Sản phẩm 1" class="img-responsive" width="100">
						     </div> 
						     <div class="col-sm-10"> 
						      <h4 class="nomargin"><?php echo $giohang1['tensp']; ?></h4> 
						     </div> 
						    </div> 
						   </td> 
						   <td data-th="Price"><?php echo number_format($giohang1['gia'])." đ"; ?></td> 
						   <td data-th="Quantity"><input class="form-control text-center" value="<?php echo $_SESSION['giohang'][$i]['soluong']; ?>" type="number">
						   </td> 
						   <td data-th="Subtotal" class="text-center"><?php echo number_format($giohang1['gia'])." đ"; ?></td> 
						   <td class="actions" data-th="">
						    
						    <button class="btn btn-danger btn-sm">
						    	<a style='color:#ffffff;' href="deletecartdetail.php?id=<?php echo $_SESSION['giohang'][$i]['id'];?>">
						    	<i class="fa fa-trash"></i></a>
						    </button>
						   </td> 
						  </tr> 
						  
						  </tbody>
						  <tfoot> 
						   <tr class="visible-xs"> 
						    <td class="text-center"><strong><?php echo number_format($giohang['gia'])." đ"; ?></strong>
						    </td> 
						   </tr> 
						  </tfoot> 
						 </table>
						</div>
						<?php
					      }// end for
					    ?>
					    <div align="right" class="tongsp">
						 	<tr> 
						    <td class="hidden-xs"> </td> 
						    <td class="hidden-xs text-center"><strong>Tổng tiền <?php echo number_format($tongtien)." đ"; ?></strong>
						    </td>
						   </tr>
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
										for ($i=0; $i < count($_SESSION['giohang']); $i++) 
									{ 
										$query_gh="SELECT * FROM sanpham WHERE id=".$_SESSION['giohang'][$i]['id']." ";
							    		$result_gh=mysqli_query($connect,$query_gh);
							    		$giohang=mysqli_fetch_array($result_gh,MYSQLI_ASSOC);
							    		
									}
									$query_ck="INSERT INTO donhang(sanpham,tongtien,user_name,sdt,diachi,email,ghichu,thanhtoan)
		VALUES('{$giohang1['tensp']}',{$tongtien},'{$name}',$sdt,'{$address}','{$mail}','{$note}','{$thanhtoan}')";
									$result_ck=mysqli_query($connect,$query_ck);
									$last_id=mysqli_insert_id($connect);
									
									}
									if(mysqli_affected_rows($connect)==1)
									{
										header("location:checksuccess.php");
									}
									else 
									{
										echo '<p style="color:red">mua thất bại</p>';
									}
									}
							
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
		                                <p>Giao hàng ngay sau khi đặt hàng (áp dụng với Bình Dương)</p>
		                        </li>
		                      
		                        <li>
		                                <img src="images/hoadon.png" />
		                                <p>Nhà cung cấp xuất hóa đơn cho sản phẩm này</p>
		                        </li>
	                    	</ul>
	                    	<div class="row">
	                    		<input class="btn btn-warning" style="margin-left: 10px" type="submit" name="submit" value="Tiếp tục mua hàng">
	                    		<input class="btn btn-success" type="submit" name="submit" value="Hoàn tất thanh toán">
	                    	</div>
						</div> <!-- end col md 3 -->
					</div> <!-- end row -->
					</form>
					<?php 
						}
						else
						{
							echo "<p class='text-danger text-center' style='
						    margin-left: 83px';>Bạn chưa có sản phẩm nào trong giỏ</p>";
						}
					?>
				</div> <!-- end row -->	
			</div>  <!--container nopadding -->
e
			<br>
<?php include("inc/footer.php"); ?>
