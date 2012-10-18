<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Detail Peserta KKN | LPM UIN Sunan Kalijaga Yogyakarta</title>

<link href="<?php echo base_url(); ?>res/css/dosen-style.css" rel="stylesheet"
	type="text/css" />

</head>
<div id="rightContent">
		<h3>Silahkan Pilih Nama Kelompok kemudian Tekan Tombol Lihat Anggota Kelompok</h3>
				<br/>
							<table class='data'>
								<form method="post"
									action="<?php echo base_url(); ?>dosen/lihatanggota">
									<?php echo form_dropdown('category', $category, array()); ?>
									<input type="submit" value="Lihat Anggota Kelompok"
										class="tombol" />

								</form>

							</table>
	
	</div>

