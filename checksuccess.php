<?php 
ob_start();
 ?>
<?php include("inc/header.php"); ?>
<?php require_once "inc/connect.php"; ?>
<?php require_once "inc/function.php"; ?>
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
                <div class="row" style="padding-top: 22px;margin-left: -32px;">
                     <div class="col-md-12 bg-success text-center">
                        <label>Thông tin đặt hàng</label>
                        <p class="text-success">Quý khách đã đặt hàng thành công, chúng tôi sẽ liên hệ với quý khách trong thời gian sớm nhất</p>
                  
                        
                    </div><!-- end col md 9 -->
                    <div class="col-md-3  pull-right sp">
                        <!-- san pham noi bat -->
                        <div class="noibat">
                            <p class="title2">Sản phẩm cùng nhóm</p>
                            <img src="images/sanpham/tvbox/vibox 2 pro/0.jpg" class="img2">
                            <p align="center" style="margin:0;">Egreat A5 Android TV Box 4K HD Player</p>
                            <div class="giaca">
                                <span> 500.000đ</span>
                                <small style="text-decoration: line-through;color: black">200.000đ</small>
                            </div>
                            <!-- end pi-price -->
                            <button type="button" class="btn btn-warning center-block">Mua ngay</button>
                        </div><!-- end noi bat -->                     
                        <!-- end san pham noi bat -->
                    </div><!-- end col md 3 -->     
                </div><!-- end row -->    
            </div><!-- end container -->
            <div style="clear:both"></div>
            <?php include("inc/footer.php"); ?>