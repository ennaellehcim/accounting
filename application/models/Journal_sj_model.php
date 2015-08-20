<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journal_sj_model extends CI_Model {

	public function journal_sj_exist($siNo){
		$sql = "select * from tb_journal_sj where project_id=".$this->session->userdata('project_id')." and sj_si_no = ?";
		$data = array($siNo);
		$query = $this->db->query($sql,$data);
		return $query->num_rows();
	}

	public function journal_sj_add($journal_sj_data){
		$this->db->insert('tb_journal_sj', $journal_sj_data);
		return $this->db->insert_id();
	}

	public function journal_sj_trans_add($data){
		$this->db->insert('tb_journal_sj_trans', $data);
	}

	public function journal_sj_get($sj_si_no,$sj_si_date){
		$sql 	= "select * from tb_journal_sj where project_id=".$this->session->userdata('project_id')." and sj_si_no like ? and sj_si_date like ?";
		$query	= $this->db->query($sql, array("%$sj_si_no%","%$sj_si_date%"));
		return $query;
	}

	public function journal_get_entries($sj_id){
		$sql = "
		select sj.*, sjt.sj_trans_account_code, sjt.sj_trans_sub_name, sjt.sj_trans_dr, sjt.sj_trans_cr
		from tb_journal_sj sj left join tb_journal_sj_trans sjt on sj.sj_id=sjt.sj_id
		where sj.project_id=".$this->session->userdata('project_id')." and sj.sj_id = ?
		";
		return $this->db->query($sql, array($sj_id));
	}

	public function show_customer(){
		$sql = "tb_master where project_id=".$this->session->userdata('project_id')." and master_type = 'Customer' ";
		$query = $this->db->get($sql)->result();
		return $query;
	}
}
