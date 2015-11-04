<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.validate.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/additional-methods.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/bootstrap.min.js'); ?>"></script>

<style type="text/css">
	.calendar {
		position: fixed;
		bottom: 0;
		left: 0;
		background-color: #663300;
	}

	.clock {
		width: 180px;
		margin: 0 auto;
		border: 1px solid #333;
		color: #fff;
	}

	#Date {
		font-family: 'BebasNeueRegular', Arial, Helvetica, sans-serif;
		font-size: 12px;
		text-align: center;
		text-shadow: 0 0 5px #00c6ff;
	}

	.separator {
		width: 180px;
		margin: 0 auto;
		padding: 0px;
		list-style: none;
		text-align: center;
	}

	.separator > .inline-time {
		display: inline;
		font-size: 12px;
		text-align: center;
		font-family: 'BebasNeueRegular', Arial, Helvetica, sans-serif;
		text-shadow: 0 0 5px #00c6ff;
	}

	#point {
		position: relative;
		padding-left: 5px;
		padding-right: 5px;
	}
</style>

<div class="calendar">
	<div class="clock">
		<div id="Date"></div>
		<ul class="separator">
			<li class="inline-time" id="hours"></li>
			<li class="inline-time" id="point">:</li>
			<li class="inline-time" id="min"></li>
		</ul>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){

// Create two variable with the names of the months and days in an array
var monthNames = [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ]; 
var dayNames= ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"]

// Create a newDate() object
var newDate = new Date();

// Extract the current date from Date object
newDate.setDate(newDate.getDate());

// Output the day, date, month and year   
$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
setInterval( function() {
	// Create a newDate() object and extract the minutes of the current time on the visitor's
	var minutes = new Date().getMinutes();
	// Add a leading zero to the minutes value
	$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
},1000);

setInterval( function() {
	// Create a newDate() object and extract the hours of the current time on the visitor's
	var hours = new Date().getHours();
	// Add a leading zero to the hours value
	$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
}, 1000);	
	
<?php if (!$this->ion_auth->is_admin()): ?>
	var totalProductsURL = '<?php echo site_url("product/total_products"); ?>';
	$.getJSON(totalProductsURL, function(data) {
		$('#cart').html(data);
	});
	
	$(".count_product_by_category").each(function(){
	   	var id = $(this).attr('id');
		var count = '<?php echo site_url("product/count_product_by_category/"); ?>/' + id;
		$.getJSON(count, function(data) {
			$('.count_product_by_category_result_' + id).html(data);
		});
	});
<?php endif ?>
});

</script>