<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journal_cd_model extends CI_Model {

	public function journal_cd_exist($voucherNo){
		$sql = "select * from tb_journal_cd where project_id=".$this->session->userdata('project_id')." and cd_voucher_no = ?";
		$data = array($voucherNo);
		$query = $this->db->query($sql,$data);
		return $query->num_rows();
	}

	public function journal_cd_add($journal_cd_data){
		$this->db->insert('tb_journal_cd', $journal_cd_data);
		return $this->db->insert_id();
	}

	public function journal_cd_trans_add($data){
		$this->db->insert('tb_journal_cd_trans', $data);
	}

	public function journal_cd_get($cd_voucher_no,$cd_date,$cd_payee_name,$cd_check_no){
		$sql = "select * from tb_journal_cd where project_id=".$this->session->userdata('project_id')." and cd_voucher_no like ? and cd_date like ? and cd_payee_name like ? and cd_check_no like ?";
		return $this->db->query($sql, array("%$cd_voucher_no%","%$cd_date%","%$cd_payee_name%","%$cd_check_no%"));
	}

	public function journal_get_entries($cd_id){
		$sql = "
		select cd.*, cdt.cd_trans_account_code, cdt.cd_trans_sub_name, cdt.cd_trans_dr, cdt.cd_trans_cr
		from tb_journal_cd cd left join tb_journal_cd_trans cdt on cd.cd_id=cdt.cd_id
		where cd.project_id=".$this->session->userdata('project_id')." and cd.cd_id = ?
		";
		return $this->db->query($sql, array($cd_id));
	}

	public function show_bank(){
		//$sql = "tb_master where master_type = 'Bank' ";
		$sql = "tb_account_subsidiary where account_title = 'Cash in Bank' and project_id='".$this->session->userdata('project_id')."'";
		$query = $this->db->get($sql)->result();
		return $query;
	}

}
