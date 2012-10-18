<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta charset="utf-8" />
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>


	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Free CSS template by ChocoTemplates.com</title>
	<link rel="stylesheet" href="<?= base_url() ?>/assets/outliers/css/style.css" type="text/css" media="all" />
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
	<!--[if IE]><style type="text/css" media="screen"> #navigation ul li a em { top:32px; } </style><![endif]-->
	
	<script src="<?= base_url() ?>/assets/outliers/js/jquery-1.4.1.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>/assets/outliers/js/jquery.jcarousel.pack.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>/assets/outliers/js/jquery-func.js" type="text/javascript"></script>
</head>
<body>

<!-- Header -->
<div id="header">
	<div class="shell">
		
		<!-- Logo -->
		<h1 id="logo"><a href="#">Company Name</a></h1>
		<!-- End Logo -->
		
		<!-- Navigation -->
		<div id="navigation">
			<ul>
			    <li><a href='<?php echo site_url('examples/customers_management')?>'>Customers</a></li>
			    <li><a href='<?php echo site_url('examples/orders_management')?>'>Orders</a> </li>
			    <li><a href='<?php echo site_url('examples/products_management')?>'>Products</a></li>
			    <li><a href='<?php echo site_url('examples/offices_management')?>'>Offices</a></li>
			    <li class="last"><a href='<?php echo site_url('examples/employees_management')?>'>Employees</a></li>
			</ul>
		</div>
		<!-- End Navigation -->
		
	</div>
</div>
<!-- End Header -->

<!-- Slider -->
<div id="slider">
	<div class="shell">
		
		<!-- Slides -->
		<div class="slides">
		<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
	<div style='height:20px;'></div>  
	
	<ul>
				<!-- Slide -->
			    <li>
			    	<div class="slide-info">
				    	<h2><span>ENTERPRISE</span> SOLUTIONS</h2>
				    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam arcu ligula, faucibus eu imperdiet eu, bibendum sit amet augue. Sed turpis sem, interdum sit amet egestas a, mattis non libero. Suspendisse tristique nisi sed justo accumsan vel mattis nulla fermentum. Etiam varius est id mi fermentum aliquam.</p>
				    	<p>Quisque quis vestibulum turpis. Sed venenatis ipsum laoreet elit pulvinar vitae pharetra massa dignissim. Curabitur ligula sapien, auctor ut porttitor a, ultricies lobortis dui. Suspendisse lacinia tellus a diam rutrum rhoncus. </p>
			    	</div>
			    	<span class="slide-image image1"></span>
			    </li>
			    <!-- End Slide -->
			    
			    <!-- Slide -->
			    <li>
			    	<div class="slide-info">
				    	<h2><span>ENTERPRISE</span> SOLUTIONS</h2>
				    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam arcu ligula, faucibus eu imperdiet eu, bibendum sit amet augue. Sed turpis sem, interdum sit amet egestas a, mattis non libero. Suspendisse tristique nisi sed justo accumsan vel mattis nulla fermentum. Etiam varius est id mi fermentum aliquam.</p>
				    	<p>Quisque quis vestibulum turpis. Sed venenatis ipsum laoreet elit pulvinar vitae pharetra massa dignissim. Curabitur ligula sapien, auctor ut porttitor a, ultricies lobortis dui. Suspendisse lacinia tellus a diam rutrum rhoncus. </p>
			    	</div>
			    	<span class="slide-image image1"></span>
			    </li>
			    <!-- End Slide -->
			    
			    <!-- Slide -->
			    <li>
			    	<div class="slide-info">
				    	<h2><span>ENTERPRISE</span> SOLUTIONS</h2>
				    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam arcu ligula, faucibus eu imperdiet eu, bibendum sit amet augue. Sed turpis sem, interdum sit amet egestas a, mattis non libero. Suspendisse tristique nisi sed justo accumsan vel mattis nulla fermentum. Etiam varius est id mi fermentum aliquam.</p>
				    	<p>Quisque quis vestibulum turpis. Sed venenatis ipsum laoreet elit pulvinar vitae pharetra massa dignissim. Curabitur ligula sapien, auctor ut porttitor a, ultricies lobortis dui. Suspendisse lacinia tellus a diam rutrum rhoncus. </p>
			    	</div>
			    	<span class="slide-image image1"></span>
			    </li>
				<!-- End Slide -->
			    
		    </ul>
		</div>
		<!-- End Slides -->
		
	</div>
