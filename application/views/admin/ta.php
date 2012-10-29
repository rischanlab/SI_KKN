<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Detail Peserta KKN | LPM UIN Sunan Kalijaga Yogyakarta</title>

<link href="<?php echo base_url(); ?>res/css/style.css" rel="stylesheet"
	type="text/css" />

</head>
<body>

	<div id="bg-isi">
		
		<h1>Lihat Peserta per TA/Periode/Angkatan</h1>
		<div id="isi">
			<br> <br> <br>

						<div id="isi">
							<table width="775" bgcolor="#D6F3FF" cellpadding="2"
								cellspacing="1" class="widget-small">
								<form method="post"
									action="<?php echo base_url(); ?>admin/pesertaperperiode">
									<?php echo form_dropdown('ta', $ta, array()); ?>
									
