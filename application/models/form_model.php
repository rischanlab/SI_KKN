<?php
class Form_Model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function list_all(){
		return $this->db->get($D_MAHASISWA);
	}

	function count_all(){
		return $this->db->count_all($this->D_MAHASISWA);
	}

	function get_by_nim($nim){

		$query=$this->db->query("SELECT A.NIM, A.ANGKATAN, A.NAMA,A.TELP_MHS,A.GOL_DARAH, A.BERAT, A.TINGGI,A.PEKERJAAN, A.STATUS_KAWIN,G.PRESTASI, G.TRANSPORTASI, G.NO, G.ALAMAT_JOGJA,G.RT_JOGJA,G.DESA_JOGJA,G.NM_KEC_JOGJA, G.NM_KAB_JOGJA, G.PATH_SK_DOKTER,G.PATH_SK_GOLONGAN_DARAH,G.PATH_SK_CUTI,G.PATH_SK_TIDAK_HAMIL, A.ALAMAT_MHS ,A.RT,A.DESA, A.HP_MHS,B.NM_PRODI, C.NM_JURUSAN, D.NM_FAK, A.J_KELAMIN, E.NM_KAB,F.NM_PROP,DECODE(A.J_KELAMIN,'L','LAKI-LAKI','P','PEREMPUAN') NM_J_KELAMIN FROM D_MAHASISWA A, MASTER_PRODI B, MASTER_JURUSAN C, MASTER_FAK D, MD_KAB E, MD_PROP F, KKN_MHS G WHERE A.KD_KAB=E.KD_KAB AND A.KD_PRODI = B.KD_PRODI AND B.KD_JURUSAN = C.KD_JURUSAN AND C.KD_FAK = D.KD_FAK AND A.KD_PROP=F.KD_PROP AND A.NIM=G.NIM AND A.NIM='$nim'");
		return $query;
	}


	function Insert_NIM($datainput)
	{
		$this->db->insert('KKN_MHS',$datainput);
	}

	function lihat_NIM($nim){
		$query=$this->db->query("SELECT * FROM KKN_MHS WHERE NIM ='$nim'");
		return $query;
	}

	function cek_sudah($nim){
		$query=$this->db->query("SELECT * FROM KKN_MHS WHERE NIM ='$nim'");
		return $query;
	}


	function update_d_mahasiswa($nim, $mahasiswa){
			
		$this->db->where('NIM', $nim);
		$this->db->update('D_MAHASISWA', $mahasiswa);
	}

	function update_kkn_mhs($nim, $mhs){
			
		$this->db->where('NIM', $nim);
		$this->db->update('KKN_MHS', $mhs);


	}

	function ganti_sudah_jadi_1($nim){
		$query=$this->db->query("update KKN_MHS set SUDAH='1' where NIM='$nim'");
		return $query;

	}
	function ganti_sudah_jadi_2($nim){
		$query=$this->db->query("update KKN_MHS set SUDAH='2' where NIM='$nim'");
		return $query;

	}

	function insert_foto($nim,$foto){
		$query=$this->db->query("update D_MAHASISWA set PATH_FOTO='$foto' where NIM='$nim' ");

	}

	function insert_sk_sehat($nim,$sehat){
		$query=$this->db->query("update KKN_MHS set PATH_SK_DOKTER='$sehat' where NIM='$nim'");

	}

	function insert_sk_gol_darah($nim,$gol_darah){
		$query=$this->db->query("update KKN_MHS set PATH_SK_GOLONGAN_DARAH='$gol_darah'	where NIM='$nim' ");

	}
	function insert_sk_cuti_kerja($nim,$cuti){
		$query=$this->db->query("update KKN_MHS set PATH_SK_CUTI='$cuti' where NIM='$nim'");

	}
	function insert_sk_tidak_hamil($nim,$tidak_hamil){
		$query=$this->db->query("update KKN_MHS set PATH_SK_TIDAK_HAMIL='$tidak_hamil' where NIM='$nim'");

	}





}
?>
