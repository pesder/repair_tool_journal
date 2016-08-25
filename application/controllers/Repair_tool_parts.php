<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repair_tool_parts extends CI_Controller {

	
	
	public function __construct()
		{
			parent::__construct();
			// 載入列表 model
			$this->load->model('repair_tools_model');
			$this->load->model('tool_type_model');
			$this->load->model('vendor_model');
			$this->load->model('tools_model');
			$this->load->model('parts_model');
			$this->load->model('repair_tool_parts_model')

        }

	public function index()
	{
		
	}

	// 新增工具
	public function add_part($workid, $lists_id, $tooltype_id)
	{
		// 載入種類及廠商
		$data['tooltype'] = $this->tool_type_model->query($tooltype_id);
		$data['tool_list'] = $this->tools_model->query_bytype($tooltype_id);
		$data['part_list'] = $this->parts_model->query_bytype($tooltype_id);
		$data['repair_list'] = $this->repair_tools_model->query($lists_id);
		$data['lists_id'] = $lists_id;
		$data['type_id'] = $tooltype_id;

		// 表單驗證
		$this->form_validation->set_message('required','{field}未填');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('price', '價格', 'trim|required');
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
			$formdata['list_id'] = $lists_id;
			//$formdata['tool_type'] = $tooltype_id;
			$formdata['tool_number'] = $this->input->post('tool_number');
			$formdata['type_id'] = $tooltype_id;
			if(empty($this->input->post('tool_id')))
			{
				$tooladd['type'] = $tooltype_id;
				$tooladd['tool_name'] = $this->input->post('tool_name_new');
				
				$newid = $this->tools_model->add_r($tooladd);
				$formdata['tool_id'] = $newid;
			}
			else
			{
				$formdata['tool_id'] = $this->input->post('tool_id');

			}
			
			// 新增至資料庫
			$this->repair_tools_model->add($formdata);

			// 回首頁
			$home = '/Lists/modify/' . $lists_id;
			redirect($home);
		}
	}
	// 修改類型
	public function modify($work_id, $lists_id, $tooltype_id)
	{
		// 載入種類及廠商
		$data['tooltype'] = $this->tool_type_model->query($tooltype_id);
		$data['vendor'] = $this->vendor_model->query();
		$data['tool_list'] = $this->tools_model->query_bytype($tooltype_id);
		
		// $data['tooltype_list'] = $this->tool_type_model->get_array();
		// $data['vendor_list'] = $this->vendor_model->get_array();
		$data['workid'] = $work_id;
		$data['lists_id'] = $lists_id;
		$data['type_id'] = $tooltype_id;
		$data['repair_list'] = $this->repair_tools_model->query($lists_id);

		// 表單驗證
		$this->form_validation->set_message('required','{field}未填');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('tool_number', '工具數量', 'trim|required');
		// 表單判斷
		if($this->form_validation->run() == FALSE) 
		{
			// 載入 view
			$this->load->view('header');
			$this->load->view('repair_tools_modify',$data);
			$this->load->view('footer');
		}
		else
		{
		/*	// 接收表單
			$formdata['type'] = $this->input->post('type');
			$formdata['tool_name'] = $this->input->post('tool_name');
			$formdata['vendor'] = $this->input->post('vendor');
			*/
			// 接收表單
			//$formdata['list_id'] = $lists_id;
			//$formdata['tool_type'] = $tooltype_id;
			$formdata['tool_number'] = $this->input->post('tool_number');
			$formdata['type_id'] = $tooltype_id;
			if(empty($this->input->post('tool_id')))
			{
				$tooladd['type'] = $tooltype_id;
				$tooladd['tool_name'] = $this->input->post('tool_name_new');
				$tooladd['vendor'] = $this->input->post('vendor');
				$newid = $this->tools_model->add_r($tooladd);
				$formdata['tool_id'] = $newid;
			}
			else
			{
				$formdata['tool_id'] = $this->input->post('tool_id');

			}
			$this->repair_tools_model->modify($lists_id, $formdata);

			// 回首頁
			$home = '/Lists/modify/' . $work_id;
			redirect($home);
		}
	}

	// 刪除公告
	public function delete($work_id, $id)
	{
		if ($id > 0)
		{
			$this->repair_tools_model->del($id);

			// 回首頁
			$home = '/Lists/modify/' . $work_id;
			redirect($home);
		}
	}
}

