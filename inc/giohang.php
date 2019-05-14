<?php 
	//session_start();
	//session_unset();
	include_once("connect.php");
	if (isset($_GET['id'])) 
	{
		$id=$_GET['id'];

		if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])) 
		{
			// đếm có bao nhiêu sản phẩm trong giỏ hàng rồi
			$count=count($_SESSION['giohang']);
			// lặp từ đầu đến cuối
			for ($i=0; $i < $count; $i++) 
			{ 
				// nếu $_SESSION['giohang'] thứ i và có id thì tăng số lượng lên
				// đặt cờ
				$flag = false;
				if ($_SESSION['giohang'][$i]['id']==$id) 
				{
					$_SESSION['giohang'][$i]['soluong']+=1;
					$flag = true;// đã có sản phẩm
					break;
				}
			}
			if ($flag==false) // nếu chưa có sp thì thêm vào giỏ
				{
					$_SESSION['giohang'][$count]['id']=$id;
					$_SESSION['giohang'][$count]['soluong']=1;
				}

		}
		else // ngược lại chưa có món hàng nào trong giỏ hoặc trong mảng session rỗng
		{
			$_SESSION['giohang']=array();
			$_SESSION['giohang'][0]['id']=$id;
			$_SESSION['giohang'][0]['soluong']=1;
		}
		//echo $_SESSION['giohang'][0]['soluong'];
		header("location:index.php");
	}
 ?>
<header>
	<div class="container muahang">
	    <div class="row" style="padding: 20px 0;">
	        <div class="col-md-2">
	            <a href="index.php">
	                <img src="images/logo1.png" alt="Shop fish"  width="150px" height="150px" style="
    margin-left: 90px;
    margin-top: -30px;
"/>
	            </a>
	        </div>
	        <div class="col-md-6 search">
	        	<form action="search.php" method="get">
	            <div class="search-ip input-group input-group-lg">
	                <input id="search" class="form-control" name="timkiem" type="text" placeholder="Nhập từ khóa vào đây..." required>
	                <span class="input-group-btn">
	                    
	                    	<button class="btn btn-group" type="submit" name="submit">
	                        <i class="glyphicon glyphicon-search"></i>
	                    	</button>
	                </span>
	            </div>
	            </form>
	        </div>
	        <div class="col-md-2 sdt" style="line-height: 60px;color: #ec1c24;">
	            <p> hotline:19001080</p>
	        </div>
	        <div class="col-md-2 shopping-cart l1">
	            <a class="cart-link" href="chitietgiohang.php">
	                <span class="title">Giỏ hàng</span>
	                <span class="item-number">
	                	<?php 

	                		if (isset($_SESSION['giohang'])) 
	                		{
	                			echo count($_SESSION['giohang'])." sản phẩm";
	                		}
	                		
	                		else
	                		{
	                			echo "0 sản phẩm";
	                		}
	                	?>
	                	<?php 
	                		if (isset($_SESSION['giohang'])) {
	                			$tongtien=0;
		                		for ($i=0; $i < count($_SESSION['giohang']); $i++) 
		                		{ 
		                			$query_gh="SELECT * FROM sanpham WHERE id=".$_SESSION['giohang'][$i]['id']." ";
				            		$result_gh=mysqli_query($connect,$query_gh);
				            		$giohang=mysqli_fetch_array($result_gh,MYSQLI_ASSOC);
				            		$tongtien=$tongtien + $giohang['gia'] * $_SESSION['giohang'][$i]['soluong'];
		                		}
	                	 ?>
	                </span>
	                <br>
	                <span class="item-number"></span>
	                <span class="price"><?php echo number_format($tongtien)." đ"; ?></span>
	                <span class="notify">
	                	<?php 
	                		if (isset($_SESSION['giohang'])) 
	                		{
	                			echo count($_SESSION['giohang']);
	                		}
	                		else
	                		{
	                			echo 0;
	                		}
	                	?>
	                </span>
	                <?php
						}// end for
					?>
	            </a>
	            <?php if (empty($_SESSION['giohang']))
	            	{
	            		session_unset();
	            	}
	            	else
	            	{ 
	           	?>
			            
				<div class="cart-block">
	                <div class="cart-block-content">
	                    <h5 class="cart-title">Bạn có (<?php 
	                		if (isset($_SESSION['giohang'])) 
	                		{
	                			echo count($_SESSION['giohang']);
	                		}
	                		else
	                		{
	                			echo 0;
	                		}
	                	?>) sản phẩm trong giỏ hàng</h5>
	                	
	                    <div class="cart-block-list">
	                        <ul>
	                        	<?php 
					            	for($i=0;$i < count($_SESSION['giohang']);$i++)
					            		{
					            		$query_gh="SELECT * FROM sanpham WHERE id=".$_SESSION['giohang'][$i]['id']." ";
					            		$result_gh=mysqli_query($connect,$query_gh);
					            		$giohang=mysqli_fetch_array($result_gh,MYSQLI_ASSOC)
					            		
					            ?>
	                            <li class="row">
	                                <div class="col-md-4">
	                                    <img class="img-thumbnail" src="<?php echo $giohang['anh']; ?>" />
	                                </div>
	                                <div class="col-md-6">
	                                    <a href="#" style='color:black';>
	                                        <?php echo $giohang['tensp'] ?>
	                                    </a>
	                                    <label>Giá:</label>
	                                    <span>
	                                        <?php echo number_format($giohang['gia'])." đ"; ?>
	                                    </span>
	                                    <br>
	                                    <label>Số lượng</label>
	                                    <span>
	                                        <?php echo $_SESSION['giohang'][$i]['soluong']; ?>
	                                    </span>
	                                </div>
	                                <div class="col-md-2">
	                                    <button class="btn btn-danger">
	                                        <a href="deletecart.php?cid=<?php echo $_SESSION['giohang'][$i]['id'];?>">
					    	<i class="fa fa-trash" style="color: white"></i></a>
	                                    </button>
	                                </div>
	                            </li>

	                            <?php
					            		}// end for
					            ?>
	                        </ul>
	                    </div> <!-- cart-block-list -->
	                    <div class="toal-cart">
	                        <span>Tổng:</span>
	                        <span class="toal-price pull-right">
	                            <span>
	                             <?php echo number_format($tongtien)." đ"; ?>
	                            </span>
	                        </span>
	                    </div> <!-- toal-cart -->
	                    <div class="cart-buttons">
	                        <button class="btn btn-danger">
	                            <a href="index.php" style="color:#fff">Thanh toán</a>
	                        </button>
	                        <button class="btn btn-warning">
	                            <a href="chitietgiohang.php" style="color:#fff">Vào trang giỏ hàng</a>
	                        </button>
	                    </div> <!-- cart-buttons -->
	                </div> <!-- cart-block-content -->
	            </div> <!-- end cart-block -->
			            
	            <?php 
	        		}// end else
	        		
	             ?>
	        </div> <!-- col-md-2 shopping-cart l1 -->
	    </div>
	</div>
				
</header>



