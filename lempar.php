<?php
session_start();
session_cache_expire(1);
//$cek_status= $_SESSION['data']['status'];
if ($_SESSION['data']['status']=='1'){
	echo("<script language=javascript>window.location='http://localhost/LPM/form';</script>");
	} 
if($_SESSION['data']['status']=='2'){
	echo("<script language=javascript>window.location='http://localhost/LPM/dosen';</script>");
	}
	else{
?>
<script type="text/javascript">
			alert("Anda Harus Login Melalui SIA..!!!");	
			window.location = "http://sia.uin-suka.ac.id/"
			</script>

<?php
}	


?>