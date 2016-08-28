<?php

class Repair_list_model extends CI_Model {
	
		public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();

                //連結資料庫
                $this->load->database();
        }

        //查詢
        public function query($id = 0) 
        {

        	$this->db->select('*');
        	$this->db->from('repair_list');
        	if ($id > 0) 
        	{
        		$this->db->where('id', $id);
        	}
        	$this->db->order_by('start_date','desc');
        	//$this->db->where();
        	$query = $this->db->get();
        	$date = $query->result();
        	// 回傳
        	if ($id > 0)
        	{
        		return $query->row();
        	}
        	else
        	{
        		return $query->result();
        	}
        }
        //有限查詢
        public function query_limit($limit) 
        {

            $this->db->select('*');
            $this->db->from('repair_list');
            $this->db->order_by('start_date','desc');
            $this->db->limit($limit);
            $query = $this->db->get();
            return $query->result();
        }
        //依條件查詢
        public function queryby($cd1, $cd2) 
        {

            $this->db->select('*');
            $this->db->from('repair_list');
            $this->db->where($cd1, $cd2);
            $this->db->order_by('start_date','desc');
            //$this->db->where();
            $query = $this->db->get();
            return $query->result();
        }
        //依條件查詢 AND 版
        public function queryby_and($cd1, $cd2, $cd3, $cd4) 
        {

            $this->db->select('*');
            $this->db->from('repair_list');
            $this->db->where($cd1, $cd2);
            $this->db->where($cd3, $cd4);
            $this->db->order_by('start_date','desc');
            //$this->db->where();
            $query = $this->db->get();
            return $query->result();
        }

        //查詢 list
        public function query_bylist($id = 0) 
        {

            $this->db->select('*');
            $this->db->from('repair_list');
            if ($id > 0) 
            {
                $this->db->where('list_id', $id);
            }
            $this->db->order_by('start_date','asc');
            //$this->db->where();
            $query = $this->db->get();
            $date = $query->result();
            // 回傳
            if ($id > 0)
            {
                return $query->row();
            }
            else
            {
                return $query->result();
            }
        }
       //查詢 電話
        public function query_bynumber($phone) 
        {

                $this->db->select('*');
                $this->db->from('repair_list');
                $this->db->where('phone', $phone);
                $this->db->order_by('start_date','desc');
                $query = $this->db->get();
                return $query->result();
        }

        //查詢(陣列)
        public function query_array($id = 0) 
        {

                $this->db->select('*');
                $this->db->from('repair_list');
                if ($id > 0) 
                {
                        $this->db->where('id', $id);
                }
                $this->db->order_by('start_date','desc');
                //$this->db->where();
                $query = $this->db->get();
                
                // 回傳
                if ($id > 0)
                {
                        return $query->row_array();
                }
                else
                {
                        return $query->result_array();
                }
        }
        // 傳回最後一列
            public function get_last()
            {
                return $this->db->insert_id();
            }
        //新增
        public function add($data)
        {
        	$this->db->insert('repair_list', $data);
        	// return $this->db->insert_id();
        }
        //新增 & 回傳
        public function add_r($data)
        {
            $this->db->insert('repair_list', $data);
            return $this->db->insert_id();
        }
        // 修改
        public function modify($id, $data)
        {
        	$this->db->where('id', $id);
        	$this->db->update('repair_list', $data);
        }

        // 刪除
        public function del($id)
        {
        	$this->db->where('id', $id);
        	$this->db->delete('repair_list');
        }
}