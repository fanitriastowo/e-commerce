<div class="col-sm-2">
	<div class="nav-side-menu">
		<div class="brand"><strong>Category</strong></div>
		<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-category"></i>

		<div class="menu-list">
			<ul id="menu-category" class="menu-content collapse out">
			<?php foreach ($categories as $category): ?>
				<li>            	
					<a class="count_product_by_category" id="<?php echo $category->id; ?>"  href="<?php echo site_url('category/detail/' . $category->id); ?>">
						<i class="fa fa-asterisk fa-fw"></i>&nbsp;<?php echo $category->name; ?> 
						(<span class="badge count_product_by_category_result_<?php echo $category->id; ?>"></span>)
					</a>
				</li>
			<?php endforeach ?>
			</ul>
		</div>
	</div>
	<hr>
	<div class="nav-side-menu">
		<div class="brand"><strong>Live Chat</strong></div>
		<a href="ymsgr:SendIM?jerome_107">
		<img border=0 src="http://opi.yahoo.com/online?u=jerome_107&m=g&t=13"></a>
	</div>
	<hr>

	<style type="text/css">
		.calendar {
			position: relative;
			background-color: #663300;
		}

		.clock {
			width: auto;
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

		.brand {
			background-color: #94C3EA;
			line-height: 40px;
			display: block;
			text-align: center;
			font-size: 23px;
		}
	</style>
	<div class="brand"><strong>Hari ini</strong></div>
	<div class="calendar">
		<div class="clock">
			<div id="Date"></div>
			<ul class="separator">
				<li class="inline-time" id="hours"></li>
				<li class="inline-time" id="point">:</li>
				<li class="inline-time" id="min"></li>
			</ul>
			<hr>
			<label>Your Ip: 127.0.0.1</label>
			<label>Your Browser: <?php echo $user_agent; ?></label>
			<label>Visitor: 40</label>
		</div>
	</div>
	<hr>

	<div class="brand"><strong>Kontak</strong></div>
	<div class="panel panel-warning">
		<div class="panel-body bg-warning">
			<p>Visit us in facebook</p>
			<a class="btn btn-xs btn-primary btn-block" href="https://www.facebook.com/meublerandujati">Facebook</a> <hr>
			<h3 class="label label-warning">Phone Number</h3>
			<p class="label label-danger">0815-4266-6676</p> <hr>
			<h3 class="">Alamat</h3>
			<p class="">Jalan Bhayangkara RT 02 RW 04 Desa Karangmangu Kroya</p>
		</div>
	</div>
</div>