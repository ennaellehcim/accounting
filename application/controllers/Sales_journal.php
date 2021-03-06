<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_journal extends CI_Controller {
	public function index(){
		$this->load->model('journal_sj_model');
		$this->load->model('subsidiary_account_model');
		if ($this->session->userdata('islogged')) {
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
		}
		else{
			redirect('login');
		}
	}

	public function load_page(){
		$this->load->model('journal_sj_model');
		$this->load->model('subsidiary_account_model');
		if ($this->session->userdata('islogged')) {
			$this->session->set_userdata('page_tab', 'Journal');
			$this->session->set_userdata('page_title', 'Sales Journal');
			$this->session->set_userdata('current_page', 'sales_journal');
			$viewData = array(
				'journal_sj' => $this->journal_sj_model->show_customer(),
				'account_title' => $this->subsidiary_account_model->get_accounts()
			);
			$this->load->view('modules/sales_journal', $viewData);
		}
		else{
			redirect('login');
		}
	}

	public function save_journal_sj(){
		$this->load->model('journal_sj_model');
		$journal_sj_data = $this->input->post('sj');
		$ap_entry = $this->input->post('ap_entry');
		$err = validates(array($journal_sj_data), array());

		if (count($err)) {
			echo jcode(array(
					'success' 	=> 3,
					'err' 		=> $err
				));
		} else {
			$siNo = isset($journal_sj_data['sj_si_no']) ? $journal_sj_data['sj_si_no']: '';
			$check_id = $this->journal_sj_model->journal_sj_exist($siNo);
			
			if ($check_id) {
				echo jcode(array('success' => 2));
			} else {
				$trans_data = array(
										'project_id' 		=> $this->session->userdata('project_id'),
										'sj_si_date' 		=> $journal_sj_data['sj_si_date'],
										'sj_si_no'			=> $journal_sj_data['sj_si_no'],
										'sj_master_name'	=> substr($journal_sj_data['sj_master_name'],5),
										'sj_terms'			=> $journal_sj_data['sj_terms'],
										'sj_si_amount'		=> $journal_sj_data['sj_si_amount'],
										'sj_particulars'	=> $journal_sj_data['sj_particulars'],
										'total_debit'		=> $journal_sj_data['total_debit'],
										'total_credit'		=> $journal_sj_data['total_credit']
									);
				$trans_id = $this->journal_sj_model->journal_sj_add($trans_data);

				for ($i = 0;$i<count($ap_entry['code']);$i++) {						
						$data = array(
												'sj_id' 				=> $trans_id, 
												'project_id'			=> $this->session->userdata('project_id'),
												'sj_trans_account_code' => $ap_entry['code'][$i],
												'sj_trans_sub_name'		=> $ap_entry['accname'][$i],
												'sj_trans_dr'			=> $ap_entry['accdebit'][$i],
												'sj_trans_cr'			=> $ap_entry['acccredit'][$i]
											);
						$this->journal_sj_model->journal_sj_trans_add($data);
				}
				echo jcode(array('success' => 1));
			}
		}
	}

	public function search_sj(){
		$this->load->model('journal_sj_model');
		$account_search = $this->input->post('searchSJ');
		$data = $this->journal_sj_model->journal_sj_get($account_search['searchSJ_siNo'],$account_search['searchSJ_siDate']);
		$html = "";

		$err = validates(array($account_search), array());
		
		if (count($err)) {
			if ($err<1) {
				echo jcode(array(
					'success' 	=> 3,
					'err' 		=> $err
					));
			} else {
				if (!$data->num_rows()) {
					echo jcode(array(
						'success' 	=> 2
						));
				} else {
					foreach ($data->result() as $key) {
						$html .="
						<tr>
							<td>".$key->sj_si_no."</td>
							<td>".$key->sj_si_date."</td>
							<td>".$key->sj_master_name."</td>
							<td>".$key->sj_particulars."</td>
							<td>".$key->sj_si_amount."</td>
							<td><a href='#' data-id='$key->sj_id' class='btn-style-1 account-report-print animate-4 pull-left'><i class='fa fa-print'></i></a></td>
						</tr>
						";
					}
					echo jcode(array('success' => 1,'response' => $html));
				}
				
			}
		}
	}

	public function sj_report(){
		$this->load->model('journal_sj_model');
		if ($this->session->userdata('islogged')) {
			$id = (int)$this->input->get('id');
			$html = $this->config->item('report_header');
			$viewData = array(
				'sj_entries' => $this->journal_sj_model->journal_get_entries($id)
				);
			$html.= $this->load->view('report/sj_entries', $viewData, true);
			$html.= $this->config->item('report_footer');
			pdf_create($html, 'EPS-Accounting-Report');
		}else {
			redirect('login');
		}
	}

	public function sj_summary_report(){
		$this->load->model("journal_sj_model");
		if ($this->session->userdata('islogged')) {
			$sj_si_no 	= $this->input->get('si');
			$sj_si_date	= $this->input->get('sid');
			$html = $this->config->item('report_header');
			$data = array(
					'accounts' => $this->journal_sj_model->journal_sj_get($sj_si_no,$sj_si_date)->result()
				);
			$html.= $this->load->view('report/sj_search_report', $data, true);
			$html.= $this->config->item('report_footer');
			pdf_create($html, 'filename');
		}
		else{
			redirect('login');
		}
	}
}
