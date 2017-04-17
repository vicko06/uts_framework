<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Club_Model extends CI_Model {

		public function getDataClub()
		{
			$query=$this->db->query("select * from klub");
			return $query->result_array();
		}
		public function getPemainAll()
		{
			$query=$this->db->query("select A.nama as nama_club,B.* from klub as A join pemain as B on A.id = B.fk_klub");
			return $query->result_array();
		}
		public function getDataIdKlub($id)
		{
			$query=$this->db->query("select * from klub where id='$id'");
			return $query->result_array();
		}

		public function getPemainById($id)
		{
			$sql="select A.nama as nama_club,B.* from klub as A join pemain as B on A.id = B.fk_klub where A.id=$id";
			$query=$this->db->query($sql);
			return $query->result_array();			
		}
		public function getPemain($id)
		{
			$sql="select * from pemain where id=$id";
			$query=$this->db->query($sql);
			return $query->result_array();			
		}
		public function addData()
		{
			$object = array('nama' => $this->input->post('nama'),
							'logo' => $this->upload->data('file_name')
							);
			$this->db->insert('klub', $object);
		}
		public function editData($id)
		{
			$object = array('nama' => $this->input->post('nama'),
							'logo' => $this->upload->data('file_name'));
			$this->db->where('id', $id);
			$this->db->update('klub', $object);
		}
		public function deleteData($id)
		{	
			$this->db->query("delete from pemain where fk_klub = '$id'");
			$this->db->query("delete from klub where id = '$id'");
		}

}

/* End of file Pegawai_Model.php */
/* Location: ./application/models/Pegawai_Model.php */
 ?>