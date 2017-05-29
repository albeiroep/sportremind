	<footer>
		<div class="container">
		</div>
	</footer>

	<!--<script type="text/javascript" src="<?php //echo base_url(); ?>js/jquery-3.2.1.min.js"></script>-->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/datepicker-es.js"></script>
	<!--<script type="text/javascript" src="<?php //echo base_url(); ?>js/bootstrap-datepicker.js"></script>-->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	
	<script>
		$(function() {
			$('.datepicker').datepicker({
				dateFormat: "yy/mm/dd",
				changeMonth:true,
				changeYear:true,
				monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Agosto", "Sept", "Oct", "Nov", "Dic" ],
				maxDate: "0"
			});
		});
	</script>
</body>
</html>