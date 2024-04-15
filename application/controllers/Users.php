<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Users extends CI_Controller {

        public function __construct(){
            parent::__construct();

            // $this->load->library('form_validation');
            $this->load->library('session');
            
            $this->load->model('users_model', 'users');
        }

        public function index(){            
           
            $allUsers = $this->users->get_all();

            $data = [
                'users' => $allUsers
            ];

            $this->load->view('template/header', ['title'=>'All Users']);
            $this->load->view('users', $data);
        }

        public function load_add_users_view(){
            $this->load->view('template/header', ['title'=>'Add Users']);
            $this->load->view('add-users');
        }

        public function set_user_data(){
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');

            if( !$this->form_validation->run() ){
                $this->session->set_flashdata('error', validation_errors());
                redirect('user/add');
                // $this->load_add_users_view();
            }else{
                $name = $this->input->post('name');
                $email = $this->input->post('email');

                $isInserted = $this->users->set_data($name, $email);
                if($isInserted){
                    $this->session->set_flashdata('success', 'Successfully submitted data...');
                    redirect('user');
                 }else{
                    $this->session->set_flashdata('error', 'Something went wrong');
                    redirect('user/add');
                 }
            }
        }

        public function testing($var){
            log_message('error', 'This is an error');
            echo $var;
        }

        public function load_view_file_uploading(){
            $this->load->view('template/header', ['title' => 'File Uploding']);
            $this->load->view('file-u');
        }

        public function do_upload(){
            $path = './assets/uploads';

            if(!file_exists($path)){
                mkdir($path);
            }
            
            $config['upload_path']   = $path; 
            $config['allowed_types'] = 'jpg|png'; 
            $config['max_size']      = 1024; 
            $config['max_width']     = 1024; 
            $config['max_height']    = 768;  

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('userimage')){
                print_r($this->upload->display_errors());
            }else{
                $fileName = $_FILES['userimage']['name'];
                print_r($this->upload->data());
            }
        }
    }