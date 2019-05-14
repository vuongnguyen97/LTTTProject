
 </div><!-- /.container-fluid -->
 	</div><!-- /#page-wrapper -->

 </div><!-- /#wrapper -->
    

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
    // noidung là id trong thẻ input
    	CKEDITOR.replace('noidung');
		CKEDITOR.replace('khuyenmai');
    </script>
	<!-- thư viện date picker bootrap ngày tháng năm-->
	<link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript">
	  $(function () {  
	     $("#datepicker").datepicker({         
	         autoclose: true,         
	         todayHighlight: true 
	     }).datepicker('update', new Date());
	  });
	</script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
	
    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>
	
</body>

</html>

