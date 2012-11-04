<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csvpeserta extends CI_Controller 
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
		$data['option_ta'] = $this->angkatan_model->getTaList();
		$this->load->view('admin/csv_v', $data);
		
	}
	
	function select_periode(){
            if('IS_AJAX') {
        	$data['option_periode'] = $this->angkatan_model->getPeriodeList();		
			$this->load->view('admin/periode_v',$data);
            }
		
	}
	
	function select_angkatan(){
            if('IS_AJAX') {
        	$data['option_angkatan'] = $this->angkatan_model->getAngkatanList();		
			$this->load->view('admin/angkatanoption_v',$data);
            }
		
	}
		
        
     
	
}