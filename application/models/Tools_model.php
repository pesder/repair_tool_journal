<?php

class tools_model extends CI_Model {
	
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
        	$this->db->from('tools');
        	if ($id > 0) 
        	{
        		$this->db->where('id', $id);
        	}
        	$this->db->order_by('id','desc');
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
        //查詢某類工具
        public function query_bytype($typeid, $sort_type, $sort_order) 
        {

            $this->db->select('*');
            $this->db->from('tools');
            $this->db->where('type', $typeid);
            $this->db->order_by('vendor', 'asc');
            $this->db->order_by($sort_type,$sort_order);
            //$this->db->where();
            $query = $this->db->get();
            return $query->result();
        }
        //查詢(陣列)
        public function query_array($id = 0) 
        {

                $this->db->select('*');
                $this->db->from('tools');
                if ($id > 0) 
                {
                        $this->db->where('id', $id);
                }
                $this->db->order_by('id','desc');
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
        
        //新增
        public function add($data)
        {
        	$this->db->insert('tools', $data);
        	// return $this->db->insert_id();
        }

        //新增 & 回傳
        public function add_r($data)
        {
            $this->db->insert('tools', $data);
            return $this->db->insert_id();
        }


        // 修改
        public function modify($id, $data)
        {
        	$this->db->where('id', $id);
        	$this->db->update('tools', $data);
        }

        // 刪除
        public function del($id)
        {
        	$this->db->where('id', $id);
        	$this->db->delete('tools');
        }
}