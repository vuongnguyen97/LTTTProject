<div class="container">
    <div class="row">
        <div class="col-md-9 nopadding">
            <div class="row">
                <div class="col-md-3 nopadding">
                    <div class="root-box">
                        <?php include("connect.php"); ?>
                        <?php include("function.php"); ?>
                        <?php 
                            $query_mn="SELECT * FROM menu WHERE home=1 LIMIT 0,10";
                            $result_mn=mysqli_query($connect,$query_mn);
                            	while ($category=mysqli_fetch_array($result_mn,MYSQLI_ASSOC)) 
                            	{	
                            ?>
                        <ul class="root">
                            <li >
                                <a class='parent' href='chitietdanhmuc.php?dmid=<?php echo $category['id'];?>'>
                                <img class="icon-menu mn1" src="<?php echo $category['icon']; ?>" width='21' height='16'>
                                <?php echo $category['menu_name']; ?>
                                </a>
                            <?php 
                                $xhtml = '';
                                $id=$category['id'];
                                $query_sub="SELECT * FROM menu_sub WHERE parent_id=$id";
                                $result_sub=mysqli_query($connect,$query_sub);
                                while ($menusub=mysqli_fetch_array($result_sub,MYSQLI_ASSOC)) 
                                {
                            		$xhtml .= '<li>
                            <a class="parent" href="chitietdanhmuc.php?key='.$menusub['id'].'">'.$menusub['menusub_name'].'</a>
                            </li>';			
                                }
                                if($xhtml != ''){
                                	$str = '<div class="sub-box col-md-12">';
                                	$str .= '<ul class="sub">';
                                	$str .= $xhtml;
                                	$str .= '</ul>';
                                	$str .= '</div>';
                                	echo $str;
                                }				
                              ?>
                            </li>
                        </ul>
                        <!-- end root -->
                        <?php 
                            } // end while $menu 
                            ?>
                    </div><!-- end root box-->
                    
                </div>
                <!-- end col-md-3 -->
                <div class="col-md-9" >
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" 	style="margin-top: 12px;">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="images/slide/bg1.jpg" alt="banner">
                            </div>
                            <div class="item">
                                <img src="images/slide/bg2.jpg" alt="banner">
                            </div>
                            <div class="item">
                                <img src="images/slide/bg3.jpg" alt="banner">
                            </div>
                            <div class="item">
                                <img src="images/slide/bg4.jpg" alt="banner">
                            </div>
                     
                        </div>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!-- end Wrapper for slides -->	
                </div>
                <!-- end col-md-9 -->
            </div><!-- end row -->
            <!-- lấy danh mục sản phẩm -->
            <?php 
                $query="SELECT * FROM menu WHERE home=1 ";
                $result=mysqli_query($connect,$query);
                kt_query($result,$query);
                ?>         
            <!-- noi dung chinh giua trang -->
            <?php
                while($danhmuc=mysqli_fetch_array($result)){
                
                ?>
            <div class="row">
                <div class="nt7-tabs">
                    <a class="root" href=""><?php echo $danhmuc['menu_name'] ?></a>
                    <?php 
                        $query1="SELECT * FROM menu_sub WHERE parent_id={$danhmuc['id']}";
                        $result1=mysqli_query($connect,$query1);
                        kt_query($result1,$query1);
                        while($danhmucsub=mysqli_fetch_array($result1)){;
                        ?>
                    <a class="sub" href=""><?php echo $danhmucsub['menusub_name'] ?></a>
                    <?php
                        }
                    ?>	
                    <a class="all" href="" title="">Xem tất cả <i class="glyphicon glyphicon-menu-right"></i></a>
                    <div class="clearfix"></div>
                </div>
                <!-- end nt7-tabs -->
            </div>
            <!-- end row -->
			
            <div class="row">
				
                <div class="nt7_product">
					<?php 
					$query3="SELECT * FROM sanpham WHERE category_id={$danhmuc['id']}";
                        $result3=mysqli_query($connect,$query3);
                        kt_query($result3,$query3);
                        while($sanpham=mysqli_fetch_array($result3)){
                        ?>			
                    <!-- col-md-3 -->
                    <div class="col-md-3 osp">		
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <img src="<?php echo $sanpham['anh']; ?>" alt="">
                                <div>
                                    <a href="chitietsanpham.php?spid=<?php echo $sanpham['id'];?>" class="btn">Xem</a>
                                    <a href="?id=<?php echo $sanpham['id'];?>" class="btn share_link_fb" title="Thêm vào giỏ" onclick="return confirm('Bạn có muốn thêm sản phẩm vào giỏ');"><span class="fa fa-shopping-cart"></span></a>
                                </div>
                            </div>
                            <!-- end pi-img-wrapper -->
							
                            <h3><a href=""><?php echo $sanpham['tensp'] ?></a></h3>
                            <div class="pi-price">
                                <span style="float: left;"><?php echo number_format($sanpham['gia']).' đ' ?></span>
                                <small class="giacu"><?php echo number_format($sanpham['sale']).'đ<br>' ?></small>
                            </div>
                            <!-- end pi-price -->
                        </div>
                        <!-- end product-item -->
                    </div>
                    <!-- end col md 3 -->
                    <!--  end col -->
					<?php
						}
					?>
                </div>
                <!-- end nt7_product -->
            </div>
            <!-- end row  -->
            <!-- end row  -->
            <!-- end noi dung chinh giua trang -->	
            <?php 
                }
                	  ?>
        </div>
        <!-- end col 9 -->
        <div class="col-md-3" style="padding-right:0;">
            <div class="benphai">
                <div id="slider">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive" src="images/slide/bg5.jpg" alt="banner" height="248px">
                            </div>
                            <div class="item">
                                <img class="img-responsive" src="images/slide/bg6.jpg" alt="banner" height="248px">
                            </div>
                            <div class="item">
                                <img class="img-responsive" src="images/slide/bg11.jpg" alt="banner" height="248px">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end slide -->
                <div style="clear:both"></div>
                <!-- ho tro truc tuyen -->
                <div class="noibat">
                    <p class="title2">Hỗ trợ trực tuyến</p>
                    <tr>
                        <td><img class="skype" src="images/skype.png" ></td>
                        <td>
                            <table>
                                <tr>
                                    <td>Bán hàng online</td>
                                </tr>
                                <tr>
                                    <td>Mr. Vương Nguyễn</td>
                                </tr>
                                <tr>
                                    <td>Hotline: <span style="color:red;font-weight: bold;">0973255257</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <hr>
                    <tr>
                        <td><img class="skype" src="images/skype.png" ></td>
                        <td>
                            <table>
                                <tr>
                                    <td>Bán hàng Bến Cát </td>
                                </tr>
                                <tr>
                                    <td>Mr. Tân Trần</td>
                                </tr>
                                <tr>
                                    <td>Hotline: <span style="color:red;font-weight: bold;">0834898439</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </div>
                <!-- end ho tro truc tuyen -->
                <!-- end ho tro truc tuyen -->
                <div style="clear:both"></div>
                <!-- san pham noi bat -->
                <div class="noibat">
                    <!-- Sản phẩm mới nhất -->
                        <label class="title4">Sản phẩm mới nhất</label>
                        <?php 
                        $query_new="SELECT * FROM sanpham ORDER BY id DESC LIMIT 0,7";
                                    $result_new=mysqli_query($connect,$query_new);
                                    kt_query($result_new,$query_new);
                                    while ($spmoi=mysqli_fetch_array($result_new,MYSQLI_ASSOC)) 
                                    {
                        ?>
                        <div class="noibat">
                            <img src="<?php echo $spmoi['anh']; ?>" class="img2">
                            <p align="center" style="margin:0;padding: 0 41px;"><?php echo $spmoi['tensp']; ?></p>
                            <div class="giaca">
                                <span><?php echo number_format($spmoi['gia'])." đ";?></span>
                                <small style="text-decoration: line-through;color: black"><?php echo number_format($spmoi['sale'])." đ";?></small>
                            </div>
                            <!-- end pi-price -->
                            
                              <a href="?id=<?php echo $spmoi['id'];?>" class="btn btn-primary center-block" style="width: 100px;height: 30px ;margin: 10px 90px 10px"  title="Thêm vào giỏ" onclick="return confirm('Bạn có muốn thêm sản phẩm vào giỏ');"><span class="fa fa-shopping-cart"></span></a>
                            </div><!-- end noi bat --> 
                        <?php
                                        }   
                         ?>    
                </div> <!-- end noi bat -->
            </div> <!-- end benphai -->       
        </div><!-- end col-md-3 -->       
    </div><!-- row -->  
</div><!-- container -->