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
		$data['lists'] = $this->repair_list_model->query();
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
	public $inputdate;
	public $inputphone;
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
			// 載入 view
			$this->load->view('header-jquery');
			$this->load->view('lists_add_list');
			$this->load->view('footer');
		}
		else
		{
			// 接收表單
			$formdata['start_date'] = $this->input->post('start_date');
			$formdata['phone'] = $this->input->post('phone');
	
			// 新增至資料庫
			//$this->repair_list_model->query($formdata['phone']);
			$list = $this->repair_list_model->add_r($formdata);
			$list = '/lists/choose_name/' . $list;
			// 回首頁
			redirect($list);
		}
	}
	// 加入訂單 step 2
	public function choose_name($id)
	{


		//$data['lists_date'] = $this->inputdate;
		//$data['lists_phone'] = $this->inputphone;
		$data['lists_id'] = $this->repair_list_model->query($id);
		$data['lists_date'] = $data['lists_id']->start_date;
		$data['lists_phone'] = $data['lists_id']->phone;
		$data['lists_his'] = $this->repair_list_model->query_number($data['lists_phone']);
			$this->load->view('header');
			$this->load->view('lists_choose_name',$data);
			$this->load->view('footer');
		
		redirect('/lists');
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
			$data['lists_id'] = $this->repair_list_model->query($id);
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
}

