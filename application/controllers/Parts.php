<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parts extends CI_Controller {

	// 用於查詢 tool_type 資料表的陣列
	
	public function __construct()
		{
			parent::__construct();
			// 載入列表 model
			$this->load->model('parts_model');
			$this->load->model('tool_type_model');
			$this->load->model('vendor_model');

        }

	public function index()
	{
		$data['parts'] = $this->parts_model->query();
		// 載入種類及廠商
		$data['tooltype'] = $this->tool_type_model->query();
		//$data['vendor'] = $this->vendor_model->query();
		
		// 載入 view
		$this->load->view('header');
		// 檢查是否存在 tool_type ，若無則顯示相關資訊
		if(empty($data['tooltype']))
		{
			$this->load->view('tools_index_notype');
		}
		$this->load->view('parts_index',$data);
		$this->load->view('footer');
	}

	// 新增工具
	public function add()

	{
		// 載入種類及廠商
		$data['tooltype'] = $this->tool_type_model->query();
		//$data['vendor'] = $this->vendor_model->query();
		// $data['tooltype_list'] = $this->tool_type_model->get_array();
		// $data['vendor_list'] = $this->vendor_model->get_array();

		// 表單驗證
		$this->form_validation->set_message('required','{field}未填');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('p_name', '零件名稱', 'trim|required');
		// 表單判斷
		if($this->form_validation->run() == FALSE) 
		{
		$this->load->view('header');
		$this->load->view('parts_add', $data);
		$this->load->view('footer');
		}
		else
		{
			// 接收表單
			$formdata['type'] = $this->input->post('type');
			$formdata['p_name'] = $this->input->post('p_name');

			// 新增至資料庫
			$this->parts_model->add($formdata);

			// 回首頁
			redirect('/Parts');
		}
	}
	// 修改類型
	public function modify($id)
	{
		// 表單驗證
		$this->form_validation->set_message('required','{field}未填');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('p_name', '零件名稱', 'trim|required');
		// 表單判斷
		if($this->form_validation->run() == FALSE) 
		{
			// $data['id'] = $id;
			$data['parts'] = $this->parts_model->query($id);
			// 載入種類及廠商
			$data['tooltype'] = $this->tool_type_model->query();
			//$data['vendor'] = $this->vendor_model->query();
			// 載入 view
			$this->load->view('header');
			$this->load->view('parts_modify',$data);
			$this->load->view('footer');
		}
		else
		{
			// 接收表單
			$formdata['type'] = $this->input->post('type');
			$formdata['p_name'] = $this->input->post('p_name');
			$this->parts_model->modify($id, $formdata);

			// 回首頁
			redirect('/Parts');
		}
	}

	// 刪除公告
	public function delete($id)
	{
		if ($id > 0)
		{
			$this->parts_model->del($id);

			// 回首頁
			redirect('/Parts');
		}
	}
}

