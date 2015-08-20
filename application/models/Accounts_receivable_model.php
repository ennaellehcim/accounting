<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts_receivable_model extends CI_Model {

	public function accounts_receivable_exist($invNo){
		
	}

	public function accounts_receivable_add($accounts_receivable_data){
		
	}

	public function accounts_receivable_trans_add(){
		
	}

	public function accounts_receivable_get(){
		
	}

	public function show_customer_name(){
		$sql = "tb_master where master_type = 'Customer' ";
		$query = $this->db->get($sql)->result();
		return $query;
	}
}
