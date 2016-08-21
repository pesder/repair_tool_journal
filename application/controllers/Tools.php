<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {

	// 用於查詢 tool_type 資料表的陣列
	private $tooltype = new array();
	public function __construct()
		{
			parent::__construct();
			// 載入列表 model
			$this->load->model('tools_model');
			// 載入 tool_type 內容並存入陣列
			$this->load->model('tool_type_model');
			$this->tooltype = $this->tool_type_model->query();
        }

	public function index()
	{
		$data['Tools'] = $this->tools_model->query();
		// 載入 view
		$this->load->view('header');
		if(empty($this->tooltype))
		{
			$this->load->view('tools_index_notype');
		}
		$this->load->view('Tools_index',$data);
		$this->load->view('footer');
	}

	// 新增類型
	public function add()
		// 表單驗證
		$this->form_validation->set_message('required','{field}未填');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('type_name', '類別名稱', 'trim|required');
		// 表單判斷
		if($this->form_validation->run() == FALSE) 
		{
		$this->load->view('header');
		$this->load->view('Tools_add');
		$this->load->view('footer');
		}
		else
		{
			// 接收表單
			$formdata['type_name'] = $this->input->post('type_name');
			// 新增至資料庫
			$this->tools_model->add($formdata);

			// 回首頁
			redirect('/Tools');
		}
	}
	// 修改類型
	public function modify($id)
	{
		// 表單驗證
		$this->form_validation->set_message('required','{field}未填');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('type_name', '類別名稱', 'trim|required');
		// 表單判斷
		if($this->form_validation->run() == FALSE) 
		{
			// $data['id'] = $id;
			$data['Tools'] = $this->tools_model->query($id);
			// 載入 view
			$this->load->view('header');
			$this->load->view('Tools_modify',$data);
			$this->load->view('footer');
		}
		else
		{
			// 接收表單
			$formdata['type_name'] = $this->input->post('type_name');
			$this->tools_model->modify($id, $formdata);

			// 回首頁
			redirect('/Tools');
		}
	}

	// 刪除公告
	public function delete($id)
	{
		if ($id > 0)
		{
			$this->tools_model->del($id);

			// 回首頁
			redirect('/Tools');
		}
	}
}

