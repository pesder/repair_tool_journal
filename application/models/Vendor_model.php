<?php

class vendor_model extends CI_Model {
	
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
        	$this->db->from('vendor');
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
        //查詢(陣列)
        public function query_array($id = 0) 
        {

                $this->db->select('*');
                $this->db->from('vendor');
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

        //查詢(回傳陣列)
        public function get_array($id = 0) 
        {

                $this->db->select('*');
                $this->db->from('vendor');
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
                        foreach ($query->row_array() as $row) 
                        {
                                $return[$row['id']] = $row['v_name'];
                        }
                        return $return;
                }
                else
                {
                        foreach ($query->result_array() as $row) 
                        {
                                $return[$row['id']] = $row['v_name'];
                        }
                        if (empty($return))
                        {
                                $return = array();
                                $return[''] = "沒有資料";
                                return $return;
                        }
                        else
                        {
                              return $return;  
                        }
                        
                }
        }

        //新增
        public function add($data)
        {
        	$this->db->insert('vendor', $data);
        	// return $this->db->insert_id();
        }

        // 修改
        public function modify($id, $data)
        {
        	$this->db->where('id', $id);
        	$this->db->update('vendor', $data);
        }

        // 刪除
        public function del($id)
        {
        	$this->db->where('id', $id);
        	$this->db->delete('vendor');
        }
}