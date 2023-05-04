<html lang="es">

<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	<title><?php echo $title; ?></title>
	<?php
	/** -- Copy from here -- */
	if (!empty($meta))
		foreach ($meta as $name => $content) {
			echo "\n\t\t";
	?>
		<meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
																			}
																		echo "\n";

																		if (!empty($canonical)) {
																			echo "\n\t\t";
																				?>
		<link rel="canonical" href="<?php echo $canonical ?>" /><?php

																		}
																		echo "\n\t";

																		foreach ($css as $file) {
																			echo "\n\t\t";
																?>
		<link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
																			}
																			echo "\n\t";

																			foreach ($js as $file) {
																				echo "\n\t\t";
																				?><script src="<?php echo $file; ?>"></script><?php
																															}
																															echo "\n\t";

																															/** -- to here -- */
																																?>

	

	<!-- Le fav and touch icons -->
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>assets/icons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>assets/icons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/icons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/icons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>assets/icons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>assets/icons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>assets/icons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>assets/icons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/icons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url(); ?>assets/icons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>assets/icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/icons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo base_url(); ?>assets/icons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo base_url(); ?>assets/icons/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">


</head>

<body>
	<?php if ($this->load->get_section('menu') != '') { ?>
		<?php echo $this->load->get_section('menu'); ?>
		<br>
	<?php } ?>
	
	<div class="container">
		
<div class="row">
	<div class="col-md-1">
		<?php if($this->session->userdata("rol_id")!=ADMIN) { ?>
    <table class="table table-borderless">
        <tr><td><a title="Shopping cart" href="<?php echo site_url("catalogo/view_cart"); ?>"><i class="bi bi-cart"></i></a></td></tr>
        <tr><td><a title="Shopping" href="<?php echo site_url("catalogo/view_shopping"); ?>"><i class="bi bi-bag"></i></a></td></tr>
        <tr><td><a title="Sales" href="<?php echo site_url("catalogo/view_sales"); ?>"><i class="bi bi-bag-plus"></i></a></td></tr>
		<tr><td><a title="Sales history" href="<?php echo site_url("articulos/view_sales_history"); ?>"><i class="bi bi-book"></i></a></td></tr>
        <tr><td><a title="Bookstore" href="<?php echo site_url("catalogo/view_bookstore"); ?>"><i class="bi bi-heart"></i></a></td></tr>
	</table>
			<?php } ?>
    </div>
		<?php echo $output; ?>
	</div>
	</div>
	
</body>

</html>