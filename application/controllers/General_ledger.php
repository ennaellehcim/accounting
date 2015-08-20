<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_ledger extends CI_Controller {
	public function index(){
		$this->load->model('general_ledger_model');
		if ($this->session->userdata('islogged')) {
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
		}
		else{
			redirect('login');
		}
	}

	public function load_page(){
		$this->load->model('general_ledger_model');
		if ($this->session->userdata('islogged')) {
			$this->session->set_userdata('page_tab', 'Ledger');
			$this->session->set_userdata('page_title', 'General Ledger');
			$this->session->set_userdata('current_page', 'general_ledger');
			$viewData = array(
				'account_title' => $this->general_ledger_model->get_accounts()
			);
			$this->load->view('modules/general_ledger', $viewData);
		}
		else{
			redirect('login');
		}
	}

	public function search_list(){
		$this->load->model('general_ledger_model');
		if ($this->session->userdata('islogged')) {
			
			$search = $this->input->post('gl-search');
			$search_type = $this->input->post('gl-search[journal]');
			$subs = $search['sub_account'];
			if ($search_type == 1) { //Search Journal: ALL Journals

				$search = $this->input->post('gl-search');
				$data = $this->general_ledger_model->search_gl_all($search['main_account'],$search['from_date'],$search['to_date']);
				// print_r($this->db->last_query());
				// $tot_data = $this->general_ledger_model->sglall_total($search['main_account'],$search['from_date'],$search['to_date']);
				$html="";
				$err = validates(array($search), array());

				if ($err) {
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
							$html.="
							<tr>
								<td>".$key->date."</td>
								<td>".$key->masterm."</td>
								<td>".$key->particulars."</td>
								<td>".$key->transcode."</td>
								<td class='text-right'>0</td>
								<td class='text-right'>".$key->tot_amount."</td>
							</tr>";
						}
						

						// foreach ($tot_data->result() as $key) {
						// 	$html.="
						// 	<tr>
						// 		<td class=''>TOTAL</td>
						// 		<td></td>
						// 		<td></td>
						// 		<td></td>
						// 		<td class='text-right '>".$key->totdr."</td>
						// 		<td class='text-right '>".$key->totcr."</td>
						// 	</tr>
						// 	";
						// }
						echo jcode(array('success' => 1,'data' => $html));
					}
				}
			} elseif ($search_type == 2){ 
				//Search Journal: Cash Receipts
				$search = $this->input->post('gl-search');
				$new_mainaccount = substr($search['main_account'], 8);
				$data = $this->general_ledger_model->search_gl_cash($subs,$search['from_date'],$search['to_date']);
				
				$tot_data = $this->general_ledger_model->sglc_total($subs,$search['from_date'],$search['to_date']);
				$html="";
				$err = validates(array($search), array());

				if ($err) {
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
							$html.="
							<tr>
								<td>".$key->date."</td>
								<td>".$key->description."</td>
								<td>".$key->particulars."</td>
								<td>".$key->transcode."</td>
								<td class='text-right'>".$key->tot_amount."</td>
								<td class='text-right'>0.00</td>
							</tr>";
						}
						

						foreach ($tot_data->result() as $key) {
							$html.="
							<tr>
								<td class=''>TOTAL</td>
								<td></td>
								<td></td>
								<td></td>
								<td class='text-right '>".$key->tot_amount."</td>
								<td class='text-right '>0.00</td>
							</tr>
							";
						}
						echo jcode(array('success' => 1,'data' => $html));
					}
				}
			} elseif ($search_type == 3){ 
				// Search Journal: Acconts Payable
				$search = $this->input->post('gl-search');
				$new_mainaccount = substr($search['main_account'], 8);
				$data = $this->general_ledger_model->search_gl_ap($subs,$search['from_date'],$search['to_date']);
				
				$tot_data = $this->general_ledger_model->sglap_total($subs,$search['from_date'],$search['to_date']);
				// print_r($this->db->last_query());
				$html="";
				$err = validates(array($search), array());

				if ($err) {
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
							$html.="
							<tr>
								<td>".$key->invDate."</td>
								<td>".$key->mastername."</td>
								<td>".$key->particulars."</td>
								<td>".$key->transcode."</td>
								<td class='text-right'>0</td>
								<td class='text-right'>".$key->tot_amount."</td>
								<td><a href=# class='btn btn-style-1'><i class='fa fa-file-text'></i></a></td>
							</tr>";
						}
						

						foreach ($tot_data->result() as $key) {
							$html.="
							<tr>
								<td class=''>TOTAL</td>
								<td></td>
								<td></td>
								<td></td>
								<td class='text-right '>0</td>
								<td class='text-right '>".$key->tot_amount."</td>
							</tr>
							";
						}
						echo jcode(array('success' => 1,'data' => $html));
					}
				}
			} elseif ($search_type == 4){ 
				//Search Journal:Check Disbursement
				$search = $this->input->post('gl-search');
				$new_mainaccount = substr($search['main_account'], 8);
				$data = $this->general_ledger_model->search_gl_cd($subs,$search['from_date'],$search['to_date']);
				// print_r($this->db->last_query());
				$tot_data = $this->general_ledger_model->sglcd_total($subs,$search['from_date'],$search['to_date']);
				$html="";
				$err = validates(array($search), array());

				if ($err) {
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
							$html.="
							<tr>
								<td>".$key->date."</td>
								<td>".$key->mastername."</td>
								<td>".$key->particulars."</td>
								<td>".$key->transcode."</td>
								<td class='text-right'>".$key->dr."</td>
								<td class='text-right'>".$key->cr."</td>
							</tr>";
						}
						

						foreach ($tot_data->result() as $key) {
							$html.="
							<tr>
								<td class=''>TOTAL</td>
								<td></td>
								<td></td>
								<td></td>
								<td class='text-right '>".$key->totdr."</td>
								<td class='text-right '>".$key->totcr."</td>
							</tr>
							";
						}
						echo jcode(array('success' => 1,'data' => $html));
					}
				}
			} elseif ($search_type == 5){ 
				//Search Journal:Sales Journal
				$search = $this->input->post('gl-search');
				$new_mainaccount = substr($search['main_account'], 8);
				$data = $this->general_ledger_model->search_gl_sj($subs,$search['from_date'],$search['to_date']);
				$tot_data = $this->general_ledger_model->sglsj_total($search['main_account'],$subs,$search['from_date'],$search['to_date']);
				$html="";
				$err = validates(array($search), array());

				if ($err) {
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
							$html.="
							<tr>
								<td>".$key->date."</td>
								<td>".$key->masterm."</td>
								<td>".$key->particulars."</td>
								<td>".$key->transcode."</td>
								<td class='text-right'>".$key->dr."</td>
								<td class='text-right'>".$key->cr."</td>
							</tr>";
						}
						

						foreach ($tot_data->result() as $key) {
							$html.="
							<tr>
								<td class=''>TOTAL</td>
								<td></td>
								<td></td>
								<td></td>
								<td class='text-right '>".$key->totdr."</td>
								<td class='text-right '>".$key->totcr."</td>
							</tr>
							";
						}
						echo jcode(array('success' => 1,'data' => $html));
					}
				}
			} elseif ($search_type == 6){ 
				//Search Journal:General Journal
				$search = $this->input->post('gl-search');
				$new_mainaccount = substr($search['main_account'], 8);
				$data = $this->general_ledger_model->search_gl_gj($subs,$search['from_date'],$search['to_date']);
	
				$tot_data = $this->general_ledger_model->sglgj_total($search['main_account'],$subs,$search['from_date'],$search['to_date']);
				$html="";
				$err = validates(array($search), array());

				if ($err) {
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
							$html.="
							<tr>
								<td>".$key->date."</td>
								<td></td>
								<td>".$key->particulars."</td>
								<td>".$key->transcode."</td>
								<td class='text-right'>".$key->dr."</td>
								<td class='text-right'>".$key->cr."</td>
							</tr>";
						}
						

						foreach ($tot_data->result() as $key) {
							$html.="
							<tr>
								<td class=''>TOTAL</td>
								<td></td>
								<td></td>
								<td></td>
								<td class='text-right '>".$key->totdr."</td>
								<td class='text-right '>".$key->totcr."</td>
							</tr>
							";
						}
						echo jcode(array('success' => 1,'data' => $html));
					}
				}
			}
		} else {
			redirect('login');
		}
	}

	public function summary_report(){
		$this->load->model("general_ledger_model");
		if ($this->session->userdata('islogged')) {
			
			$ctr_acct = $this->input->get('ctr');
			$sub_acct = $this->input->get('sub');
			$from = $this->input->get('fr');
			$to = $this->input->get('to');
			$html = $this->config->item('report_header');
			$data = array(
					'ledger' => $this->general_ledger_model->search_gl_cash($account_title,$cr_trans_sub_name, $from_date,$to_date)
				);
			$html.= $this->load->view('report/gl_search_report', $data, true);
			$html.= $this->config->item('report_footer');
			pdf_create($html, 'filename');
		}
		else{
			redirect('login');
		}
	}
}
