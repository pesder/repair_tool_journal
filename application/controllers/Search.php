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
	public function query_repaired()
	{
		
		$data['choosed'] = '未完修訂單';
		$data['form'] = '/Search/query_repaired';
		$data['lists'] =$this->repair_list_model->queryby('repaired', '0');
		if (empty($this->input->post('checked')))
		{
			// 載入 view
			$this->load->view('header-jquery');
			$this->load->view('search_query_undone', $data);
			$this->load->view('footer');
		}
		else
		{
		$selected = $this->input->post('checked');
		$querydata['repaired'] = '1';
		for ($i = 0; $i < count($selected); $i++) {
			$this->repair_list_model->modify($selected[$i], $querydata);
		}
		redirect('/Search/query_repaired');
		}
	}
	public function query_call()
	{
		
		$data['choosed'] = '已完修未聯絡訂單';
		$data['form'] = '/Search/query_call';
		$data['lists'] =$this->repair_list_model->queryby_and('repaired', '1', 'call_date', '0000-00-00');
		if (empty($this->input->post('checked')))
		{
			// 載入 view
			$this->load->view('header-jquery');
			$this->load->view('search_query_call', $data);
			$this->load->view('footer');
		}
		else
		{
		$selected = $this->input->post('checked');
		$querydata['call_date'] = $this->input->post('call_date');
		for ($i = 0; $i < count($selected); $i++) {
			$this->repair_list_model->modify($selected[$i], $querydata);
		}
		redirect('/Search/query_call');
		}
	}
	public function query_return()
	{
		
		$data['choosed'] = '已完修未取回訂單';
		$data['form'] = '/Search/query_return';
		$data['lists'] =$this->repair_list_model->queryby_and('repaired', '1', 'return_date', '0000-00-00');
		if (empty($this->input->post('checked')))
		{
			// 載入 view
			$this->load->view('header-jquery');
			$this->load->view('search_query_return', $data);
			$this->load->view('footer');
		}
		else
		{
		$selected = $this->input->post('checked');
		$querydata['closed'] = '1';
		$querydata['return_date'] = $this->input->post('return_date');
		for ($i = 0; $i < count($selected); $i++) {
			$this->repair_list_model->modify($selected[$i], $querydata);
		}
		redirect('/Search/query_return');
		}
	}	
	public function query_period()
	{
		$this->load->library('pagination');
		$config['base_url'] = '';
		$config['total_rows'] = 200;
		$config['per_page'] = 25;
		$config['full_tag_open'] = '<nav> <ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';
		$config['next_tag_open'] = '<span aria-hidden="true">';
		$config['next_tag_close'] = '</span>';
		$config['prev_tag_open'] = '<span aria-hidden="true">';
		$config['prev_tag_close'] = '</span>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="disabled"><li class="active"><a href="#"">';
		$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tagl_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tagl_close'] = '</li>';
	}
}