</div>
<!-- End Slider -->

<!-- Slider Nav -->
<div id="slider-navigation">
	<div class="shell">
		<ul>
		    <li><a href="#" class="active">STEP 1<strong>ENTERPRISE</strong><em class="ico1"></em></a></li>
		    <li><a href="#">STEP 2<strong>INNOVATION</strong><em class="ico2"></em></a></li>
		    <li class="last"><a href="#">STEP 3<strong>VISION</strong><em class="ico3"></em></a></li>
		</ul>
	</div>
</div>
<!-- End Slider Nav -->

<!-- Main -->
<div id="main">
	<div class="shell">
		
		<!-- Cols -->
		<div class="cols">
			<div class="cl">&nbsp;</div>
			
			<!-- Col -->
			<div class="col">
				<h3>Sed Turpis sem</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam arcu ligula, faucibus eu imperdiet eu, bibendum sit amet augue. Sed turpis sem, interdum sit amet egestas a, mattis non libero.<br /><a href="#" class="more">read more</a></p>
				<p>Suspendisse tristique nisi sed justo accumsan vel mattis nulla fermentum. Etiam varius est id mi fermentum aliquam. <br /><a href="#" class="more">read more</a></p>
			</div>
			<!-- End Col -->
			
			<!-- Col -->
			<div class="col">
				<h3>Ligula amet augue</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam arcu ligula, faucibus eu imperdiet eu, bibendum sit amet augue. <br /><a href="#" class="more">read more</a></p>
				<p>Sed turpis sem, interdum sit amet egestas a, mattis non libero. Suspendisse tristique nisi sed justo accumsan vel mattis nulla fermentum. Etiam varius est id mi fermentum aliquam. <br /><a href="#" class="more">read more</a></p>
			</div>
			<!-- End Col -->
			
			<!-- Col -->
			<div class="col col-last">
				<h3>Ligula amet augue</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam arcu ligula, faucibus eu imperdiet eu, bibendum sit amet augue. <br /><a href="#" class="more">read more</a></p>
				<p>Sed turpis sem, interdum sit amet egestas a, mattis non libero. Suspendisse tristique nisi sed justo accumsan vel mattis nulla fermentum. Etiam varius est id mi fermentum aliquam. <br /><a href="#" class="more">read more</a></p>
			</div>
			<!-- End Col -->
			
			<div class="cl">&nbsp;</div>
		</div>
		<!-- End Cols -->
		
	</div>
</div>
<!-- End Main -->

<!-- Footer -->
<div id="footer">
	<div class="shell">
		
		<!-- Footer Logo -->
		<a href="#" class="notext footer-logo">Company Name</a>
		<!-- End Footer -->
		
		<!-- Footer Nav -->
		<div class="right">
			<p>
				<a href="#">Home</a>
				<span>|</span>
				<a href="#">About</a>
				<span>|</span>
				<a href="#">Services</a>
				<span>|</span>
				<a href="#">Clients</a>
				<span>|</span>
				<a href="#">Contact</a>
			</p>
			<p>&copy; Sitename.com. 
				Design by <a href="http://chocotemplates.com" target="_blank" title="The Sweetest CSS Templates WorldWide">Chocotemplates.com</a></p>
		</div>
		<!-- End Footer Nav -->
		
	</div>
</div>
<!-- End Footer -->
	
</body>
</html>