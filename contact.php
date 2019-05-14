<?php ob_start(); ?>
<?php require_once "inc/connect.php"; ?>
<?php require_once "inc/function.php"; ?>
<?php require_once "inc/header.php"; ?>
<?php require_once "inc/giohang.php"; ?>
<?php require_once "inc/menu_top.php"; ?>
<div class="container">
        <nav aria-label="breadcrumb" style="margin-left:-41px;">
          <ol class="breadcrumb" style="margin-bottom: 0px;">
            <li class="breadcrumb-item"><a href="index.php">HOME</a></li>
            <li class="breadcrumb-item"><a href="contact.php">Liên hệ</a></li>
            <li class="breadcrumb-item active" aria-current="page"></li>
          </ol>
        </nav>
    <div class="row" style="margin-left:-32px;background: #fff;">
        <div class="col-md-8"> 
            <div class="title6">GỬI YÊU CẦU ĐẾN CHÚNG TÔI</div> 
            <div class="panel-body"> 
                 <form class="form-horizontal" role="form" action="" method="post"> 
                  <?php
                  $error=array(); 
                  if ($_SERVER['REQUEST_METHOD']=='POST') 
                  {
                    if (empty($_POST['name'])) 
                    {
                      $error[]='name';
                    } 
                    else 
                    {
                      $name=$_POST['name'];
                    }
                    if (empty($_POST['sdt'])) {
                      $error[]='sdt';
                    }
                    else {
                      $sdt=$_POST['sdt'];
                    }
                    if (empty($_POST['title'])) {
                      $error[]='title';
                    }
                    else {
                      $title=$_POST['title'];
                    }
                    if (empty($_POST['noidung'])) {
                      $error[]='noidung';
                    }
                    else {
                      $noidung=$_POST['noidung'];
                    }
                    
                    $mail=$_POST['mail'];
                    if (empty($error)) 
                    {
                      $query="INSERT INTO lienhe(hoten,email,dienthoai,title,noidung) 
                          VALUES ('{$name}','{$mail}','{$sdt}','{$title}','{$noidung}')";
                      $result=mysqli_query($connect,$query) or die("Lỗi rồi {$query}".mysqli_error($connect));
                      if(mysqli_affected_rows($connect)==1)
                      {
                        echo '<p style="color:green">Cám ơn bạn đã gửi liên hệ cho chúng tôi</p>';
                      }
                      else 
                      {
                        echo '<p style="color:red">Liên hệ chưa gửi đuợc</p>';
                      }
                      $_POST['title']='';
                      $_POST['link']='';
                      $_POST['orthernum']='';
                    }
                    else {
                      echo '<p style="color:red">Bạn hãy nhập đầy đủ thông tin</p>';
                    }
                  } 
                ?>
                    <div class="form-group"> 
                        <label class="col-sm-3 control-label">Họ và tên</label> 
                       <div class="col-sm-9"> 
                            <input class="form-control" id="inputEmail3" placeholder="Nhập tên của bạn" type="text" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>"> 
                            <?php if(isset($error) && in_array('name',$error)){echo '<p style="color:red">Bạn chưa nhập họ tên</p>';} ?>
                       </div> 
                  </div> <!-- end form-group -->
                  <div class="form-group"> 
                        <label class="col-sm-3 control-label">Địa chỉ email</label> 
                       <div class="col-sm-9"> 
                            <input class="form-control" id="inputEmail3" placeholder="Nhập email của bạn" type="email" name="mail"> 
                       </div> 
                  </div> <!-- end form-group -->
                  <div class="form-group"> 
                        <label class="col-sm-3 control-label">Điện thoại</label> 
                       <div class="col-sm-9"> 
                            <input class="form-control" id="inputEmail3" placeholder="Nhập số điện thoại của bạn" type="tel" name="sdt" value="<?php if(isset($_POST['sdt'])){echo $_POST['sdt'];} ?>">
                            <?php if(isset($error) && in_array('sdt',$error)){echo '<p style="color:red">Bạn chưa nhập số điện thoại</p>';} ?>
                       </div> 
                  </div> <!-- end form-group -->
                  <div class="form-group"> 
                        <label class="col-sm-3 control-label">Tiêu đề</label> 
                       <div class="col-sm-9"> 
                            <input class="form-control" id="inputEmail3" placeholder="Nhập tiêu đề" type="text" name="title" value="<?php if(isset($_POST['title'])){echo $_POST['title'];} ?>"> 
                            <?php if(isset($error) && in_array('title',$error)){echo '<p style="color:red">Bạn chưa nhập tiêu đề</p>';} ?>
                       </div> 
                  </div> <!-- end form-group -->
                  <div class="form-group"> 
                    <label class="col-sm-3 control-label">Nội dung</label> 
                       <div class="col-sm-9"> 
                            <textarea name="noidung" class="form-control" id="" cols="5" rows="10" placeholder="Xin quý khách vui lòng mô tả chi tiết"></textarea> 
                       </div> 
                  </div> <!-- end form-group -->
                  <div class="form-group last"> 
                   <div class="col-sm-offset-3 col-sm-9"><button type="submit" class="btn btn-primary btn-sm">Gửi liên hệ</button>
                   </div> 
                  </div> <!-- end form-group -->
                 </form> 
        </div> <!-- panel-body -->
    </div> <!-- end col 5 -->
    <div class="col-md-4">
           
           <h5 class="text-uppercase font-weight-bold title6">
                <i class="fas mr-3">&#xf0e0;</i> Website Bán Phụ Kiện
            </h5>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto pd-3" style="width: 60px;">
            <p>
                <i class="fas fa-home mr-3"></i> An phú - Thuận An - Bình Dương
            </p>
            <p>
                <i class="fas fa-envelope mr-3"></i> maquydoi0@gmail.com
            </p>
            <p>
                <i class="fas fa-phone mr-3"></i> + 01 234 567 88
            </p>
            <p>
                <i class="fas fa-print mr-3"></i> + 01 234 567 89
            </p>
            <p>
                <i class="fab fa-facebook mr-3"></i> <a href="https://www.fb.com/abc" style="color: black">Nguyễn Thành Lộc</a>
            </p>
            <p>
                <i class="fab fa-skype mr-3"></i> <a href="https://join.skype.com/F0aluObSiTty" style="color: black">Nguyễn Thành Lộc</a>
            </p>

        </div> <!-- end col 7 -->
        <div class="container">
        <div class="row">
            <div class="card col-md-12">
                <div class="card-body">
                    <h4 class="card-title text-center">
                        <i class='fas fa-globe' style='color:blue'></i>  TÌM TRÊN BẢN ĐỒ
                    </h4>
                </div>

                <iframe width="100%" height="500px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1384.9593751480768!2d106.74334355014294!3d10.943974450648856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d972a865fe9d%3A0x1ba36175feadc2f0!2zVsOybmcgWG9heSBBbiBQaMO6!5e0!3m2!1svi!2s!4v1554449908242!5m2!1svi!2s"></iframe>

            </div>
        </div>
    </div>
</div> <!-- row -->
</div><!-- container -->
<?php require_once "inc/footer.php"; ?>
