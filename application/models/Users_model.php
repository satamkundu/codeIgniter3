<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends CI_Model{
    private $table = 'user';
    public function __construct(){
        parent::__construct();
        $this->load->database();
        date_default_timezone_set(DEFAULT_TIMEZONE);
    }

    public function get_all(){
        $users = $this->db->get($this->table)->result_array();
        return $users;
    }

    public function set_data($name, $email){
        $data = [
            'name' => $name,
            'email' => $email,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $result = $this->db->insert($this->table, $data);
        return $result;
    }
}