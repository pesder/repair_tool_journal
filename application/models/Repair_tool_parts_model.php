<?php

class repair_tool_parts_model extends CI_Model {
	
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
        	$this->db->from('repair_tool_parts');
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
        //查詢 list
        public function query_bylist($list) 
        {

            $this->db->select('*');
            $this->db->from('repair_tool_parts');
            $this->db->where('list_id', $list);
            $this->db->order_by('id','asc');
            //$this->db->where();
            $query = $this->db->get();
            return $query->result();
        }
        //查詢(陣列)
        public function query_array($id = 0) 
        {

                $this->db->select('*');
                $this->db->from('repair_tool_parts');
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
        	$this->db->insert('repair_tool_parts', $data);
        	// return $this->db->insert_id();
        }

        // 修改
        public function modify($id, $data)
        {
        	$this->db->where('id', $id);
        	$this->db->update('repair_tool_parts', $data);
        }

        // 刪除
        public function del($id)
        {
        	$this->db->where('id', $id);
        	$this->db->delete('repair_tool_parts');
        }
}