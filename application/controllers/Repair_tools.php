<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repair_tools extends CI_Controller {

	// 用於查詢 tool_type 資料表的陣列
	
	public function __construct()
		{
			parent::__construct();
			// 載入列表 model
			$this->load->model('repair_tools_model');
			$this->load->model('tool_type_model');
			$this->load->model('vendor_model');
			$this->load->model('tools_model');

        }

	public function index()
	{
		
	}

	// 新增工具
	public function add_tool($list_id, $tooltype_id)

	{
		// 載入種類及廠商
		$data['tooltype'] = $this->tool_type_model->query($tooltype_id);
		$data['vendor'] = $this->vendor_model->query();
		$data['tool_list'] = $this->tools_model->query_bytype($tooltype_id);
		// $data['tooltype_list'] = $this->tool_type_model->get_array();
		// $data['vendor_list'] = $this->vendor_model->get_array();
		$data['list_id'] = $list_id;
		$data['type_id'] = $tooltype_id;

		// 表單驗證
		$this->form_validation->set_message('required','{field}未填');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('tool_number', '工具數量', 'trim|required');
		// 表單判斷
		if($this->form_validation->run() == FALSE) 
		{
		$this->load->view('header');
		$this->load->view('repair_tools_add_tool', $data);
		$this->load->view('footer');
		}
		else
		{
			// 接收表單
			$formdata['type'] = $this->input->post('type');
			$formdata['tool_name'] = $this->input->post('tool_name');
			$formdata['vendor'] = $this->input->post('vendor');

			// 新增至資料庫
			$this->repair_tools_model->add($formdata);

			// 回首頁
			redirect('/Repair_tools');
		}
	}
	// 修改類型
	public function modify($id)
	{
		// 表單驗證
		$this->form_validation->set_message('required','{field}未填');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('tool_name', '類別名稱', 'trim|required');
		// 表單判斷
		if($this->form_validation->run() == FALSE) 
		{
			// $data['id'] = $id;
			$data['tools'] = $this->repair_tools_model->query($id);
			// 載入種類及廠商
			$data['tooltype'] = $this->tool_type_model->query();
			$data['vendor'] = $this->vendor_model->query();
			// 載入 view
			$this->load->view('header');
			$this->load->view('tools_modify',$data);
			$this->load->view('footer');
		}
		else
		{
			// 接收表單
			$formdata['type'] = $this->input->post('type');
			$formdata['tool_name'] = $this->input->post('tool_name');
			$formdata['vendor'] = $this->input->post('vendor');
			$this->repair_tools_model->modify($id, $formdata);

			// 回首頁
			redirect('/Repair_tools');
		}
	}

	// 刪除公告
	public function delete($id)
	{
		if ($id > 0)
		{
			$this->repair_tools_model->del($id);

			// 回首頁
			redirect('/Repair_tools');
		}
	}
}

