<?php ob_start(); ?>
<?php require_once "inc/connect.php"; ?>
<?php require_once "inc/function.php"; ?>
<?php include("inc/header.php"); ?>
    <div style="clear:both"></div>
    <!-- mua hang -->
    <?php include("inc/giohang.php"); ?>
        <!-- end mua hang /- -->
        <div style="clear:both"></div>
        <!-- menu top -->
        <?php include("inc/menu_top.php"); ?>
            <!-- end menu top -->
            <div style="clear:both"></div>
            <div class="container">
                <div class="row" style="padding-top: 22px;">
                    <div class="col-md-9" style="background:#ffffff;">
                        <?php 
                        //nếu tồn tại ['id'] và là số nguyên nằm trong mảng phải lớn hơn
                            if (isset($_GET['spid']) && filter_var($_GET['spid'], FILTER_VALIDATE_INT, array('min_range' >= 1))) 
                            {
                                $id = $_GET['spid'];
                                
                            } 
                            else 
                            {
                                header("location:index.php");
                                exit();
                            } 
                            $query_ctsp="SELECT * FROM sanpham WHERE id=$id ";
                                $result_ctsp=mysqli_query($connect,$query_ctsp);
                                kt_query($result_ctsp,$query_ctsp);
                                while ($ctsp=mysqli_fetch_array($result_ctsp,MYSQLI_ASSOC)) 
                                {
                                    $_SESSION['splq']=$ctsp;
                        ?>
                        <div class="preview col-md-5">
                            <div class="preview-pic tab-content">
                                
                                <div class="tab-pane active" id="pic-1"><img src="<?php echo $ctsp['anh'];?>" alt="">
                                </div>
                             
                            </div>
                          
                        </div>
                        <div class="details col-md-7">
                            <h3 class="product-title"><?php echo $ctsp['tensp']; ?></h3>
                            <div class="rating">
                                <span class="review-no"><?php echo $ctsp['view'] ?> lượt xem</span>
                            </div>
                            <h4 class="price"><?php echo number_format($ctsp['gia'])." đ";?></h4>
                            <small style="text-decoration: line-through;"><?php echo number_format($ctsp['sale'])." đ";?></small>
                            <p class="vote">
                                <strong>
                                Bảo hành:
                                <?php if ($ctsp['baohanhsp']==1)
                                {
                                    echo "12 tháng";
                                }
                                else{ echo "6 tháng";}  ?>
                            </strong></p>
                            <p class="vote">
                                <strong>
                                Tình trạng:
                                <?php if ($ctsp['status']==1)
                                {
                                    echo "Còn hàng";
                                }
                                else{ echo "Hết hàng";}  ?>
                            </strong></p>
                            <div class="action">
                                <a href="muangay.php?kid=<?php echo $id;?>">
                                    <button class="add-to-cart btn btn-default" type="button"><img src="images/cart.png" alt="" /> MUA NGAY</button>
                                </a>
                                <a href="?id=<?php echo $id;?>" onclick="return confirm('Bạn có muốn thêm sản phẩm vào giỏ');">
                                    <button class="add-to-cart btn btn-default vaogio" type="button"><img src="images/cart-plus.png" alt="" /> THÊM VÀO GIỎ HÀNG</button>
                                </a>
                            </div>
                            <!-- end action -->
                            <?php if ($ctsp['motakhuyenmai']!=""): ?>
                                <div class="row">
                                    <div class="sale-box">
                                        <div>
                                            <h3 class="sale-b-ttl active" rel_data="khuyenmai">
                                              <i class="fa fa-gift qua"></i>
                                              <span>Khuyến mãi khi mua hàng</span>
                                           </h3>
                                        </div>
                                        <div class="sale-b-ct clearfix khuyenmai visible">
                                            <p><strong><?php echo $ctsp['motakhuyenmai']; ?></strong></p>
                                        </div>
                                        <!-- end sale-b-ct clearfix khuyenmai visible -->
                                    </div><!-- end sale-box -->       
                                  </div><!-- end row -->       
                            <?php endif ?>
                        </div><!-- details md7 -->
                        <div class="row">
                            <!-- Nội dung chi tiết -->
                            <div class="container">
                                <div class="col-md-9">
                                    <div id="main">

                                        <div class="group-tabs">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Chi tiết</a></li>
                                                <?php if ($ctsp['thongso']!="") 
                                                    { 
                                                ?>
                                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Thông số</a></li>
                                                <?php }// if chitiet ?>
                                                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Hình ảnh</a></li>
                                                <?php if ($ctsp['video']!="") 
                                                    { 
                                                ?>
                                                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Video</a></li>
                                            <?php }// if video ?>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="home">
                                                    <?php echo $ctsp['noidung']; ?>
                                                </div>
                                                <!-- end tabpanel -->
                                                <div role="tabpanel" class="tab-pane" id="profile">
                                                    <?php echo $ctsp['thongso']; ?>
                                                </div>
                                                <!-- end tabpanel -->
                                                <div role="tabpanel" class="tab-pane" id="messages">
                                                    <div class="col-md-6 col-md-push-2">
                                                        <img src="<?php echo $ctsp['anh']; ?>">
                                                    </div><!-- hinhanhsp -->
                                                </div>
                                                <!-- end tabpanel -->
                                                <div role="tabpanel" class="tab-pane" id="settings"><?php echo $ctsp['video']; ?></div>
                                                <!-- end tabpanel -->
                                            </div> <!--  end tab-content -->
                                        </div> <!-- end group tab -->
                                    </div><!-- end main -->
                                </div><!-- end col 9 -->  
                            </div><!-- end container -->
                          </div><!-- end row --> 
                        <?php            
                            } // end if
                        ?>
                    </div><!-- end col md 9 -->
                    <div class="col-md-3 pull-right sp">
                        <!-- san pham cung nhóm -->
                        <label class="title2">Sản phẩm cùng nhóm</label>
                        <?php 
                        $query_cn="SELECT * FROM sanpham WHERE id!={$_SESSION['splq']['id']} AND category_id={$_SESSION['splq']['category_id']} ";
                                    $result_cn=mysqli_query($connect,$query_cn);
                                    kt_query($result_cn,$query_cn);
                                    while ($spcn=mysqli_fetch_array($result_cn,MYSQLI_ASSOC)) 
                                    {
                        ?>
                        <div class="noibat">
                            <img src="<?php echo $spcn['anh']; ?>" class="img2">
                            <p align="center" style="margin:0;padding: 0 41px;"><?php echo $spcn['tensp']; ?></p>
                            <div class="giaca">
                                <span><?php echo number_format($spcn['gia'])." đ";?></span>
                                <small style="text-decoration: line-through;color: black"><?php echo number_format($spcn['sale'])." đ";?></small>
                            </div>
                            <!-- end pi-price -->
                             <a href="?id=<?php echo $spcn['id'];?>" style="width: 100px;height: 30px ;margin: 10px 90px 10px" class="btn btn-primary share_link_fb" title="Thêm vào giỏ" onclick="return confirm('Bạn có muốn thêm sản phẩm vào giỏ');"><span class="fa fa-shopping-cart"></span></a>
                            </div><!-- end noi bat --> 
                        <?php
                                        }   
                         ?>                 
                  </div>      
                </div><!-- end row -->    
            </div><!-- end container -->
            <div style="clear:both"></div>
            <?php include("inc/footer.php"); ?>