<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools_manage extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			// 載入列表 model
			$this->load->model('tools_model');
			$this->load->model('company_model');
			$this->load->model('parts_model');
			$this->load->model('vendor_model');
        }

	public function index()
	{

		// 載入 view
		$this->load->view('header');
		$this->load->view('tools_manage_index');
		$this->load->view('footer');
	}

	public function manage_tool_type()
	{
		$data['tooltype'] = $this->tool_type_model->query();
		$this->load->view('header');
		$this->load->view('tools_manage_manage_tool_type', $data);
		$this->load->view('footer');
	}

	public function add_tool_type()
	{
		$this->load->view('header');
		$this->load->view('tools_manage_add_tool_type');
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
			$this->load->view('Tools_manage_add');
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
			redirect('/Tools_manage');
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
		// 表單判斷
		if($this->form_validation->run() == FALSE) 
		{
			// $data['id'] = $id;
			$data['Tools_manage_id'] = $this->repair_list_model->query($id);
			// 載入 view
			$this->load->view('header');
			$this->load->view('Tools_manage_modify',$data);
			$this->load->view('footer');
		}
		else
		{
			// 接收表單
			$formdata['start_date'] = $this->input->post('start_date');
			$formdata['phone'] = $this->input->post('phone');
			// 修改資料庫
			$this->repair_list_model->modify($id, $formdata);

			// 回首頁
			redirect('/Tools_manage');
		}
	}

	// 刪除公告
	public function delete($id)
	{
		if ($id > 0)
		{
			$this->repair_list_model->del($id);

			// 回首頁
			redirect('/Tools_manage');
		}
	}
}

