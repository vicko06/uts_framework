<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemain_Model extends CI_Model {

	public function addData()
		{
			$object = array('nama' => $this->input->post('nama'),
							'posisi'=> $this->input->post('posisi'),
							'tanggal_lahir' => $this->input->post('tglLahir'),
							'fk_klub'=> $this->input->post('fk_klub'),
							);
			$this->db->insert('pemain', $object);
		}

		public function editData($id)
		{
			$object = array('nama' => $this->input->post('nama'),
							'posisi'=> $this->input->post('posisi'),
							'tanggal_lahir' => $this->input->post('tglLahir'),
							'fk_klub'=> $this->input->post('fk_klub'),
							);
			$this->db->where('id', $id);
			$this->db->update('pemain', $object);
		}
		public function deleteData($id)
		{	
			$this->db->query("delete from pemain where id = '$id'");
		}

}

/* End of file Pemain_Model.php */
/* Location: ./application/models/Pemain_Model.php */