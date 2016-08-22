<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			// 載入列表 model
			$this->load->model('vendor_model');
        }

	public function index()
	{
		$data['vendor'] = $this->vendor_model->query();
		// 載入 view
		$this->load->view('header');
		$this->load->view('vendor_index',$data);
		$this->load->view('footer');
	}

	// 新增類型
	public function add()
	{
		// 表單驗證
		$this->form_validation->set_message('required','{field}未填');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('v_name', '廠牌名稱', 'trim|required');
		// 表單判斷
		if($this->form_validation->run() == FALSE) 
		{
		$this->load->view('header');
		$this->load->view('vendor_add');
		$this->load->view('footer');
		}
		else
		{
			// 接收表單
			$formdata['v_name'] = $this->input->post('v_name');
			// 新增至資料庫
			$this->vendor_model->add($formdata);

			// 回首頁
			redirect('/Vendor');
		}
	}
	// 修改類型
	public function modify($id)
	{
		// 表單驗證
		$this->form_validation->set_message('required','{field}未填');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('v_name', '類別名稱', 'trim|required');
		// 表單判斷
		if($this->form_validation->run() == FALSE) 
		{
			// $data['id'] = $id;
			$data['vendor'] = $this->vendor_model->query($id);
			// 載入 view
			$this->load->view('header');
			$this->load->view('vendor_modify',$data);
			$this->load->view('footer');
		}
		else
		{
			// 接收表單
			$formdata['v_name'] = $this->input->post('v_name');
			$this->vendor_model->modify($id, $formdata);

			// 回首頁
			redirect('/Vendor');
		}
	}

	// 刪除公告
	public function delete($id)
	{
		if ($id > 0)
		{
			$this->vendor_model->del($id);

			// 回首頁
			redirect('/Vendor');
		}
	}
}

