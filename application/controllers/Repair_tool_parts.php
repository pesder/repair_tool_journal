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
			$this->load->model('repair_tool_parts_model');

        }

	public function index()
	{
		
	}

	// 新增工具
	public function add_part($workid, $lists_id, $tooltype_id)
	{
		// 載入種類及廠商
		$data['tooltype'] = $this->tool_type_model->query($tooltype_id);
		$data['tool_list'] = $this->tools_model->query_bytype($tooltype_id, 'tool_name', 'asc');
		$data['part_list'] = $this->parts_model->query_bytype($tooltype_id, 'p_name','asc');
		$data['repair_list'] = $this->repair_tools_model->query($lists_id);
		$data['lists_id'] = $lists_id;
		$data['type_id'] = $tooltype_id;
		$data['work_list'] = $workid;

		// 表單驗證
		$this->form_validation->set_message('required','{field}未填');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('price', '價格', 'trim|required');
		// 表單判斷
		if($this->form_validation->run() == FALSE) 
		{
		$this->load->view('header');
		$this->load->view('repair_tool_parts_add_part', $data);
		$this->load->view('footer');
		}
		else
		{
			// 接收表單
			$formdata['list_id'] = $workid;
			//$formdata['tool_type'] = $tooltype_id;
			$formdata['price'] = $this->input->post('price');
			$formdata['type_id'] = $tooltype_id;
			$formdata['repair_tools_id'] = $lists_id;
			if(empty($this->input->post('part_name_new')))
			{
				$formdata['parts_id'] = $this->input->post('parts_id');

			}
			else
			{
				$partadd['type'] = $tooltype_id;
				$partadd['p_name'] = $this->input->post('part_name_new');
				
				$newid = $this->parts_model->add_r($partadd);
				$formdata['parts_id'] = $newid;

			}
			
			// 新增至資料庫
			$this->repair_tool_parts_model->add($formdata);

			// 回首頁
			$home = '/Lists/modify/' . $workid;
			redirect($home);
		}
	}
	// 修改類型
	public function modify($work_id, $lists_id, $tooltype_id)
	{
		// 載入種類及廠商
		$data['tooltype'] = $this->tool_type_model->query($tooltype_id);
		$data['tool_list'] = $this->tools_model->query_bytype($tooltype_id, 'tool_name', 'asc');
		$data['part_list'] = $this->parts_model->query_bytype($tooltype_id, 'p_name','asc');
		$data['workid'] = $work_id;
		$data['lists_id'] = $lists_id;
		$data['type_id'] = $tooltype_id;
		$data['repair_list'] = $this->repair_tool_parts_model->query($lists_id);

		// 表單驗證
		$this->form_validation->set_message('required','{field}未填');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('price', '價格', 'trim|required');
		// 表單判斷
		if($this->form_validation->run() == FALSE) 
		{
			// 載入 view
			$this->load->view('header');
			$this->load->view('repair_tool_parts_modify',$data);
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
			$formdata['list_id'] = $work_id;
			$formdata['price'] = $this->input->post('price');
			$formdata['type_id'] = $tooltype_id;
			//$formdata['repair_tools_id'] = $this->input->post('repair_tools_id');
			if(empty($this->input->post('part_name_new')))
			{
				$formdata['parts_id'] = $this->input->post('parts_id');
				
			}
			else
			{
				$partadd['type'] = $tooltype_id;
				$partadd['p_name'] = $this->input->post('part_name_new');
				
				$newid = $this->parts_model->add_r($partadd);
				$formdata['parts_id'] = $newid;

			}
			$this->repair_tool_parts_model->modify($lists_id, $formdata);

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
			$this->repair_tool_parts_model->del($id);

			// 回首頁
			$home = '/Lists/modify/' . $work_id;
			redirect($home);
		}
	}
}

