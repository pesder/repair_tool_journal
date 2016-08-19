<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tool_type extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			// 載入列表 model
			$this->load->model('tool_type_model');
        }

	public function index()
	{
		$data['tool_type'] = $this->tool_type_model->query();
		// 載入 view
		$this->load->view('header');
		$this->load->view('tool_type_index',$data);
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
			$this->tool_type_model->add($formdata);

			// 回首頁
			redirect('/lists');
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
			$data['lists_id'] = $this->tool_type_model->query($id);
			// 載入 view
			$this->load->view('header');
			$this->load->view('lists_modify',$data);
			$this->load->view('footer');
		}
		else
		{
			// 接收表單
			$formdata['start_date'] = $this->input->post('start_date');
			$formdata['phone'] = $this->input->post('phone');
			// 修改資料庫
			$this->tool_type_model->modify($id, $formdata);

			// 回首頁
			redirect('/lists');
		}
	}

	// 刪除公告
	public function delete($id)
	{
		if ($id > 0)
		{
			$this->tool_type_model->del($id);

			// 回首頁
			redirect('/lists');
		}
	}
}

