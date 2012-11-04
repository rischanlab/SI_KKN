<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Download Data Peserta KKN per Periode</title>
<link href="<?php echo base_url(); ?>assets/mos-css/mos-style0.css"
	rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>public/css/angkatan.css" type="text/css" />
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
</head>
<body>
	<div>
	<h3 align="center">Control Panel Admin  <a href="<?php echo base_url(); ?>kkn/logout_admin"><font color="red">Logout</font></a></h3>
	
	
</div>
		<div class="shortcutHome">
		<a href="<?php echo base_url(); ?>index.php/manage/peserta_kkn_management" ><img src="<?php echo base_url(); ?>assets/mos-css/img/pesertaskrang.png"><br>Peserta Belum dpt Kelompok</a>
		</div>
		
	
		
		<div class="shortcutHome">
		<a href="<?php echo base_url(); ?>index.php/manage/peserta_kkn_management_all" ><img src="<?php echo base_url(); ?>assets/mos-css/img/allmember.png"><br>KKN Semua Angkatan</a>
		</div>
		<div class="shortcutHome">
		<a href="<?php echo base_url(); ?>index.php/manage/ta_management" ><img src="<?php echo base_url(); ?>assets/mos-css/img/ta.png"><br>Atur Tahun Akademik</a>
		</div>
		<div class="shortcutHome">
		<a href="<?php echo base_url(); ?>index.php/manage/periode_management" ><img src="<?php echo base_url(); ?>assets/mos-css/img/periode.png"><br>Atur Periode</a>
		</div>
		<div class="shortcutHome">
		<a href="<?php echo base_url(); ?>index.php/angkatan" ><img src="<?php echo base_url(); ?>assets/mos-css/img/angkatan.png"><br>Atur Angkatan</a>
		</div>
		
		<div class="shortcutHome">
		<a href="<?php echo base_url(); ?>index.php/manage/kelompok_management"><img src="<?php echo base_url(); ?>assets/mos-css/img/kelompok.png"><br>Atur Kelompok</a>
		</div>
		<div class="shortcutHome">
		<a href="<?php echo base_url(); ?>index.php/manage/detail_kelompok_management"><img src="<?php echo base_url(); ?>assets/mos-css/img/group.png"><br>Tambahkan Anggota ke Kelompok</a>
		</div>
		<div class="shortcutHome">
		<a href="<?php echo base_url(); ?>admin/export" target="_blank"><img src="<?php echo base_url(); ?>assets/mos-css/img/cetak.png"><br>Cetak Kartu KKN</a>
		</div>
			<div class="shortcutHome">
		<a href="<?php echo base_url(); ?>index.php/admin/perperiode" ><img src="<?php echo base_url(); ?>assets/mos-css/img/peserta.png"><br>Peserta KKN per Periode</a>
		</div>
		
		
		
		<div class="clear"></div>
		
	
	</div>
	<br/>


<?php
	
?>
<div id="container">
	<h1>Download Data Peserta KKN per Periode</h1>
   <center>
    <form method="post" action="<?php echo base_url(); ?>admin/pesertaperperiode">
	
      
      
      
	  
	
		<table border='0'>
                                <tr>
                                                <td>
												
												<span class="label">TA</span>
												<div id="ta">
												   <?php
													echo form_dropdown("id_ta",$option_ta,"","id='id_ta'");?>
													<?php echo form_error('id_ta'); ?>
											  </div>
      
												
												</td>
												
												
												
                                                <td>
												
													<span >Periode</span>
													<div id="periode">
														
															<?php
														echo form_dropdown("id_periode",array('Pilih Periode '=>'Pilih TA Dahulu'),'','disabled');
															?>
														<?php echo form_error('id_periode'); ?>
													</div>
																							
												</td>
												
												<td>
													<span >Angkatan: </span>
													<div id="angkatan">
														
															<?php
														echo form_dropdown("id_angkatan",array('Pilih Angkatan '=>'Pilih TA Dahulu'),'','disabled');
															?>
														<?php echo form_error('id_angkatan'); ?>
													</div>
												
												
												</td>
                                </tr>

         
                </table>
					<br/>
	
		
		 
		 
		
		
      
	  
	  
	  
	  
        <div id="field">
            <span class="label">&nbsp;</span>
            <?php echo form_submit(array('name'=>'submit','id'=>'submit','value'=>'Download Data Peserta KKN'));?>
		
            
        </div>
		<br/>
        <?php echo form_close(); ?>
			</center>
    </div>
   
<script type="text/javascript">
	  	$("#id_ta").change(function(){
	    		var selectValues = $("#id_ta").val();
	    		if (selectValues == 0){
	    			var msg = "<br><select name=\"id_periode\" disabled><option value=\"Pilih periode\">Pilih TA Dahulu</option></select>";
	    			$('#periode').html(msg);
	    		}else{
	    			var id_ta = {id_ta:$("#id_ta").val()};
	    			$('#id_periode').attr("disabled",true);
	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('csvpeserta/select_periode')?>",
							data: id_ta,
							success: function(msg){
								$('#periode').html(msg);
							}
				  	});
	    		}
	    });
	   </script>
	   
	   
<script type="text/javascript">
	  	$("#id_ta").change(function(){
	    		var selectValues = $("#id_ta").val();
	    		if (selectValues == 0){
	    			var msg = "<br><select name=\"id_angkatan\" disabled><option value=\"Pilih Angkatan\">Pilih TA Dahulu</option></select>";
	    			$('#angkatan').html(msg);
	    		}else{
	    			var id_ta = {id_ta:$("#id_ta").val()};
	    			$('#id_angkatan').attr("disabled",true);
	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('csvpeserta/select_angkatan')?>",
							data: id_ta,
							success: function(msg){
								$('#angkatan').html(msg);
							}
				  	});
	    		}
	    });
	   </script>
	 