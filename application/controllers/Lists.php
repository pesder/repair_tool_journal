<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			// 載入列表 model
			$this->load->model('repair_list_model');
        }

	public function index()
	{
		$data['lists'] = $this->repair_list_model->query_limit(25);
		// 載入 view
		$this->load->view('header');
		$this->load->view('lists_index',$data);
		$this->load->view('footer');
	}

	// 新增公告
	public function add()
	{
		// 表單驗證
		$this->form_validation->set_message('required','{field}未填');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('start_date', '送修日期', 'trim|required');
		$this->form_validation->set_rules('phone', '手機號碼', 'trim|required');
		// 表單判斷
		if($this->form_validation->run() == FALSE) 
		{
			// 載入 view
			$this->load->view('header');
			$this->load->view('lists_add');
			$this->load->view('footer');
		}
		else
		{
			// 接收表單
			$formdata['start_date'] = $this->input->post('start_date');
			$formdata['phone'] = $this->input->post('phone');
			// 新增至資料庫
			$this->repair_list_model->add($formdata);

			// 回首頁
			redirect('/lists');
		}
	}

	// 加入訂單 step 1
	public function add_list()
	{
		// 表單驗證
		$this->form_validation->set_message('required','{field}未填');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('start_date', '送修日期', 'trim|required');
		$this->form_validation->set_rules('phone', '手機號碼', 'trim|required');
		// 表單判斷
		if($this->form_validation->run() == FALSE) 
		{
			$data['s_date'] = date("Y-m-d");
			// 載入 view
			$this->load->view('header-jquery');
			$this->load->view('lists_add_list',$data);
			$this->load->view('footer');
		}
		else
		{
			// 接收表單
			$formdata['start_date'] = $this->input->post('start_date');
			$formdata['phone'] = $this->input->post('phone');
			$input_data = array (
				's_date' => $formdata['start_date'],
				's_phone' => $formdata['phone']);
			$this->session->set_userdata($input_data);
	

			redirect('/lists/choose_name');
		}
	}
	// 加入訂單 step 1 今天版
	public function add_list_last()
	{
		// 表單驗證
		$this->form_validation->set_message('required','{field}未填');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('start_date', '送修日期', 'trim|required');
		$this->form_validation->set_rules('phone', '手機號碼', 'trim|required');
		// 表單判斷
		if($this->form_validation->run() == FALSE) 
		{
			$lists_id = $this->repair_list_model->get_last();
			$lastrow = $this->repair_list_model->query($lists_id);
			$lastdate = '';
			foreach ($lastrow as $row) {
				$lastdate = $row->start_date;
			}
			$data['s_date'] = $lastdate;
			// 載入 view
			$this->load->view('header-jquery');
			$this->load->view('lists_add_list', $data);
			$this->load->view('footer');
		}
		else
		{
			// 接收表單
			$formdata['start_date'] = $this->input->post('start_date');
			$formdata['phone'] = $this->input->post('phone');
			$input_data = array (
				's_date' => $formdata['start_date'],
				's_phone' => $formdata['phone']);
			$this->session->set_userdata($input_data);
	

			redirect('/lists/choose_name');
		}
	}
	// 加入訂單 step 2
	public function choose_name()
	{
		// 表單驗證
		$this->form_validation->set_message('required','{field}未填');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('start_date', '送修日期', 'trim|required');
		$this->form_validation->set_rules('phone', '手機號碼', 'trim|required');
		$data['lists_date'] = $this->session->s_date;
		$data['lists_phone'] = $this->session->s_phone;
		$data['lists_his'] = $this->repair_list_model->query_bynumber($data['lists_phone']);
		// 表單判斷
		if($this->form_validation->run() == FALSE) 
		{
		// 載入 view
			$this->load->view('header');
			$this->load->view('lists_choose_name',$data);
			$this->load->view('footer');
		}
		else
		{
		// 接收表單
		$formdata['start_date'] = $data['lists_date'];
		$formdata['phone'] = $data['lists_phone'];
		if(empty($this->input->post('customer_name_old')))
		{

			$formdata['customer_name'] = $this->input->post('customer_name');
			
		}
		else
		{
			$formdata['customer_name'] = $this->input->post('customer_name_old');
		}
		// 新增至資料庫
			$newid = $this->repair_list_model->add_r($formdata);
		redirect('/lists/modify/' . $newid);
		}
	}


	// 修改公告
	public function modify($id)
	{
		// 表單驗證
		$this->form_validation->set_message('required','{field}未填');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('start_date', '送修日期', 'trim|required');
		$this->form_validation->set_rules('phone', '手機號碼', 'trim|required');
		// 載入工具種類
		$this->load->model('tool_type_model');
		$this->load->model('repair_tools_model');
		$this->load->model('vendor_model');
		$this->load->model('tools_model');
		$this->load->model('parts_model');
		$this->load->model('repair_tool_parts_model');
		
		// 表單判斷
		if($this->form_validation->run() == FALSE) 
		{
			// $data['id'] = $id;
			$data['lists_id'] = $this->repair_list_model->query($id);
			$data['tooltype'] = $this->tool_type_model->query();
			$data['lists_tools'] = $this->repair_tools_model->query_bylist($id);
			$data['lists_parts'] = $this->repair_tool_parts_model->query_bylist($id);
			$data['vendor'] = $this->vendor_model->query();
			$data['toollist'] = $this->tools_model->query();
			$data['partlist'] = $this->parts_model->query();
			// 載入 view
			$this->load->view('header-jquery');
			$this->load->view('lists_modify',$data);
			$this->load->view('footer');
		}
		else
		{
			// 接收表單
			$formdata['start_date'] = $this->input->post('start_date');
			$formdata['phone'] = $this->input->post('phone');
			$formdata['customer_name'] = $this->input->post('customer_name');
			$formdata['tools_status'] = $this->input->post('tools_status');
			$formdata['tools_memo'] = $this->input->post('tools_memo');
			$formdata['parts_memo'] = $this->input->post('parts_memo');
			$formdata['closed'] = $this->input->post('closed');
			$formdata['repaired'] = $this->input->post('repaired');
			$formdata['call_date'] = $this->input->post('call_date');
			$formdata['return_date'] = $this->input->post('return_date');
			$formdata['price'] = $this->input->post('price');
			// 修改資料庫
			$this->repair_list_model->modify($id, $formdata);

			// 回首頁
			redirect('/lists');
		}
	}

	// 刪除公告
	public function delete($id)
	{
		if ($id > 0)
		{
			$this->repair_list_model->del($id);

			// 回首頁
			redirect('/lists');
		}
	}

	// 收集維修工具資料寫入列表
	public function collect_tool($lists_id)
	{
		$this->load->model('tools_model');
		$this->load->model('repair_tools_model');
		$alltool = $this->tools_model->query();
		$repair_tool = $this->repair_tools_model->query_bylist($lists_id);
		$tools_orig = '';
		foreach ($repair_tool as $row) {
			$tools_orig = $tools_orig . 'TOOL' . $row->tool_id . '、';
		}
		
		// 取出工具代號轉換用字串陣列
      	$orig_tid;
      	$rep_tid;
     	for ($j =0; $j < count($alltool); $j++)
    	{
      		$orig_tid[$j] = 'TOOL' . $alltool[$j]->id;
      		$rep_tid[$j] = $alltool[$j]->tool_name;
    	}
    	$tools_after = str_replace($orig_tid, $rep_tid, $tools_orig);
    	
    	$data['tools_memo'] = $tools_after;
    	$this->repair_list_model->modify($lists_id, $data);
    	redirect ('/Lists/modify/' . $lists_id);
	}

	// 收集維修零件資料寫入列表
	public function collect_parts($lists_id)
	{
		$this->load->model('parts_model');
		$this->load->model('repair_tool_parts_model');
		$allparts = $this->parts_model->query();
		$repair_parts = $this->repair_tool_parts_model->query_bylist($lists_id);
		$parts_orig = '';
		foreach ($repair_parts as $row) {
			$parts_orig = $parts_orig . 'PART' . $row->parts_id . '、';
		}
		
		// 取出工具代號轉換用字串陣列
      	$orig_pid;
      	$rep_pid;
     	for ($j =0; $j < count($allparts); $j++)
    	{
      		$orig_pid[$j] = 'PART' . $allparts[$j]->id;
      		$rep_pid[$j] = $allparts[$j]->p_name;
    	}
    	$parrts_after = str_replace($orig_pid, $rep_pid, $parts_orig);
    	
    	$data['parts_memo'] = $parrts_after;
    	$this->repair_list_model->modify($lists_id, $data);
    	redirect ('/Lists/modify/' . $lists_id);
	}
}

