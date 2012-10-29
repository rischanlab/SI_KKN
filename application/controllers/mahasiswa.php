<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {


	function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation','session','image_lib','FPDF'));
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->database();
		session_start();
	}

	function index()
	{

		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['data']['status']) ? $_SESSION['data']['status']:'';
		if($session!=""){

			$kd_kelas2=$_SESSION['data']['kd_kelas'];
			$nm_kelas2=$_SESSION['data']['nm_kelas'];
			$kd_ta2 =$_SESSION['data']['kd_ta'];
			$kd_smt2 =$_SESSION['data']['kd_smt'];
			$id_user2 =$_SESSION['data']['id_user'];
			$nm_user2 =$_SESSION['data']['nm_user'];
			$kd_kur2 =$_SESSION['data']['kd_kur'];
			$kd_prodi2 =$_SESSION['data']['kd_prodi'];
			$nm_prodi2 =$_SESSION['data']['nm_prodi'];
			$kd_mk2 =$_SESSION['data']['kd_mk'];
			$sks_mk2 =$_SESSION['data']['sks_mk'];
			$status2 =$_SESSION['data']['status'];


			$data["nim"]=$id_user2;
			$data["nama"]=$nm_user2;
			$data["status"]=$status2;
			

			if($status2=="1"){
				$data["tanggal"] = mdate($datestring, $time);
				$this->load->view('mahasiswa/bg_atas',$data);
				$this->load->view('mahasiswa/bg_menu');
				$this->load->view('mahasiswa/isi_index',$data);
				$this->load->view('mahasiswa/bg_bawah');
			}
			else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel mahasiswa...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
		else{
			?>
<script type="text/javascript">
			alert("Anda Harus Login Melalui SIA..!!!");	
			window.location = "http://sia.uin-suka.ac.id/"
			</script>
<?php

		}
	}


	function profile_mhs(){
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['data']['status']) ? $_SESSION['data']['status']:'';
		if($session!=""){

			$kd_kelas2=$_SESSION['data']['kd_kelas'];
			$nm_kelas2=$_SESSION['data']['nm_kelas'];
			$kd_ta2 =$_SESSION['data']['kd_ta'];
			$kd_smt2 =$_SESSION['data']['kd_smt'];
			$id_user2 =$_SESSION['data']['id_user'];
			$nm_user2 =$_SESSION['data']['nm_user'];
			$kd_kur2 =$_SESSION['data']['kd_kur'];
			$kd_prodi2 =$_SESSION['data']['kd_prodi'];
			$nm_prodi2 =$_SESSION['data']['nm_prodi'];
			$kd_mk2 =$_SESSION['data']['kd_mk'];
			$sks_mk2 =$_SESSION['data']['sks_mk'];
			$status2 =$_SESSION['data']['status'];


			$data["nim"]=$id_user2;
			$data["nama"]=$nm_user2;
			$data["status"]=$status2;
			

			if($status2=="1"){
		
				$nim =$_SESSION['data']['id_user'];
				$nm_user2 =$_SESSION['data']['nm_user'];
				$this->load->model('Mahasiswa_model','',TRUE);
				$data['mahasiswa'] = $this->Mahasiswa_model->get_by_nim($nim)->row();
				$data['title'] = 'Mahasiswa Detail';
				$data['link_back'] = anchor('mahasiswa/index/','Kembali Ke Beranda',array('class'=>'back'));

				// load view
				$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
				$time = time();
				$var = array();
				$var["nama"]=$nm_user2;
				
				$var["tanggal"] = mdate($datestring, $time);
				
				
				
				$this->load->view('mahasiswa/bg_atas',$var);
				$this->load->view('mahasiswa/bg_menu');
				$this->load->view('mahasiswa/profile_mhs', $data);
				$this->load->view('mahasiswa/bg_bawah');
					}
			else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel mahasiswa...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
		else{
			?>
<script type="text/javascript">
			alert("Anda Harus Login Melalui SIA..!!!");	
			window.location = "http://sia.uin-suka.ac.id/"
			</script>
<?php

		}


	}



	function pengambilanbuku(){
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['data']['status']) ? $_SESSION['data']['status']:'';
		if($session!=""){

			$kd_kelas2=$_SESSION['data']['kd_kelas'];
			$nm_kelas2=$_SESSION['data']['nm_kelas'];
			$kd_ta2 =$_SESSION['data']['kd_ta'];
			$kd_smt2 =$_SESSION['data']['kd_smt'];
			$id_user2 =$_SESSION['data']['id_user'];
			$nm_user2 =$_SESSION['data']['nm_user'];
			$kd_kur2 =$_SESSION['data']['kd_kur'];
			$kd_prodi2 =$_SESSION['data']['kd_prodi'];
			$nm_prodi2 =$_SESSION['data']['nm_prodi'];
			$kd_mk2 =$_SESSION['data']['kd_mk'];
			$sks_mk2 =$_SESSION['data']['sks_mk'];
			$status2 =$_SESSION['data']['status'];


			$data["nim"]=$id_user2;
			$data["nama"]=$nm_user2;
			$data["status"]=$status2;
			

			if($status2=="1"){
				$nim =$_SESSION['data']['id_user'];
				$nm_user2 =$_SESSION['data']['nm_user'];
				$this->load->model('Mahasiswa_model','',TRUE);
				$sudah=$this->Mahasiswa_model->get_sudah_kkn_mhs($nim);
				
				foreach($sudah->result() as $hasil)
				{ $status_sudah=$hasil->SUDAH;
				if ($status_sudah=="3") {
				
					$data['mahasiswa'] = $this->Mahasiswa_model->get_by_nim($nim)->row();
					$data['title'] = 'Mahasiswa Detail';
					$data['link_back'] = anchor('mahasiswa/index/','Kembali Ke Beranda',array('class'=>'back'));

					//$info['kelompok'] = $this->Mahasiswa_model->get_info_kelompok($nim);
					$q=$this->Mahasiswa_model->get_info_kelompok($nim);
					$info= array('q' => $q);

					// load view
					$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
					$time = time();
					$var = array();
					$var["nama"]=$nm_user2;
					
					$var["tanggal"] = mdate($datestring, $time);
						
						
					$this->load->view('mahasiswa/bg_atas',$var);
					$this->load->view('mahasiswa/bg_menu');
					$this->load->view('mahasiswa/pengambilanbuku',$data);
					$this->load->view('mahasiswa/infokelompok',$info);
					$this->load->view('mahasiswa/bg_bawah');
					}else {
					?>
					<script type="text/javascript">
						alert('LPM Belum melakukan Pembagian Kelompok KKN secara keseluruhan, silahkan tunggu beberapa hari lagi');
					</script>
					<?php
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."mahasiswa'>";
				
				
					}
				
				
				}
					}
			else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel mahasiswa...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
		else{
			?>
<script type="text/javascript">
			alert("Anda Harus Login Melalui SIA..!!!");	
			window.location = "http://sia.uin-suka.ac.id/"
			</script>
<?php

		}


	}

	function dok_kkn(){
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['data']['status']) ? $_SESSION['data']['status']:'';
		if($session!=""){

			$kd_kelas2=$_SESSION['data']['kd_kelas'];
			$nm_kelas2=$_SESSION['data']['nm_kelas'];
			$kd_ta2 =$_SESSION['data']['kd_ta'];
			$kd_smt2 =$_SESSION['data']['kd_smt'];
			$id_user2 =$_SESSION['data']['id_user'];
			$nm_user2 =$_SESSION['data']['nm_user'];
			$kd_kur2 =$_SESSION['data']['kd_kur'];
			$kd_prodi2 =$_SESSION['data']['kd_prodi'];
			$nm_prodi2 =$_SESSION['data']['nm_prodi'];
			$kd_mk2 =$_SESSION['data']['kd_mk'];
			$sks_mk2 =$_SESSION['data']['sks_mk'];
			$status2 =$_SESSION['data']['status'];


			$data["nim"]=$id_user2;
			$data["nama"]=$nm_user2;
			$data["status"]=$status2;
			

			if($status2=="1"){
			
				$nim =$_SESSION['data']['id_user'];
				$nm_user2 =$_SESSION['data']['nm_user'];
				$this->load->model('Mahasiswa_model','',TRUE);
				$data['mahasiswa'] = $this->Mahasiswa_model->get_by_nim($nim)->row();
				$data['title'] = 'Mahasiswa Detail';
				$data['link_back'] = anchor('mahasiswa/index/','Kembali Ke Beranda',array('class'=>'back'));

				// load view
				$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
				$time = time();
				$var = array();
				$var["nama"]=$nm_user2;
				
				$var["tanggal"] = mdate($datestring, $time);
					
					
				$this->load->view('mahasiswa/bg_atas',$var);
				$this->load->view('mahasiswa/bg_menu');
				$this->load->view('mahasiswa/dok_kkn', $data);
				$this->load->view('mahasiswa/bg_bawah');
				
					}
			else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel mahasiswa...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
		else{
			?>
<script type="text/javascript">
			alert("Anda Harus Login Melalui SIA..!!!");	
			window.location = "http://sia.uin-suka.ac.id/"
			</script>
<?php

		}



	}

	function lihatkelompok(){
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['data']['status']) ? $_SESSION['data']['status']:'';
		if($session!=""){

			$kd_kelas2=$_SESSION['data']['kd_kelas'];
			$nm_kelas2=$_SESSION['data']['nm_kelas'];
			$kd_ta2 =$_SESSION['data']['kd_ta'];
			$kd_smt2 =$_SESSION['data']['kd_smt'];
			$id_user2 =$_SESSION['data']['id_user'];
			$nm_user2 =$_SESSION['data']['nm_user'];
			$kd_kur2 =$_SESSION['data']['kd_kur'];
			$kd_prodi2 =$_SESSION['data']['kd_prodi'];
			$nm_prodi2 =$_SESSION['data']['nm_prodi'];
			$kd_mk2 =$_SESSION['data']['kd_mk'];
			$sks_mk2 =$_SESSION['data']['sks_mk'];
			$status2 =$_SESSION['data']['status'];


			$data["nim"]=$id_user2;
			$data["nama"]=$nm_user2;
			$data["status"]=$status2;
			

			if($status2=="1"){

				$nim =$_SESSION['data']['id_user'];
				$nm_user2 =$_SESSION['data']['nm_user'];
				$this->load->model('Mahasiswa_model','',TRUE);
				$sudah=$this->Mahasiswa_model->get_sudah_kkn_mhs($nim);
				foreach($sudah->result() as $hasil)
				{ $status_sudah=$hasil->SUDAH;
				if ($status_sudah=="3") {
				
				
				
					$query=$this->Mahasiswa_model->get_member_kelompok_by_nim($nim);
					$kknangkatan=$this->Mahasiswa_model->get_angkatan_kkn($nim);
						
					$data_isi = array('query' => $query);
					$datakkn = array('kknangkatan'=> $kknangkatan);
						
					//$info['kelompok'] = $this->Mahasiswa_model->get_info_kelompok($nim);
					$q=$this->Mahasiswa_model->get_info_kelompok($nim);
					$info= array('q' => $q);

					$data['title'] = 'Mahasiswa Detail';
					$data['link_back'] = anchor('mahasiswa/index/','Kembali Ke Beranda',array('class'=>'back'));

					// load view
					$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
					$time = time();
					$var = array();
					$var["nama"]=$nm_user2;
					
					$var["tanggal"] = mdate($datestring, $time);
						
						
					$this->load->view('mahasiswa/bg_atas',$var);
					$this->load->view('mahasiswa/bg_menu');
					$this->load->view('mahasiswa/datakkn',$datakkn);
					$this->load->view('mahasiswa/lihatkelompok',$data_isi);
					$this->load->view('mahasiswa/infokelompok',$info);
					$this->load->view('mahasiswa/bg_bawah');
					
				}else {
					?>
					<script type="text/javascript">
						alert('LPM Belum melakukan Pembagian Kelompok KKN secara keseluruhan, silahkan tunggu beberapa hari lagi');
					</script>
					<?php
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/mahasiswa/'>";
				
				
					}
				
				
				}
				}
			else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel mahasiswa...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
		else{
			?>
<script type="text/javascript">
			alert("Anda Harus Login Melalui SIA..!!!");	
			window.location = "http://sia.uin-suka.ac.id/"
			</script>
<?php

		}
					
		



	}




	function expbuktidaftar(){
	
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['data']['status']) ? $_SESSION['data']['status']:'';
		if($session!=""){

			$kd_kelas2=$_SESSION['data']['kd_kelas'];
			$nm_kelas2=$_SESSION['data']['nm_kelas'];
			$kd_ta2 =$_SESSION['data']['kd_ta'];
			$kd_smt2 =$_SESSION['data']['kd_smt'];
			$id_user2 =$_SESSION['data']['id_user'];
			$nm_user2 =$_SESSION['data']['nm_user'];
			$kd_kur2 =$_SESSION['data']['kd_kur'];
			$kd_prodi2 =$_SESSION['data']['kd_prodi'];
			$nm_prodi2 =$_SESSION['data']['nm_prodi'];
			$kd_mk2 =$_SESSION['data']['kd_mk'];
			$sks_mk2 =$_SESSION['data']['sks_mk'];
			$status2 =$_SESSION['data']['status'];


			$data["nim"]=$id_user2;
			$data["nama"]=$nm_user2;
			$data["status"]=$status2;
			

			if($status2=="1"){	
			
				$nim =$_SESSION['data']['id_user'];
				$nm_user2 =$_SESSION['data']['nm_user'];
				$this->load->model('Mahasiswa_model','',TRUE);
				$sudah=$this->Mahasiswa_model->get_sudah_kkn_mhs($nim);
				foreach($sudah->result() as $hasil)
				{ $status_sudah=$hasil->SUDAH;
				if ($status_sudah=="3") {
				
				
				
						$this->load->model('Mahasiswa_model','',TRUE);

						$data['mahasiswa'] = $this->Mahasiswa_model->get_buktidaftar($nim)->row();
							$data['title'] = 'Mahasiswa Detail';
							$data['link_back'] = anchor('mahasiswa/index/','Kembali Ke Beranda',array('class'=>'back'));
							// load view
							$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
							$time = time();
							$var = array();
							$var["nama"]=$nm_user2;
							
							$var["tanggal"] = mdate($datestring, $time);
						
						
						$this->load->view('mahasiswa/expbuktidaftar', $data);
						}
				
				
				else {
					?>
					<script type="text/javascript">
						alert('LPM Belum melakukan Pembagian Kelompok KKN secara keseluruhan, silahkan tunggu beberapa hari lagi');
					</script>
					<?php
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/mahasiswa/'>";
				
				
					}
				
				
				}
				}
			else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel mahasiswa...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
		else{
			?>
<script type="text/javascript">
			alert("Anda Harus Login Melalui SIA..!!!");	
			window.location = "http://sia.uin-suka.ac.id/"
			</script>
<?php

		}
	
	
	
	
	
	
	
	}
	
	function pasfoto(){
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['data']['status']) ? $_SESSION['data']['status']:'';
		if($session!=""){

			$kd_kelas2=$_SESSION['data']['kd_kelas'];
			$nm_kelas2=$_SESSION['data']['nm_kelas'];
			$kd_ta2 =$_SESSION['data']['kd_ta'];
			$kd_smt2 =$_SESSION['data']['kd_smt'];
			$id_user2 =$_SESSION['data']['id_user'];
			$nm_user2 =$_SESSION['data']['nm_user'];
			$kd_kur2 =$_SESSION['data']['kd_kur'];
			$kd_prodi2 =$_SESSION['data']['kd_prodi'];
			$nm_prodi2 =$_SESSION['data']['nm_prodi'];
			$kd_mk2 =$_SESSION['data']['kd_mk'];
			$sks_mk2 =$_SESSION['data']['sks_mk'];
			$status2 =$_SESSION['data']['status'];


			$data["nim"]=$id_user2;
			$data["nama"]=$nm_user2;
			$data["status"]=$status2;
			

			if($status2=="1"){
		
				$nim =$_SESSION['data']['id_user'];
				$nm_user2 =$_SESSION['data']['nm_user'];
				$this->load->model('Mahasiswa_model','',TRUE);
				$this->load->model('Mediatutorialprofile','',TRUE);
				$data['mahasiswa'] = $this->Mahasiswa_model->get_by_nim($nim)->row();
				$data['title'] = 'Mahasiswa Detail';
				$data['link_back'] = anchor('mahasiswa/index/','Kembali Ke Beranda',array('class'=>'back'));

				// load view
				$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
				$time = time();
				$var = array();
				$var["nama"]=$nm_user2;
				
				$var["tanggal"] = mdate($datestring, $time);
				
				$pp=$this->Mediatutorialprofile->getPath($nim);
				if (count($pp->result_array())>0){
				foreach($pp->result() as $hasil)
					{ $ppq=$hasil->PATH_FOTO;
					//harus ditambah kondisi jika foto kosong cah :-D
					
					}
				} else{
				$ppq='default.jpg';
				}
				
				
				$this->load->view('mahasiswa/bg_atas',$var);
				$this->load->view('mahasiswa/bg_menu');
			
				
				   $subdata = array(
					'cropping_div' => $this->load->view('_account_cropping', '', true),
					'user_thumb' => $this->Mediatutorialprofile->genProfileThumb($ppq)
				);
				$content = $this->load->view('_account_profilepic_and_status', $subdata, true);
				//
				$datapoto = array(
					'title' => 'Simple profile pic uploader',
					'body' => $content
				
				);
				$this->load->view('_output_html', $datapoto);
				$this->load->view('mahasiswa/bg_bawah');
					}
			else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel mahasiswa...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
		else{
			?>
<script type="text/javascript">
			alert("Anda Harus Login Melalui SIA..!!!");	
			window.location = "http://sia.uin-suka.ac.id/"
			</script>
<?php

		}


	}
















}








?>
