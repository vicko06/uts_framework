<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Club extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Club_Model');
	}
	public function index()
	{
		$data['data_pegawai']=$this->Club_Model->getDataClub();
		$this->load->view('Club',$data);	
	}
	public function dataTable()
	{
		$data['data_pegawai']=$this->pegawai_model->getDataPegawai();
		$this->load->view('Pegawai_dataTable',$data);	
	}
	
		}
		else{

			$config['upload_path']          = './assets/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000000000;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('userfile'))
                {
                        $error['data'] = "eror";
						$this->load->view('addData',$error);
                }
                else
                {
						$this->Club_Model->addData();
						header("location:index");
				}
		}
	}
	public function edit($id) 
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		if($this->form_validation->run()==FALSE){

			$data['data_pegawai']=$this->Club_Model->getDataIdKlub($id);
			$this->load->view('EditData',$data);

		}
		else{

			$config['upload_path']          = './assets/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000000000;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('userfile'))
                {
                        $error['data'] = "eror";
						$this->load->view('editData/$id',$error);
                }
                else
                {
						$this->Club_Model->editData($id);
						header("location:".site_url());
				}
		}
	}
	public function deleteValidation($id)
	{
		$data['data_pegawai']=$this->Club_Model->getDataIdKlub($id);
		$this->load->view('deleteData',$data);
	}


}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */

 ?>