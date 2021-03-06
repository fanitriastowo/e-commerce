<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

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

$(".count_product_by_category").each(function(){
   	var id = $(this).attr('id');
	var count = '<?php echo site_url("product/count_product_by_category/"); ?>/' + id;
	$.getJSON(count, function(data) {
		$('.count_product_by_category_result_' + id).html(data);
	});
});
// ====================================================================================

$("#search").autocomplete({
    source: "<?php echo site_url('product/get_product_autocomplete'); ?>" // path to the get products method
});

<?php if (!$this->ion_auth->is_admin()): ?>
	var totalProductsURL = "<?php echo site_url('product/total_products'); ?>";
	$.getJSON(totalProductsURL, function(data) {
		$('#cart').html(data);
	});
<?php endif ?>
});

</script>