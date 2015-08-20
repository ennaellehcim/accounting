<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journal_cr_model extends CI_Model {

	public function journal_cr_exist($orNo){
		$sql = "select * from tb_journal_cr where project_id=".$this->session->userdata('project_id')." and cr_or_no = ?";
		$data = array($orNo);
		$query = $this->db->query($sql,$data);
		return $query->num_rows();
	}

	public function journal_cr_add($journal_cr_data){
		$this->db->insert('tb_journal_cr', $journal_cr_data);
		return $this->db->insert_id();
	}

	public function journal_cr_trans_add($data){
		$this->db->insert('tb_journal_cr_trans', $data);
	}

	public function journal_cr_get($cr_or_no,$cr_or_date){
		$sql 	= "select * from tb_journal_cr where project_id=".$this->session->userdata('project_id')." and cr_or_no like ? and cr_or_date like ?";
		$query 	= $this->db->query($sql, array("%$cr_or_no%","%$cr_or_date%"));
		return $query;
	}

	public function journal_get_entries($cr_id){
		$sql = "
		select cr.*, crt.cr_trans_account_code, crt.cr_trans_sub_name, crt.cr_trans_dr, crt.cr_trans_cr
		from tb_journal_cr cr left join tb_journal_cr_trans crt on cr.cr_id=crt.cr_id
		where cr.project_id=".$this->session->userdata('project_id')." and cr.cr_id = ?
		";
		return $this->db->query($sql, array($cr_id));
	}

	public function show_customer(){
		$sql = "tb_master where project_id=".$this->session->userdata('project_id')." and master_type = 'Customer' ";
		$query = $this->db->get($sql)->result();
		return $query;
	}

	public function show_bank(){
		//$sql = "tb_master where project_id=".$this->session->userdata('project_id')." and master_type = 'Bank' ";
		$sql = "tb_account_subsidiary where account_title = 'Cash in Bank' and project_id='".$this->session->userdata('project_id')."'";
		$query = $this->db->get($sql)->result();
		return $query;
	}

}
