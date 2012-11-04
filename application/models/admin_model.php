<?php
class Admin_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
		 public function get_dropdown() {
		
		$query = $this->db->query("SELECT ID_KELOMPOK,NAMA_KELOMPOK FROM KKN_KELOMPOK");

			$dropdown = array('' => 'Pilih Nama Kelompok');
				foreach($query->result_array() as $r) {
				$dropdown[$r['ID_KELOMPOK']] = $r['NAMA_KELOMPOK'];
				}
			return $dropdown;
		}
		
		 public function get_angkatan() {
		
		$query = $this->db->query("SELECT ID_ANGKATAN,ANGKATAN FROM KKN_ANGKATAN");

			$dropdown = array('' => 'Pilih Angkatan');
				foreach($query->result_array() as $r) {
				$dropdown[$r['ID_ANGKATAN']] = $r['ANGKATAN'];
				}
			return $dropdown;
		}
		
		
		 public function get_periode() {
		
		$query = $this->db->query("SELECT ID_PERIODE,KD_PERIODE,PERIODE FROM KKN_PERIODE");

			$dropdown = array('' => 'Pilih Periode , Kode Periode');
				foreach($query->result_array() as $r) {
				$dropdown[$r['ID_PERIODE']] = $r['PERIODE']." , ".$r['KD_PERIODE'];
				}
			return $dropdown;
		}
		
		
		
		 public function get_ta() {
		
		$query = $this->db->query("SELECT ID_TA,TA FROM KKN_TA");

			$dropdown = array('' => 'Pilih TA');
				foreach($query->result_array() as $r) {
				$dropdown[$r['ID_TA']] = $r['TA'];
				}
			return $dropdown;
		}
		
		
		
		function get_anggotakelompok($id_kelompok){

			$query=$this->db->query("
			select A.NIM, A.NAMA, A.PATH_FOTO , B.FAK, C.RW ,C.DESA, D.NM_KEC, E.NM_KAB, F.NM_PROP, G.ANGKATAN,H.NM_DOSEN,I.TANGGAL_MULAI, I.TANGGAL_SELESAI, K.PERIODE, L.TA FROM D_MAHASISWA A,KKN_MHS B,KKN_KELOMPOK C,MD_KEC D,MD_KAB E,MD_PROP F,KKN_ANGKATAN G,D_DOSEN H,KKN_PERIODE I, KKN_DETAIL_KELOMPOK J, KKN_PERIODE K, KKN_TA L WHERE A.NIM=B.NIM AND C.KD_KEC=D.KD_KEC AND C.KD_KAB=E.KD_KAB AND C.KD_PROP=F.KD_PROP AND C.ID_ANGKATAN=G.ID_ANGKATAN AND G.KD_DOSEN=H.KD_DOSEN AND G.ID_PERIODE=I.ID_PERIODE AND J.ID_KELOMPOK=C.ID_KELOMPOK AND B.NO=J.NO AND G.ID_PERIODE=K.ID_PERIODE AND G.ID_TA=L.ID_TA AND j.ID_KELOMPOK=$id_kelompok");
			return $query;

		}

		function get_infokelompok($id_kelompok){
			$query=$this->db->query("select A.NAMA_KELOMPOK, A.RW, A.DESA, B.NM_KEC , C.NM_KAB , D.NM_PROP FROM KKN_KELOMPOK A, MD_KEC B, MD_KAB C, MD_PROP D WHERE A.KD_KEC=B.KD_KEC AND A.KD_KAB=C.KD_KAB AND A.KD_PROP=D.KD_PROP AND ID_KELOMPOK=$id_kelompok");
			return $query;

		}
		
		function to_csv($ta,$periode,$angkatan){

			$query=$this->db->query("select (C.NAMA_KELOMPOK) Nama_Kelompok_KKN, A.NIM, A.NAMA, A.HP_MHS, DECODE(A.J_KELAMIN,'L','Laki-Laki','P','Perempuan') Jenis_Kelamin ,A.GOL_DARAH, DECODE(A.STATUS_KAWIN,'B','Belum Kawin','K','Kawin') Status_Perkawinan,A.ALAMAT_MHS , (B.FAK) Fakultas, B.ALAMAT_JOGJA, B.RT_JOGJA, B.DESA_JOGJA , (C.RW) Lokasi_RW_KKN ,(C.DESA) Lokasi_Desa_KKN, (D.NM_KEC) Lokasi_Kec_KKN, (E.NM_KAB) Lokasi_Kab_KKN, (F.NM_PROP)Lokasi_prop_KKN, (G.ANGKATAN) Angkatan_KKN ,(H.NM_DOSEN) Nama_DPL,(I.TANGGAL_MULAI) Mulai_KKN, (I.TANGGAL_SELESAI) Selesai_KKN, (K.PERIODE) Periode_KKN, (L.TA) TA_KKN FROM D_MAHASISWA A,KKN_MHS B,KKN_KELOMPOK C,MD_KEC D,MD_KAB E,MD_PROP F,KKN_ANGKATAN G,D_DOSEN H,KKN_PERIODE I, KKN_DETAIL_KELOMPOK J, KKN_PERIODE K, KKN_TA L WHERE A.NIM=B.NIM AND C.KD_KEC=D.KD_KEC AND C.KD_KAB=E.KD_KAB AND C.KD_PROP=F.KD_PROP AND C.ID_ANGKATAN=G.ID_ANGKATAN AND C.KD_DOSEN=H.KD_DOSEN AND G.ID_PERIODE=I.ID_PERIODE AND J.ID_KELOMPOK=C.ID_KELOMPOK AND B.NO=J.NO AND G.ID_PERIODE=K.ID_PERIODE AND G.ID_TA=L.ID_TA AND L.ID_TA =$ta AND K.ID_PERIODE=$periode AND G.ID_ANGKATAN=$angkatan");
			return $query;

		}
		
	


}
