<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			// 載入列表 model
			$this->load->model('repair_list_model');
        }

	public function index()
	{
		// $data['lists'] = $this->repair_list_model->query();
		// 載入 view
		$this->load->view('header');
		$this->load->view('search_index');
		$this->load->view('footer');
	}

	// 列出某天的維修單
	public function list_someday()
	{
		if(empty($this->input->post('start_date')))
		{
			$this->load->view('header-jquery');
			$this->load->view('search_list_someday_choose');
			$this->load->view('footer');
		}
		else
		{
			$td =$this->input->post('start_date');
			$data['choosed'] = '日期：' . $td;
			$data['lists'] = $this->repair_list_model->queryby('start_date', $td);
			// 載入 view
			$this->load->view('header');
			$this->load->view('search_list_someday', $data);
			$this->load->view('footer');
		}

	}

	public function query_number()
	{
		if(empty($this->input->post('phone')))
		{
			$this->load->view('header-jquery');
			$this->load->view('search_query_number_choose');
			$this->load->view('footer');
		}
		else
		{
			$td =$this->input->post('phone');
			$data['choosed'] = '查詢號碼：' . $td;
			$data['lists'] = $this->repair_list_model->queryby('phone', $td);
			// 載入 view
			$this->load->view('header');
			$this->load->view('search_list_someday', $data);
			$this->load->view('footer');
		}
	}
}