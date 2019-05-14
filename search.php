<?php ob_start(); ?>
<?php require_once "inc/connect.php"; ?>
<?php require_once "inc/function.php"; ?>
<?php require_once "inc/header.php"; ?>
<?php require_once "inc/giohang.php"; ?>
<?php require_once "inc/menu_top.php"; ?>
<div class="container">
    <?php 
        if (isset($_REQUEST['submit'])) {
        $search=$_GET['timkiem'];
     ?>
        <nav aria-label="breadcrumb" style="margin-left:-41px;">
          <ol class="breadcrumb" style="margin-bottom: 0px;">
            <li class="breadcrumb-item"><a href="index.php">HOME</a></li>
            <li class="breadcrumb-item">Từ khoá</li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $search;?></li>
          </ol>
        </nav>
    <div class="row">
        <div class="col-md-9 nopadding">
        <!-- noi dung chinh giua trang -->
            <div class="row">
                <div class="nt7-tabs">
                    <a class="root" href="">Kết quả tìm kiếm</a>
                    <div class="clearfix"></div>
                </div> <!-- end nt7-tabs -->
            </div> <!-- end row -->
            <div class="row">
                <div class="nt7_product">
                    <!-- col-md-3 -->
                    <?php 
                            if (empty($search)) 
                    {
                        echo "Bạn nhập từ cần tìm";
                    }
                    else
                    {
                    $query_s="SELECT * FROM sanpham WHERE tensp like '%$search%'";
                    $result_s=mysqli_query($connect,$query_s);
                    kt_query($result_s,$query_s);
                    if (mysqli_num_rows($result_s)==0) // nếu thêm thành công 
                            {
                                echo "<p class='text-danger'>Ko có sản phẩm nào</p>";
                            }   
                    
                    else
                    {
                   while ($tk=mysqli_fetch_array($result_s,MYSQLI_ASSOC)) {
                    ?>
                    <div class="col-md-3 osp">
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <img src="<?php echo $tk['anh'];?>" alt="">
                                <div>
                                    <a href="chitietsanpham.php?spid=<?php echo $tk['id'];?>" class="btn">Xem</a>
                                    <a href="?id=<?php echo $tk['id'];?>" class="btn share_link_fb" title="Thêm vào giỏ" onclick="return confirm('Bạn có muốn thêm sản phẩm vào giỏ');"><span class="fa fa-shopping-cart"></span></a>
                                </div>
                            </div> <!-- end pi-img-wrapper -->
                            <h3><a href=""><?php echo $tk['tensp'];?></a></h3>
                            <div class="pi-price">
                                <span style="float: left;"><?php echo number_format($tk['gia']);?></span>
                                <small style="text-decoration: line-through;float: right;color: black"><?php echo number_format($tk['sale']);?></small>
                            </div> <!-- end pi-price -->
                        </div> <!-- end product-item -->
                    </div> <!-- end col md 3 -->
                    <?php   
                            }//while
                            }// end else
                        }// end if $_request
                    }
                        else
                        {
                            header("location:index.php");
                        }
                     ?>
                </div><!-- end nt7_product -->
            </div> <!-- end row  -->
        <!-- end noi dung chinh giua trang -->      
        </div> <!-- end col 9 -->
        <div class="col-md-3" style="padding-right:0;">
            <div class="benphai">
                <div id="slider">
                <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                      <img class="img-responsive" src="images/slide/7.jpg" alt="banner" height="248px">
                    </div>
                
                    <div class="item">
                      <img class="img-responsive" src="images/slide/8.jpg" alt="banner" height="248px">
                    </div>
                
                    <div class="item">
                      <img class="img-responsive" src="images/slide/6.jpg" alt="banner" height="248px">
                    </div>
                    
                  </div>
                </div>
            </div> <!-- end slide -->
                <div style="clear:both"></div>
                    <!-- Có thể bạn quan tâm -->
                    <div>
                        <label class="title5">Có thể bạn quan tâm</label>
                        <?php 
                        $query_rd="SELECT * FROM sanpham ORDER BY rand() DESC LIMIT 0,4";
                                    $result_rd=mysqli_query($connect,$query_rd);
                                    kt_query($result_rd,$query_rd);
                                    while ($sprd=mysqli_fetch_array($result_rd,MYSQLI_ASSOC)) 
                                    {
                        ?>
                        <div class="noibat">
                            <img src="<?php echo $sprd['anh']; ?>" class="img2">
                            <p align="center" style="margin:0;padding: 0 41px;"><?php echo $sprd['tensp']; ?></p>
                            <div class="giaca">
                                <span><?php echo number_format($sprd['gia'])." đ";?></span>
                                <small style="text-decoration: line-through;color: black"><?php echo number_format($sprd['sale'])." đ";?></small>
                            </div>
                            <!-- end pi-price -->
                            <a href="?id=<?php echo $sprd['id'];?>" class="btn btn-primary center-block" style="width: 100px;height: 30px ;margin: 10px 90px 10px"  title="Thêm vào giỏ" onclick="return confirm('Bạn có muốn thêm sản phẩm vào giỏ');"><span class="fa fa-shopping-cart"></span></a>
                            </div><!-- end noi bat --> 
                        <?php
                                        }   
                         ?>   
                            <div style="clear:both"></div>      
        </div> <!-- end san pham noi bat -->    
        </div> <!-- end col-md-3 -->
    </div> <!-- row -->
</div> <!-- container -->
</div>
<?php require_once "inc/footer.php"; ?>
