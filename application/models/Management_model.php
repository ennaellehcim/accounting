<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management_model extends CI_Model {

	public function financial_statement_report(){
		$sql = "select * from tb_account_title where project_id=".$this->session->userdata('project_id')."";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}
	public function bs_assets_report(){
		$sql = "select * from tb_account_title where project_id=".$this->session->userdata('project_id')." and account_type = 'Assets'";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}
	public function bs_nonAssets_report(){
		$sql = "select * from tb_account_title where project_id=".$this->session->userdata('project_id')." and account_type = 'Non Assets'";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}
	public function bs_otherAssets_report(){
		$sql = "select * from tb_account_title where project_id=".$this->session->userdata('project_id')." and account_type = 'Other Assets'";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}
	public function bs_liabilities_report(){
		$sql = "select * from tb_account_title where project_id=".$this->session->userdata('project_id')." and account_type = 'Liabilities'";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}
	public function bs_equity_report(){
		$sql = "select * from tb_account_title where project_id=".$this->session->userdata('project_id')." and account_type = 'Equity'";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}

	public function income_statement_report(){
		$sql = "select * from tb_account_title where project_id=".$this->session->userdata('project_id')." and account_type = 'Expense'";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}

	public function trial_balance_report(){
		$sql = "select * from tb_account_title where project_id=".$this->session->userdata('project_id')."";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}
	
}
