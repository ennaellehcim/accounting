<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journal_gj_model extends CI_Model {

	public function journal_gj_exist($gjCode){
		$sql = "select * from tb_journal_gj where project_id=".$this->session->userdata('project_id')." and gj_code = ?";
		$data = array($gjCode);
		$query = $this->db->query($sql,$data);
		return $query->num_rows();
	}

	public function journal_gj_add($journal_gj_data){
		$this->db->insert('tb_journal_gj', $journal_gj_data);
		return $this->db->insert_id();
	}

	public function journal_gj_trans_add($data){
		$this->db->insert('tb_journal_gj_trans', $data);
	}

	public function journal_gj_get($gj_code,$gj_date){
		$sql 	= "select * from tb_journal_gj where project_id=".$this->session->userdata('project_id')." and gj_code like ? and gj_date like ?";
		$query 	= $this->db->query($sql, array("%$gj_code%","%$gj_date%"));
		return $query;
	}

	public function journal_get_entries($gj_id){
		$sql = "
		select gj.*, gjt.gj_trans_account_code, gjt.gj_trans_sub_name, gjt.gj_trans_dr, gjt.gj_trans_cr
		from tb_journal_gj gj left join tb_journal_gj_trans gjt on gj.gj_id=gjt.gj_id
		where gj.project_id=".$this->session->userdata('project_id')." and gj.gj_id = ?
		";
		return $this->db->query($sql, array($gj_id));
	}
}
