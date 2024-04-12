<?php


class Task_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_task_by_id($id = 0)
    {
        if ($id > 0) {
            $this->db->select('T.*')->from('tbl_tasks AS T');
            $this->db->where(array('T.id' => $id));
            $this->db->where(array('T.ai_status' => 1));
            $query = $this->db->order_by('T.id', 'DESC')->get();
            return $query->row_array();
        } else {
            return [];
        }

    } // get_task_by_id

}