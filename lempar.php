<?php
session_start();
session_cache_expire(1);
//$cek_status= $_SESSION['data']['status'];
if ($_SESSION['data']['status']=='1'){ //jika status =1 maka dilempar ke form/mahasiswa
	echo("<script language=javascript>window.location='http://localhost/SI_KKN/form';</script>");
	} 
if($_SESSION['data']['status']=='2'){ //jika status =2 maka dilempar ke dosen
	echo("<script language=javascript>window.location='http://localhost/SI_KKN/dosen';</script>");
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