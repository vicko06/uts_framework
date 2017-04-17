<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemain extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Club_Model');
		$this->load->model('Pemain_Model');
	}
	public function index($id)
	{
		$data['data_pegawai']=$this->Club_Model->getPemainById($id);
		$this->load->view('pemain',$data);	
	}
	public function all()
	{
		$data['data_pegawai']=$this->Club_Model->getPemainAll();
		$this->load->view('pemain',$data);	
	}
	public function addData($id) 
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		if($this->form_validation->run()==FALSE){
			$data['data_pegawai']=$this->Club_Model->getDataClub();
			$this->load->view('addPemain',$data);
		}
		else
		{
			$this->Pemain_Model->addData();
			header("location:".site_url("Pemain/index/$id"));
		}
	}
	public function edit($id) 
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		if($this->form_validation->run()==FALSE){

			$data['data_pegawai']=$this->Club_Model->getPemain($id);
			$data['data']=$this->Club_Model->getDataClub();
			$this->load->view('EditPemain',$data);

		}
		else
		{			
			$this->Pemain_Model->editData($id);
			header("location:".site_url());
		}
	}
	public function deleteValidation($id)
	{
		$data['data_pegawai']=$this->Club_Model->getPemain($id);
		$this->load->view('deletePemain',$data);
	}
	public function delete($id,$val)
	{
		if ($val==0)
		{
			header("location:".site_url());
		}
		else {
		$this->Pemain_Model->deleteData($id);
		header("location:".site_url());
	}
	}	

}

/* End of file Pemain.php */
/* Location: ./application/controllers/Pemain.php */
?>