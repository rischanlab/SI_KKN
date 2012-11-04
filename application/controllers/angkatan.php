<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Angkatan extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
		$this->load->model('angkatan_model');
		$this->load->library('form_validation');
    }

	function index() //untuk menampilkan form awal yaitu form tambah data cd 
	{
		$data['cd'] = '';
		$data['cd_row'] = $this->angkatan_model->read_data();
		$data['option_ta'] = $this->angkatan_model->getTaList();
		$data['ketupat'] = $this->angkatan_model->get_dropdown_dosen();
		$this->load->view('admin/angkatan_v', $data);
		$datajoin['cd_row'] = $this->angkatan_model->get_join_data();
		$this->load->view('admin/show_angkatan_v', $datajoin);
		
	}
	
	function select_periode(){
            if('IS_AJAX') {
        	$data['option_periode'] = $this->angkatan_model->getPeriodeList();		
			$this->load->view('admin/periode_v',$data);
            }
		
	}
     
	
	
	function edit() //untuk menampilkan form edit data cd
	{
		$id_angkatan = $this->input->post('id_angkatan');
		if (!empty($id_angkatan)) $kode = $id_angkatan;
		else $kode = $this->security->xss_clean($this->uri->segment(3));
		$result = $this->angkatan_model->get_data($kode);
		if ($result == null) redirect('angkatan');
		else $data['cd'] = $result;
		$data['cd_row'] = $this->angkatan_model->read_data();
		$data['option_ta'] = $this->angkatan_model->getTaList();
		$data['ketupat'] = $this->angkatan_model->get_dropdown_dosen();
		$this->load->view('admin/angkatan_v', $data);
		$datajoin['cd_row'] = $this->angkatan_model->get_join_data();
		$this->load->view('admin/show_angkatan_v', $datajoin);
	}
	
	function delete() //untuk menghapus data cd
	{   
		$kode = $this->security->xss_clean($this->uri->segment(3));
		$result = $this->angkatan_model->get_data($kode);
		if ($result == null) {
			redirect('angkatan');
		} else { 
			$delete = $this->angkatan_model->delete_data($kode);
	
			redirect('angkatan');
		}
	}
	
	function inputangkatan() //untuk menambah data cd
	{
		
		$this->form_validation->set_rules('id_angkatan', 'Identifier', 'trim|is_natural_no_zero|xss_clean');
		$this->form_validation->set_rules('angkatan', 'Angkatan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('id_ta', 'Tahun Akademik', 'trim|required|xss_clean');
		$this->form_validation->set_rules('id_periode', 'Periode KKN', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kd_dosen', 'Ketua Panitia', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE){
			$this->index();
		} else {
		
	
			$data = array(
				'ANGKATAN' => $this->input->post('angkatan'),
				'ID_TA' => $this->input->post('id_ta'),
				'ID_PERIODE' => $this->input->post('id_periode'),
				'KD_DOSEN' => $this->input->post('kd_dosen')			
			);
			$create = $this->angkatan_model->create_data($data);
			//if ($create) $this->session->set_flashdata('message', 'Data created!');
			//else $this->session->set_flashdata('message', 'Failed to create data!');
			redirect('angkatan');
		}
	
	
	}
	
	function update() //untuk meng-update data cd
	{
		
		$this->form_validation->set_rules('id_angkatan', 'Identifier', 'trim|is_natural_no_zero|xss_clean');
		$this->form_validation->set_rules('angkatan', 'Angkatan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('id_ta', 'Tahun Akademik', 'trim|required|xss_clean');
		$this->form_validation->set_rules('id_periode', 'Periode KKN', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kd_dosen', 'Ketua Panitia', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE){
			$this->edit();
		} else {
			$id_angkatan = $this->input->post('id_angkatan');
			$data = array(
				'ANGKATAN' => $this->input->post('angkatan'),
				'ID_TA' => $this->input->post('id_ta'),
				'ID_PERIODE' => $this->input->post('id_periode'),
				'KD_DOSEN' => $this->input->post('kd_dosen')	
			);
			$update = $this->angkatan_model->update_data($id_angkatan,$data);
			redirect('angkatan');
		}
	}
	
}