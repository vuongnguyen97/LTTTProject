<?php include('include/header.php'); ?>
<?php include('../inc/function.php'); ?>
<?php include("../inc/connect.php");?>
<div class="row">
    <h3>Danh sách sản phẩm</h3>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <table class="table table-hover">
            <thead>
                <th>Mã</th>
                <th>Tên danh mục</th>
                <th>Slug</th>
                <th>Icon</th>
                <th>Ngày tạo</th>
                <th>Trạng thái</th>
                <th>Sữa</th>
                <th>Xóa</th>
            </thead>
            <tbody>
                <?php
                    //Đặt số bản ghi cần hiển thị. Trên 1 test = 4 bản ghi
                    	$limit=4;
                    //Xác định vị trí bắt đầu start
                    	if(isset($_GET['s']) && filter_var($_GET['s'],FILTER_VALIDATE_INT,array('min_range'=>1)))
                    	{
                    		$start=$_GET['s'];
                    	}
                    	else
                    	{
                    		$start=0;
                    	}
                    	//Kiểm tra nếu nó tồn tại và là kiểu số
                    	if(isset($_GET['p']) && filter_var($_GET['p'],FILTER_VALIDATE_INT,array('min_range'=>1)))
                    	{
                    		$per_page=$_GET['p'];
                    	}
                    	else
                    	{
                    		//Nếu p không có, thì sẽ truy vấn CSDL để tìm xem có bao nhiêu page
                    		$query_pg="SELECT COUNT(id) FROM menu";
                    		$result_pg=mysqli_query($connect,$query_pg);
                    		kt_query($result_pg,$query_pg);
                    		//list là hàm dùng để tính bản ghi biến $record
                    		list($record)=mysqli_fetch_array($result_pg,MYSQLI_NUM);
                    		//Tìm số trang bằng cách
                    		if($record > $limit)
                    		{
                    			//hàm ceil dùng để làm tròn 
                    			$per_page=ceil($record/$limit);
                    		}
                    		else
                    		{
                    			$per_page=1;
                    		}
                    	} 
                    	$query="SELECT * FROM menu ORDER BY id LIMIT {$start},{$limit}";
                    	$result=mysqli_query($connect,$query);
                    	kt_query($result,$query); // Hàm kiểm tra có lỗi sql ko
                    	while ($slide1=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
                    	{
                    
                    	?>
                <tr>
                    <td><?php echo $slide1['id']; ?></td>
                    <td><?php echo $slide1['menu_name']; ?></td>
                    <td><?php echo $slide1['menu_name']; ?></td>
                    <td><?php echo $slide1['icon']; ?></td>
                    <td><?php echo $slide1['date_create']?></td>
                    <td>
                        <?php if( $slide1['home']==1){echo 'Hiển thị';}
                            else {echo 'Không hiển thị';} 	
                            ?>		
                    </td>
                    <td>
                        <a href="edit_catelogy.php?id=<?php echo $slide1['id']; ?>">
                        <img src="../images/edit.png" width="16">
                        </a>
                    </td>
                    <td>
                        <a onclick="return confirm('Bạn thực sự muốn xóa không');" 
                            href="delete_catelogy.php?id=<?php echo $slide1['id']; ?>">
                        <img src="../images/delete.png" width="16">
                        </a>
                    </td>
                </tr>
                <?php
                    }
                    ?>
            </tbody>
        </table>
        <?php
            echo "<ul class='pagination'>";
            	if($per_page>1)
            	{
            		$current_page=($start/$limit) + 1;
            		//Nếu không phải trang đầu thì hiển thị trang trước
            		if($current_page!=1)
            		{
            			echo "<li><a href='list_catelogy.php?s=".($start - $limit)."&p={$per_page}'>Quay lại</a></li>";
            		}
            		//Hiển thì phần còn lại của trang
            		for($i=1;$i<=$per_page;$i++)
            		{
            			if($i != $current_page)
            			{
            				echo "<li><a href='list_catelogy.php?s=".($limit * ($i - 1 ))."&p={$per_page}'>{$i}</a></li>";
            			}
            			else
            			{
            				//Nếu bằng thì k cho nó link
            				echo "<li class='active'><a>{$i}</a></li>";
            			}
            		}
            		//Nếu không phải là trang cuối thì hiển thị nút next
            		if($current_page != $per_page)
            		{
            			echo "<li><a href='list_catelogy.php?s=".($start + $limit)."&p={$per_page}'>Tiếp theo</a></li>";
            		}
            	}
            echo "</ul>";
            ?>
    </div>
</div>
<?php include('include/footer.php'); ?>