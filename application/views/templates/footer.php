<footer class="main-footer text-sm text-success">
	<strong>Copyright &copy; <?php echo date("Y"); ?><a href="#" class="text-muted"> Ambulance Africa Dashboard</a>.</strong>
	All rights reserved.
</footer>
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
<script src="<?php echo base_url("assets/backend/plugins/jquery/jquery.min.js");?>"></script>
<script src="<?php echo base_url("assets/backend/plugins/jquery-ui/jquery-ui.min.js");?>"></script>
<script>
	$.widget.bridge('uibutton', $.ui.button)

</script>
<script src="<?php echo base_url("assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js");?>"></script>
<script src="<?php echo base_url("assets/backend/plugins/js/select2.full.min.js");?>"></script>
<script src="<?php echo base_url("assets/backend/plugins/js/Chart.min.js");?>"></script>
<script src="<?php echo base_url("assets/backend/plugins/js/sparkline.js");?>"></script>
<script src="<?php echo base_url("assets/backend/plugins/js/jquery.knob.min.js");?>"></script>
<script src="<?php echo base_url("assets/backend/plugins/js/moment.min.js");?>"></script>
<script src="<?php echo base_url("assets/backend/plugins/js/daterangepicker.js");?>"></script>
<script src="<?php echo base_url("assets/backend/plugins/js/tempusdominus-bootstrap-4.min.js");?>"></script>
<script src="<?php echo base_url("assets/backend/plugins/js/summernote-bs4.min.js");?>"></script>
<script src="<?php echo base_url("assets/backend/plugins/js/jquery.overlayScrollbars.min.js");?>"></script>
<script src="<?php echo base_url("assets/backend/dist/js/adminlte.min.js");?>"></script>
<script src="<?php echo base_url("assets/backend/dist/js/demo.js");?>"></script>
<script src="<?php echo base_url("assets/backend/plugins/js/jquery.dataTables.min.js");?>"></script>
<script src="<?php echo base_url("assets/backend/plugins/js/dataTables.bootstrap4.min.js");?>"></script>
<script src="<?php echo base_url("assets/backend/plugins/js/dataTables.responsive.min.js");?>"></script>
<script src="<?php echo base_url("assets/backend/plugins/js/responsive.bootstrap4.min.js");?>"></script>
<script src="<?php echo base_url('assets/backend/plugins/js/simplebar.js');?>"></script>
<script src="<?php echo base_url('assets/backend/plugins/js/Chart.min.js');?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url('assets/backend/plugins/js/morris.min.js');?>"></script>
<script src="<?php echo base_url('assets/backend/plugins/js/raphael.min.js');?>"></script>
<script>
	$(function () {
		$("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});

		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"paymenting": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});

</script>
<script>
	$(document).ready(function () {
		var serries = JSON.parse(`<?php echo $graphdata; ?>`);
		console.log(serries);
		var data = serries
		window.morrisDashboardChart = new Morris.Bar({
			element: 'morris-area-chart',
			data: serries,
			xkey: 'y',
			ykeys: ['a'],
			labels: ['users'],
			lineColors: ['#fff'],
			fillOpacity: '0.2',
			gridEnabled: true,
			gridTextColor: '#ffffff',
			resize: true
		});

	});
</script>
</body>
</html>
