<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model {
	
	public function search_chartaccount($account_code,$sub_code){
		if (!$sub_code) {
			$has_subcode = $this->db->query("select * from tb_account_subsidiary where project_id=".$this->session->userdata('project_id')." and account_code='".$account_code."'")->num_rows();
			if ($has_subcode) {
				$sql = "select * from tb_account_subsidiary where project_id=".$this->session->userdata('project_id')." and account_code='".$account_code."'";
				return $this->db->query($sql);
			}
			else{
				$sql = "select * from tb_account_title where project_id=".$this->session->userdata('project_id')." and account_code='".$account_code."'";
				return $this->db->query($sql);		 		
			}
		}
		else{
			return $this->db->query("select * from tb_account_subsidiary where project_id=".$this->session->userdata('project_id')." and account_code='".$account_code."' and sub_code='".$sub_code."'");
		}		
	}

	public function has_sub($account_code){
		return $this->db->query("select * from tb_account_subsidiary where project_id=".$this->session->userdata('project_id')." and account_code='".$account_code."'")->num_rows();
	}

	public function get_sub($account_code){
		return $this->db->query("select * from tb_account_subsidiary where account_code='".$account_code."'");
	}

}
