<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_Model extends CI_Model
{

    public function get_all_tasks($status = '')
    {
        $this->db->select('T.*, U.name As assigned_to_name')->from('tbl_tasks AS T')->join('tbl_eq_users AS U', 'U.id = T.assigned_to', 'left');

        $this->db->where(array('T.ai_status' => 1));
        if ($status != '') {
            $this->db->where(array('T.status' => $status));
        }
        $query = $this->db->order_by('T.id', 'DESC')->get();
        return $query->result_array();
    } // get_all_tasks

    public function create_task($data)
    {
        $this->db->insert('tbl_tasks', $data);
        return $this->db->insert_id();
    } // create_task

    public function update_task($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_tasks', $data);
        return $this->db->affected_rows();
    } // update_task

    public function delete_task($id)
    {
        $data = array('ai_status' => -1);
        $this->db->where('id', $id);
        $this->db->update('tbl_tasks', $data);
        return $this->db->affected_rows();
    } // delete_task

    public function get_all_users()
    {
        $this->db->select('U.id, U.name')->from('tbl_eq_users AS U');
        $this->db->where(array('U.id > ' => 1)); // Exclude Admin
        $this->db->where(array('U.status' => 1));
        $query = $this->db->order_by('U.name', 'ASC')->get();
        return $query->result_array();
    } // get_all_users
}