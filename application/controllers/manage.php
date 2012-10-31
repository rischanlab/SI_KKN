<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation','grocery_CRUD'));
		session_start();
		
	}

	function _manage_output($output = null)
	{
		$this->load->view('manage.php',$output);
	}



	function index()

	{

		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];
			$data['scriptmce'] = $this->scripttiny_mce();
			if($data["STATUS"]=="Admin"){
				$this->load->view('admin/bg_head',$data);
				$this->load->view('admin/isi_index',$data);
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
	
	
	
	

	function peserta_kkn_management()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
				try{
					/* This is only for the autocompletion */
					$crud = new grocery_CRUD();

					$crud->set_theme('datatables');
					$crud->where('SUDAH','2');
					$crud->set_table('KKN_MHS');
					$crud->set_language("indonesian");
						
					$crud->display_as('NIM','Data Pribadi');
					$crud->set_relation('NIM','D_MAHASISWA','Nim :{NIM}, Angkatan :{ANGKATAN},Nama :{NAMA},Jk: {J_KELAMIN},Asal: {ALAMAT_MHS}, Golongan Darah: {GOL_DARAH},HP Mhs: {HP_MHS},Telp Keluarga: {TELP_MHS}');
					$crud->display_as('FAK','Fakultas')
					->display_as('NO','No Pendaftaran')
					->display_as('ALAMAT_JOGJA','Alamat di Jogja')
					->display_as('NM_KEC_JOGJA','Kec di Jogja')
					->display_as('NM_KAB_JOGJA','Kab di Jogja')
					->display_as('PRESTASI','Keahlian')
					->display_as('RT_JOGJA','RT di Jogja')
					->display_as('DESA_JOGJA','Desa di Jogja')
					->display_as('KODE_POS_JOGJA','Kod Pos di Jogja')
					->display_as('TRANSPORTASI','Transportasi')
					->display_as('PATH_SK_DOKTER','Upload SK Dokter')
					->display_as('PATH_SK_GOLONGAN_DARAH','Upload SK Gol Darah')
					->display_as('PATH_SK_CUTI','Upload SK Cuti Kerja')
					->display_as('PATH_SK_TIDAK_HAMIL','Upload SK Tidak Hamil');
						


					$crud->unset_edit_fields('SUDAH');
					$crud->unset_add();
					$crud->unset_edit();
					$crud->unset_delete();
					$crud->unset_add_fields('NO','SUDAH');
					$crud->set_subject('Peserta KKN');
					$crud->required_fields('ALAMAT_JOGJA');

					$crud->columns('NIM','FAK','ALAMAT_JOGJA','PRESTASI','NM_KEC_JOGJA','NM_KAB_JOGJA');
					$crud->set_field_upload('PATH_SK_DOKTER','assets/kesehatan');
					$crud->set_field_upload('PATH_SK_GOLONGAN_DARAH','assets/goldarah');
					$crud->set_field_upload('PATH_SK_CUTI','assets/cutikerja');
					$crud->set_field_upload('PATH_SK_TIDAK_HAMIL','assets/tidakhamil');
					//$crud->edit_fields('NIM','KD_FAK','ALAMAT_JOGJA','PRESTASI','KD_KEC','KD_KAB');
						
					$crud->callback_edit_field('NIM',array($this,'edit_field_callback_nim'));
					$crud->callback_edit_field('NO',array($this,'edit_field_callback_no'));
					$output = $crud->render();
						
					$this->_manage_output($output);
						
				}catch(Exception $e){
					show_error($e->getMessage().' --- '.$e->getTraceAsString());
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
	
	
	function peserta_kkn_management_all()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
				try{
					/* This is only for the autocompletion */
					$crud = new grocery_CRUD();

					$crud->set_theme('datatables');
					//$crud->where('SUDAH','2');
					$crud->set_table('KKN_MHS');
					$crud->set_language("indonesian");
						
					$crud->display_as('NIM','Data Pribadi');
					$crud->set_relation('NIM','D_MAHASISWA','Nim :{NIM}, Angkatan :{ANGKATAN},Nama :{NAMA},Jk: {J_KELAMIN},Asal: {ALAMAT_MHS}, Golongan Darah: {GOL_DARAH},HP Mhs: {HP_MHS},Telp Keluarga: {TELP_MHS}');
					$crud->display_as('FAK','Fakultas')
					->display_as('NO','No Pendaftaran')
					->display_as('ALAMAT_JOGJA','Alamat di Jogja')
					->display_as('NM_KEC_JOGJA','Kec di Jogja')
					->display_as('NM_KAB_JOGJA','Kab di Jogja')
					->display_as('PRESTASI','Keahlian')
					->display_as('RT_JOGJA','RT di Jogja')
					->display_as('DESA_JOGJA','Desa di Jogja')
					->display_as('KODE_POS_JOGJA','Kod Pos di Jogja')
					->display_as('TRANSPORTASI','Transportasi')
					->display_as('PATH_SK_DOKTER','Upload SK Dokter')
					->display_as('PATH_SK_GOLONGAN_DARAH','Upload SK Gol Darah')
					->display_as('PATH_SK_CUTI','Upload SK Cuti Kerja')
					->display_as('PATH_SK_TIDAK_HAMIL','Upload SK Tidak Hamil');
						

					$crud->unset_edit();
					$crud->unset_delete();
					$crud->unset_edit_fields('SUDAH');
					$crud->unset_add();
					$crud->unset_add_fields('NO','SUDAH');
					$crud->set_subject('Peserta KKN');
					$crud->required_fields('ALAMAT_JOGJA');

					$crud->columns('NIM','FAK','ALAMAT_JOGJA','PRESTASI','NM_KEC_JOGJA','NM_KAB_JOGJA');
					$crud->set_field_upload('PATH_SK_DOKTER','assets/kesehatan');
					$crud->set_field_upload('PATH_SK_GOLONGAN_DARAH','assets/goldarah');
					$crud->set_field_upload('PATH_SK_CUTI','assets/cutikerja');
					$crud->set_field_upload('PATH_SK_TIDAK_HAMIL','assets/tidakhamil');
					//$crud->edit_fields('NIM','KD_FAK','ALAMAT_JOGJA','PRESTASI','KD_KEC','KD_KAB');
						
					$crud->callback_edit_field('NIM',array($this,'edit_field_callback_nim'));
					$crud->callback_edit_field('NO',array($this,'edit_field_callback_no'));
					$output = $crud->render();
						
					$this->_manage_output($output);
						
				}catch(Exception $e){
					show_error($e->getMessage().' --- '.$e->getTraceAsString());
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


	function kelompok_management()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
	
				$crud = new grocery_CRUD();
				$crud->set_language("indonesian");
				$crud->set_theme('datatables');
					
				$crud->set_table('KKN_KELOMPOK');
				$crud->set_relation('KD_DOSEN','D_DOSEN','{NM_DOSEN} | {ALMT_RUMAH}');
				$crud->display_as('KD_DOSEN','Nama DPL | Alamat Rumah');
					
				$crud->set_relation('ID_ANGKATAN','KKN_ANGKATAN','ANGKATAN');
				$crud->display_as('ID_ANGKATAN','Angkatan KKN');
					
				$crud->set_relation('KD_KEC','MD_KEC','NM_KEC');
				$crud->display_as('KD_KEC','Kec');
					
				$crud->set_relation('KD_KAB','MD_KAB','NM_KAB');
				$crud->display_as('KD_KAB','Kab');
					
				$crud->set_relation('KD_PROP','MD_PROP','NM_PROP');
				$crud->display_as('KD_PROP','Prop');
				$crud->display_as('NAMA_KELOMPOK','Nama Kelompok')
				->display_as('RW','Lokasi.RW')
				->display_as('DESA','Lokasi.Desa');
					
				$crud->columns('NAMA_KELOMPOK','ID_ANGKATAN','KD_DOSEN','RW','DESA','KD_KEC','KD_KAB','KD_PROP');
				$crud->add_fields('NAMA_KELOMPOK','ID_ANGKATAN','KD_DOSEN','RW','DESA','KD_KEC','KD_KAB','KD_PROP');
				$crud->edit_fields('NAMA_KELOMPOK','ID_ANGKATAN','KD_DOSEN','RW','DESA','KD_KEC','KD_KAB','KD_PROP');
				$crud->callback_column('NIM',array($this,'_callback_webpage_url'));
				$crud->required_fields('NAMA_KELOMPOK','ID_ANGKATAN','KD_DOSEN','RW','DESA','KD_KEC','KD_KAB','KD_PROP');
				$crud->set_subject('Kelompok KKN');
					
				$output = $crud->render();

				$this->_manage_output($output);
				
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

	
	function detail_kelompok_management()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
				
				$crud = new grocery_CRUD();
				$crud->set_language("indonesian");
				$crud->set_theme('datatables');
				$crud->set_table('KKN_DETAIL_KELOMPOK');
				$crud->set_relation('ID_KELOMPOK','KKN_KELOMPOK','NAMA_KELOMPOK');
				$crud->display_as('ID_KELOMPOK','Nama Kelompok');
					
					
				$crud->add_fields('ID_KELOMPOK','NO');
				$crud->edit_fields('ID_KELOMPOK','NO');
				$crud->set_relation('NO','KKN_MHS','{NIM} , {JK}, {FAK}',array('SUDAH' => '2'));
				// $crud->set_relation('user_id','users','username',array('status' => 'active'));
				$crud->display_as('NO','Mahasiswa | Jenis Kelamin | Fakultas');
				$crud->columns('ID_KELOMPOK','NO');
				$crud->required_fields('ID_KELOMPOK','NO');
				//$crud->fields('ID_KELOMPOK', 'FAKULTAS');
					
				$crud->callback_after_insert(array($this, 'set_sudah_jadi_tiga'));
					
				$output = $crud->render();

				$this->_manage_output($output);
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

	
	
	
	function set_sudah_jadi_tiga($post_array){
		$nim=$post_array['NO'];
		$query = $this->db->query("UPDATE KKN_MHS SET SUDAH='3' WHERE NO='$nim'");
		return $query;
	}

	function ta_management()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
		
				$crud = new grocery_CRUD();
				$crud->set_language("indonesian");
				$crud->set_theme('datatables');
				$crud->set_table('KKN_TA');
				$crud->add_fields('TA');
				$crud->edit_fields('TA');
				$crud->columns('TA');
				$crud->required_fields('TA');
				$output = $crud->render();

				$this->_manage_output($output);
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
	
 
	
	function periode_management()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
	
				$crud = new grocery_CRUD();
				$crud->set_language("indonesian");
				$crud->set_theme('datatables');
				$crud->set_table('KKN_PERIODE');
				$crud->set_relation('ID_TA','KKN_TA','TA');
				$crud->display_as('ID_TA','Pilih Tahun Akademik');
				$crud->required_fields('KD_PERIODE','PERIODE','TANGGAL_MULAI','TANGGAL_SELESAI','ID_TA');
				//$crud->field_type('PERIODE','dropdown',array('1' => 'I', '2' => 'II','3' => 'III' , '4' => 'IV', '5' => 'V', '6' => 'VI'));
				$crud->field_type('PERIODE','set',array('I','II','III','IV','V','VI'));
				
				$crud->display_as('KD_PERIODE','Kode Periode (ex : P3TA12)')
				->display_as('PERIODE','Nama Periode')
				->display_as('TANGGAL_MULAI','Tanggal Mulai KKN')
				->display_as('TANGGAL_SELESAI','Tanggal Selesai KKN');
				
					
				$crud->add_fields('KD_PERIODE','PERIODE','TANGGAL_MULAI','TANGGAL_SELESAI','ID_TA');
				$crud->edit_fields('KD_PERIODE','PERIODE','TANGGAL_MULAI','TANGGAL_SELESAI','ID_TA');
				$crud->columns('KD_PERIODE','PERIODE','TANGGAL_MULAI','TANGGAL_SELESAI','ID_TA');
				$output = $crud->render();
					

				$this->_manage_output($output);
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

	function angkatan_management()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
				
				$crud = new grocery_CRUD();
				$crud->set_language("indonesian");
				$crud->set_theme('datatables');
				$crud->set_table('KKN_ANGKATAN');
				$crud->set_relation('ID_TA','KKN_TA','TA');
				$crud->display_as('ID_TA','Tahun Akademik');
				$crud->set_relation('ID_PERIODE','KKN_PERIODE','{PERIODE} , {KD_PERIODE}');
				$crud->display_as('ID_PERIODE','Periode');
				$crud->set_relation('KD_DOSEN','D_DOSEN','{NM_DOSEN}');
				$crud->display_as('KD_DOSEN','Ketua Panitia');
					
					
				$crud->add_fields('ANGKATAN','ID_TA','ID_PERIODE','KD_DOSEN');
				$crud->edit_fields('ANGKATAN','ID_TA','ID_PERIODE','KD_DOSEN');
					
				$crud->columns('ANGKATAN','ID_TA','ID_PERIODE','KD_DOSEN');
				$crud->required_fields('ANGKATAN','ID_TA','ID_PERIODE','KD_DOSEN');
					
				$output = $crud->render();

				$this->_manage_output($output);
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

	
	
	 
	

	function edit_field_callback_nim($value, $primary_key)
	{
		return '<input type="text" maxlength="50" readonly="true" value="'.$value.'" name="NIM" style="width:462px">';
	}
	function edit_field_callback_no($value, $primary_key)
	{
		return '<input type="text" maxlength="50" readonly="true" value="'.$value.'" name="NO" style="width:462px">';
	}

	function _callback_kd_fak($value, $primary_key)
	{
			
		return $value='342423432432';
	}

	public function _callback_webpage_url($value, $row)
	{
		return $value='jajal';
	}








}