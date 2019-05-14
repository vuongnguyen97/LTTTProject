<?php 
// hàm kiểm tra lỗi mysql
	function kt_query($result,$query)
	{
        // biến toàn cục
		global $connect;
		if (!$result) 
		{
			die("Lỗi rồi {$query}".mysqli_error($connect));			
		}

	}
	/**
    * debug
    **/
    function _debug($data) {

        echo '<pre style="background: #000; color: #fff; width: 100%; overflow: auto">';
        echo '<div>Your IP: ' . $_SERVER['REMOTE_ADDR'] . '</div>';

        $debug_backtrace = debug_backtrace();
        $debug = array_shift($debug_backtrace);

        echo '<div>File: ' . $debug['file'] . '</div>';
        echo '<div>Line: ' . $debug['line'] . '</div>';

        if(is_array($data) || is_object($data)) {
            print_r($data);
        }
        else {
            var_dump($data);
        }
        echo '</pre>';
    }
    /**
    * tao slug
    **/

    function to_slug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
    function show_categories($parent_id="0",$insert_text="-")
    {
        global $connect;
        $select_dq="SELECT * FROM danhmucbaiviet WHERE parent_id=".$parent_id." ORDER BY parent_id DESC";
        $query_dq=mysqli_query($connect,$select_dq);
        while($category=mysqli_fetch_array($query_dq,MYSQLI_ASSOC))
        {
            echo ("<option value='".$category["id"]."'>".$insert_text.$category["danhmucbaiviet"]."</option>");
            show_categories($category["id"],$insert_text."-");
        }
        return true;
    }
    function select_categories($name,$class)
    {
        global $connect;
        echo "<select name='$name' class='$class'>";
        echo "<option value='0'>Danh mục cha</option>";
        show_categories();
        echo "</select>";
    }
    function show_danhmucsanpham($parent_id="0",$insert_text="-")
    {
        global $connect;
        $select_dmsp="SELECT * FROM menu_sub WHERE id=".$parent_id." ORDER BY parent_id DESC";
        $query_dmsp=mysqli_query($connect,$select_dmsp);
        while($danhmucsanpham=mysqli_fetch_array($query_dmsp,MYSQLI_ASSOC))
        {
            echo ("<option value='".$danhmucsanpham["id"]."'>".$insert_text.$danhmucsanpham["menusub_name"]."</option>");
            show_danhmucsanpham($danhmucsanpham["id"],$insert_text."-");
        }
        return true;
    }
    function select_danhmucsanpham($name,$class)
    {
        global $connect;
        echo "<select name='$name' class='$class'>";
        echo "<option value='0'>Danh mục cha</option>";
        show_danhmucsanpham();
        echo "</select>";
    }
	function menu_dacap($parent_id=0,$dem=0)//parent_id =0  để hiển thị danh mục cha
	{
		global $connect;
		$cate_child=array();
		$query_meunu="SELECT * FROM category WHERE parent_id=".$parent_id." ORDER BY id ";
		$result_menu=mysqli_query($connect,$query_meunu);
		kt_query($result_menu,$query_meunu);
		while($catelogy=mysqli_fetch_array($result_menu,MYSQLI_ASSOC))
		{
			$cate_child[]=$catelogy;
		}
		/*echo "<pre>";
		print_r($cate_child);
		echo "</pre>";*/
		//Nếu mảng này tồn tại
		if($cate_child)
		{
			if($dem==0)
			{
				echo "<ul class='parent' >";
			}
			else
			{
				echo "<ul>";
			}
			foreach ($cate_child as $key => $item)
			{
				//Hiện menu con
				echo "<li><a href=''>".$item['name']."</a>";
				menu_dacap($item['id'],++$dem);				
				echo "</li>";
			}
			echo "</ul>";
		}
	}

 ?>