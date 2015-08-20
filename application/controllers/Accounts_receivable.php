<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts_receivable extends CI_Controller {
	public function index(){
		$this->load->model('accounts_receivable_model');
		if ($this->session->userdata('islogged')) {
			$page_info = array(
								'page_tab' 		=> 'Ledger',
								'page_title'	=> 'Accounts Receivable' 
							  );
			$this->load->view('parts/header',load_data($page_info));
			$this->load->view('parts/sidebar',load_data($page_info));
			$viewData = array(
				'accounts_receivable' => $this->accounts_receivable_model->show_customer_name()
			);
			$this->load->view('modules/accounts_receivable', $viewData);
			$this->load->view('parts/footer');
		}
		else{
			redirect('login');
		}
	}

	public function load_page(){
		$this->load->model('accounts_receivable_model');
		if ($this->session->userdata('islogged')) {
			$this->session->set_userdata('page_tab', 'Ledger');
			$this->session->set_userdata('page_title', 'Accounts Receivable');
			$this->session->set_userdata('current_page', 'accounts_receivable');
			$viewData = array(
				'accounts_receivable' => $this->accounts_receivable_model->show_customer_name()
			);
			$this->load->view('modules/accounts_receivable', $viewData);
		}
		else{
			redirect('login');
		}
	}
}
