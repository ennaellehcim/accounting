<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trial_balance_model extends CI_Model {

	
	public function get_charts_title(){
		$sql = "select ap_expenses as title FROM tb_journal_ap 
				UNION
				select cd_payee_name as title FROM tb_journal_cd
				UNION
				select cr_master_name_bank as title FROM tb_journal_cr
				ORDER BY title ";
		$query = $this->db->query($sql)->result();
		return $query;
	}
}
