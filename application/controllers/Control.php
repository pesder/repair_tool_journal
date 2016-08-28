<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
        }

	public function index()
	{
		// 載入 view
		$this->load->view('header');
		$this->load->view('control_index');
		$this->load->view('footer');
	}
}