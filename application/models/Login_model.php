<?php
class Login_model extends CI_Model
{
    public function can_login_admin($email, $password)
    {
        $email = trim(addslashes(strip_tags($email)));
        $this->db->where('email_id', $email);
        $this->db->where('password', md5($password));
        $this->db->where('status', 1);

        $query = $this->db->get('tbl_eq_users');
        if ($query->num_rows() > 0) {
            $res = $query->row_array();
        } else {
            $res = [];
        }

        $query->free_result();
        return $res;
    } //can_login_admin


    public function get_admin_details()
    {
        $query = $this->db->select('admin_email_name, admin_email_noreply, email_logo, secondary_email, admin_cms_url')->from('tbl_eq_users')->where(array('status' => 1))->get();
        return $query->row_array();
    }



    public function who_is_user($email)
    {
        $email = trim(addslashes(strip_tags($email)));

        // Check for Admin
        $this->db->where('email', $email);
        $this->db->where('status', 1);

        $query = $this->db->get('tbl_eq_users');
        if ($query->num_rows() > 0) {
            return 'ADMIN';
        } else {

            // Check for Distributor

            $this->db->where('email_id', $email);
            $this->db->where('status', 1);

            $query = $this->db->get('tbl_distributor');
            if ($query->num_rows() > 0) {
                return 'DISTRIBUTOR';
            } else {
                return '';
            }
        }

        $query->free_result();
        return $res;
    } //who_is_user







}
