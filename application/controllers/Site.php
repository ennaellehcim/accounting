<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index(){
		if ($this->session->userdata('islogged')) {
			switch ($this->session->userdata('current_page')) {
				case 'system_settings':
				$this->load->model("system_settings_model");
				$this->session->set_userdata('page_tab', 'Administrator');
				$this->session->set_userdata('page_title', 'System Settings');
				$this->session->set_userdata('current_page', 'system_settings');
				$page_info = array(
					'page_tab' 		=> 'Administrator',
					'page_title' 	=> 'System Settings');
				$this->load->view('parts/header',load_data($page_info));
				$this->load->view('parts/sidebar',load_data($page_info));

				$copyright = array('copyright' => $this->system_settings_model->copyrights_show()->result_array());
				$account_group = array('account_group' => $this->system_settings_model->account_group_show()->result());

				$this->load->view('modules/system_settings',array_merge($copyright,$account_group));
				$this->load->view('parts/footer');
				break;

				case 'main_account':
				$this->load->model("system_settings_model");
				$this->load->model("main_account_model");
				$this->session->set_userdata('page_tab', 'Set Up');
				$this->session->set_userdata('page_title', 'Main Account');
				$this->session->set_userdata('current_page', 'main_account');
				
				$page_info = array(
					'page_tab' 		=> 'Set Up',
					'page_title' 	=> 'Main Account');
				$this->load->view('parts/header',load_data($page_info));
				$this->load->view('parts/sidebar',load_data($page_info));
				$master_name = array('master_name' => $this->main_account_model->show_master_name()->result());
				$this->load->view('modules/main_account',$master_name);
				$this->load->view('parts/footer');
				break;

				case 'subsidiary_account':
				$this->load->model("system_settings_model");
				$this->load->model("main_account_model");
				$this->load->model("subsidiary_account_model");
				$this->session->set_userdata('page_tab', 'Set Up');
				$this->session->set_userdata('page_title', 'Subsidiary Account');
				$this->session->set_userdata('current_page', 'subsidiary_account');
				
				$page_info = array(
					'page_tab' 		=> 'Set Up',
					'page_title' 	=> 'Subsidiary Account');
				$this->load->view('parts/header',load_data($page_info));
				$this->load->view('parts/sidebar',load_data($page_info));

				$account_list = array('account_list' => $this->system_settings_model->account_group_get('Assets')->result());
				$account_title = array('account_title' => $this->subsidiary_account_model->get_accounts()->result());
				$master_name = array('master_name' => $this->main_account_model->show_master_name()->result());
				$this->load->view('modules/subsidiary_account',array_merge($account_list,$account_title,$master_name));

				$this->load->view('parts/footer');
				break;
				
				case 'user_access':
				$this->load->model('user_access_model');
				$page_info = array(
					'page_tab' 		=> 'Administrator',
					'page_title'	=> 'User Access' 
					);
				$this->load->view('parts/header',load_data($page_info));
				$this->load->view('parts/sidebar',load_data($page_info));
				$user_access_type = array('user_access_type' => $this->user_access_model->show_user_type()->result());
				$user_access = array('user_access' => $this->user_access_model->show_user_access()->result());
				$projects = array('project_list' => $this->user_access_model->project_list());
				$this->load->view('modules/user_access', array_merge($user_access,$projects,$user_access_type));
				$this->load->view('parts/footer');
				break;
				// Use to show the Bank name in the bank recon module under select field 
				case 'bank_recon':
				$this->load->model('bank_recon_model');
				$page_info = array(
					'page_tab' 		=> 'Set Up',
					'page_title' 	=> 'Bank Recon'
					);
				$this->load->view('parts/header',load_data($page_info));
				$this->load->view('parts/sidebar',load_data($page_info));
				$bank_recon = array('bank_recon' => $this->bank_recon_model->show_bank());
				$this->load->view('modules/bank_recon', $bank_recon);
				$this->load->view('parts/footer');
				break;

				// Use to show the Master 
				case 'master_account':
				$page_info = array(
								'page_tab' 		=> 'Set Up',
								'page_title' 	=> 'Master Account'
							);
				$this->load->view('parts/header',load_data($page_info));
				$this->load->view('parts/sidebar',load_data($page_info));
				$this->load->model('master_account_model');
				$account_title = array('account_title' => $this->master_account_model->get_title());
				$this->load->view('modules/master_account',$account_title);
				$this->load->view('parts/footer');
				break;
				
				// Use to show the Expenses name in the accounts payable module under select field 
				case 'accounts_payable':
				$this->load->model('journal_ap_model');
				$this->load->model('bank_recon_model');
				$this->load->model('subsidiary_account_model');
				$page_info = array(
					'page_tab' 		=> 'Journal',
					'page_title'	=> 'Accounts Payable' 
					);
				$this->load->view('parts/header',load_data($page_info));
				$this->load->view('parts/sidebar');
				$viewData = array(
					'accounts_payable' => $this->journal_ap_model->show_expense_name(),
					'bank_recon' => $this->bank_recon_model->show_supplier(),
					'account_title' => $this->subsidiary_account_model->get_accounts()
					);
				$this->load->view('modules/accounts_payable', $viewData);
				$this->load->view('parts/footer');
				break;

				// Use to show the Bank name in the check dis module under select field 
				case 'check_dis':
				$this->load->model('journal_cd_model');
				$this->load->model('subsidiary_account_model');
				$page_info = array(
					'page_tab' 		=> 'Journal',
					'page_title'	=> 'Check Disbursement' 
					);
				$this->load->view('parts/header',load_data($page_info));
				$this->load->view('parts/sidebar');
				$viewData = array(
					'journal_cd' => $this->journal_cd_model->show_bank(),
					'account_title' => $this->subsidiary_account_model->get_accounts()
					);
				$this->load->view('modules/check_dis', $viewData);
				$this->load->view('parts/footer');
				break;
				
				
				// Use to show the Customer name in the sales journal module under select field 
				case 'sales_journal':
				$this->load->model('journal_sj_model');
				$this->load->model('subsidiary_account_model');
				$page_info = array(
					'page_tab' 		=> 'Journal',
					'page_title' 	=> 'Sales Journal'
					);
				$this->load->view('parts/header',load_data($page_info));
				$this->load->view('parts/sidebar');
				$viewData = array(
					'journal_sj' => $this->journal_sj_model->show_customer(),
					'account_title' => $this->subsidiary_account_model->get_accounts()
					);
				$this->load->view('modules/sales_journal', $viewData);
				$this->load->view('parts/footer');
				break;


				// Use to show the Customer name and bank name in the cash receipts module under select field 
				case 'cash_receipts':
				$this->load->model('journal_cr_model');
				$this->load->model('subsidiary_account_model');
				$page_info = array(
					'page_tab'		=> 'Journal',
					'page_title' 	=> 'Cash Receipts' 
					);
				$this->load->view('parts/header',load_data($page_info));
				$this->load->view('parts/sidebar');
				$viewData = array(
					'journal_cr_customer' => $this->journal_cr_model->show_customer(),
					'journal_cr_bank' => $this->journal_cr_model->show_bank(),
					'account_title' => $this->subsidiary_account_model->get_accounts()
					);
				$this->load->view('modules/cash_receipts', $viewData);
				$this->load->view('parts/footer');
				break;

				// Use to show the account title and general journal module under select field 
				case 'general_journal':
				$this->load->model('subsidiary_account_model');
				$page_info = array(
					'page_tab'		=> 'Journal',
					'page_title' 	=> 'General Journal' 
					);
				$this->load->view('parts/header',load_data($page_info));
				$this->load->view('parts/sidebar');
				$viewData = array(
					'account_title' => $this->subsidiary_account_model->get_accounts()
					);
				$this->load->view('modules/general_journal', $viewData);
				$this->load->view('parts/footer');
				break;

				// Use to show the account title and general journal module under select field 
				case 'general_ledger':
				$this->load->model('general_ledger_model');
				$page_info = array(
					'page_tab' 		=> 'Ledger',
					'page_title' 	=> 'General Ledger'
					);
				$this->load->view('parts/header',load_data($page_info));
				$this->load->view('parts/sidebar',load_data($page_info));
				$viewData = array(
					'account_title' => $this->general_ledger_model->get_accounts()
					);
				$this->load->view('modules/general_ledger', $viewData);
				$this->load->view('parts/footer');
				break;


				default:
				$page_info = array(
					'page_tab' 		=> $this->session->userdata('page_tab'),
					'page_title'	=> $this->session->userdata('page_title') 
					);
				$this->load->view('parts/header',load_data($page_info));
				$this->load->view('parts/sidebar',load_data($page_info));
				$this->load->view('modules/'.$this->session->userdata('current_page'));
				$this->load->view('parts/footer');
				break;
			}
		}
		else{
			redirect('login');
		}
	}

	public function get_sub(){
		$this->load->model('site_model');
		$data = $this->site_model->get_sub($this->input->post('account_code'))->result();
		$html = "";
		if ($data) {
			foreach ($data as $d) {
				$html.="<option value='".$d->sub_code."'>".$d->sub_name."</option>";
			}
			echo jcode(array('success' => 1,'html' => $html));
		}
		else{
			echo jcode(array('success' => 2));
		}
	}

	public function search_chartaccount(){
		$this->load->model('site_model');
		$chart_search = $this->input->post('chart');
		$data = $this->site_model->search_chartaccount($chart_search['account_code'], $chart_search['sub_code']);
		$html = "";

		$err = validates(array($chart_search), array());
		
		//if (count($err)) {
		if ($err<1) {
			echo jcode(array(
				'success' 	=> 3,
				'err' 		=> $err
				));
		} 
		else {
			if (!$data->num_rows()) {
				echo jcode(array(
					'success' 	=> 2
					));
			} 
			else 
			{
				if (!$chart_search['sub_code']){
					if ($this->site_model->has_sub($chart_search['account_code'])) {
						foreach ($data->result() as $key) {
							$html .="
							<tr>
								<td><label><input type='checkbox' class='' value='0' id='check' data-subcode='".$key->sub_code."' data-subname='".$key->sub_name."'><label>	</td>
								<td>".$key->account_code."</td>
								<td>".$key->account_title."</td>
								<td>".$key->sub_code."</td>
								<td>".$key->sub_name."</td>
							</tr>
							";
						}
					}					
					else{
						foreach ($data->result() as $key) {
							$html .="
							<tr>
								<td><label><input type='checkbox' class='' value='0' id='check' data-subcode='".$key->account_code."' data-subname='".$key->account_title."'><label>	</td>
								<td>".$key->account_code."</td>
								<td>".$key->account_title."</td>
								<td>none</td>
								<td>none</td>
							</tr>
							";		
						}
					}
				}
				else{
					foreach ($data->result() as $key) {
						$html .="
						<tr>
							<td><label><input type='checkbox' class='' value='0' id='check' data-subcode='".$key->sub_code."' data-subname='".$key->sub_name."'><label>	</td>
							<td>".$key->account_code."</td>
							<td>".$key->account_title."</td>
							<td>".$key->sub_code."</td>
							<td>".$key->sub_name."</td>
						</tr>
						";
					}
				}
				echo jcode(array('success' => 1,'response' => $html));
			}
			
		}
		//}
	}

}
