<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation','session','image_lib','FPDF'));
		$this->load->helper(array('form','url', 'text_helper','date','file'));
		$this->load->database();
		session_start();
	}

	function index()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
				$this->load->view('admin/bg_head',$data);
				$this->load->view('admin/bg_menu');
				$this->load->view('admin/isi_index',$data);
				$this->load->view('admin/bg_bawah');
			}
			else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
		}
	}
	
	
	function export(){
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
		
				$this->load->model('Admin_model','',TRUE);
					
				//$category = $this->Dosen_model->get_dropdown();
					
			

				// load view
				$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
				$time = time();
					
					
				$category['category'] = $this->Admin_model->get_dropdown();
					
				$this->load->view('admin/bg_head',$data);
				//$this->load->view('admin/bg_menu');
				//echo form_dropdown('category', $category, array());
				$this->load->view('admin/export', $category);
				$this->load->view('admin/bg_bawah');
				}
					else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
			}
		}
		else{
			?>
<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
		}
	
	}
	
	function export_do(){
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
			
		
		$id_kelompok=$this->input->post('category');
		if ($id_kelompok===''){
		?>
		<script>alert("Anda Belum memilih Kelompok...!!!");</script>
		
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/export'>";
		}
			else {
			
				$this->load->model('Admin_model','',TRUE);
				$query=$this->Admin_model->get_anggotakelompok($id_kelompok);
					
				$data_isi = array('query' => $query);
					
				$info['kelompok'] = $this->Admin_model->get_infokelompok($id_kelompok);
				$q=$this->Admin_model->get_infokelompok($id_kelompok);
				$info= array('q' => $q);
				$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
				$time = time();
				

					
				//$this->load->view('admin/bg_head',$data);
				$this->load->view('admin/lihatanggota',$data_isi);
				//$this->load->view('admin/bg_bawah');
					
			}
		
		
		}
		}
	
	
	}
	
	
	
		function kartukkn(){
	
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
				$id_kelompok=$this->input->post('category');
		if ($id_kelompok===''){
		?>
		<script>alert("Anda Belum memilih Kelompok...!!!");</script>
		
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/export'>";
		}
			else {
				
				
				
				$this->load->model('Admin_model','',TRUE);
				$data['mahasiswa'] =$this->Admin_model->get_anggotakelompok($id_kelompok)->row();;
				
				$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
				$time = time();
				
				$this->load->view('admin/kartukkn',$data);
				
					
			}
		
				}
					else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
			}
		}
		else{
			?>
<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
		}
	
	}
	
	
	


}








?>
