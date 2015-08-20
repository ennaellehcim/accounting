<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trial_balance extends CI_Controller {
	public function index(){
		if ($this->session->userdata('islogged')) {
			$page_info = array(
								'page_tab' 		=> 'Ledger',
								'page_title' 	=> 'Trial Balance'
								);
			$this->load->view('parts/header',load_data($page_info));
			$this->load->view('parts/sidebar',load_data($page_info));
			$viewData = array(
				'charts_account' => $this->trial_balance_model->get_charts_title()
				);
			$this->load->view('modules/trial_balance', $viewData, true);
			$this->load->view('parts/footer');
		}
		else{
			redirect('login');
		}
	}

	public function load_page(){
		if ($this->session->userdata('islogged')) {
			$this->session->set_userdata('page_tab', 'Ledger');
			$this->session->set_userdata('page_title', 'Trial Balance');
			$this->session->set_userdata('current_page', 'trial_balance');
			$this->load->view('modules/trial_balance');
		}
		else{
			redirect('login');
		}
	}
}
