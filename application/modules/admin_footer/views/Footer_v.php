
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
		<strong>&copy;2017 <a href="<?php echo base_url();?>Admin/Home">Online Shop</a></strong> 
    </div>
    <strong>&nbsp</strong> 
  </footer>

  
</div>
<!-- ./wrapper -->


	<!-- jQuery 2.2.3 -->
	<!-- Bootstrap 3.3.6 -->
	<script src="<?php echo $url_theme_admin;?>bootstrap/js/bootstrap.min.js"></script>
	<!-- DataTables -->
	<script src="<?php echo $url_theme_admin;?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo $url_theme_admin;?>plugins/datatables/dataTables.bootstrap.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo $url_theme_admin;?>dist/js/demo.js"></script>
	
	<!-- datepicker -->
	<script src="<?php echo $url_theme_admin;?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
	<script src="<?php echo $url_theme_admin;?>plugins/datepicker/bootstrap-datepicker.js"></script>
	<script src="<?php echo $url_theme_admin;?>plugins/datepicker/bootstrap-timepicker.js"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="<?php echo $url_theme_admin;?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<!-- Slimscroll -->
	<script src="<?php echo $url_theme_admin;?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?php echo $url_theme_admin;?>plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo $url_theme_admin;?>dist/js/app.min.js"></script>
	<!-- page script -->
	<script>
	
	  $(function () {
		$("#example1").DataTable();
		$('#example2').DataTable({
		  "paging": true,
		  "lengthChange": false,
		  "searching": false,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});
	  });
	</script>
	
	<script type="text/javascript" src="<?php echo $url_theme_admin;?>bootstrap/js/bootstrap-filestyle.min.js"> </script>
	<script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=aepwvxvuqafyagriw3ybyux2r86iote7lv9agkg1rqxl24y2'></script>
	
	<!-- Configure TinyMCE -->
	<script type="text/javascript">
		tinyMCE.init({
				selector: '#deskripsi',
		});
	</script>
	
</body>
</html>
