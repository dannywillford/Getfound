<?php

class Site extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->is_logged_in();
    }

    function members_area() {
        if ($this->is_logged_in()) {
            $data['main_content'] = 'members_area';
            $this->load->view('includes/template', $data);
        } else {
            redirect('register/index');
        }
    }

    function edit_profile() {
        if ($this->is_logged_in()) {
            $data['main_content'] = 'edit_profile_form';
            $this->load->view('includes/template', $data);
        } else {
            redirect('register/index');
        }
    }

    function update_user_info() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('facebook', 'facebook.com/', 'trim');
        $this->form_validation->set_rules('linkedin', 'linkedin.com/in/', 'trim');
        $this->form_validation->set_rules('aboutme', 'about.me/', 'trim');
        $this->form_validation->set_rules('twitter', 'twitter.com/', 'trim');

        $this->form_validation->set_rules('password', 'Password', 'trim||min_length[4]|max_length[32]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_profile();
        } else {
            $this->load->model('membership_model');
            if ($query = $this->membership_model->update_user()) {
                $data['main_content'] = 'update_successful';
                $this->load->view('includes/template', $data);
            } else {
                $this->edit_profile();
            }
        }
    }

    function about() {
        $data['main_content'] = 'about_view';
        $this->load->view('includes/template', $data);
    }

    function contact() {
        $data['main_content'] = 'contact_view';
        $this->load->view('includes/template', $data);
    }

    function help() {
        $data['main_content'] = 'help_view';
        $this->load->view('includes/template', $data);
    }

    function ads() {
        $data['main_content'] = 'ads_view';
        $this->load->view('includes/template', $data);
    }

    function tou() {
        $data['main_content'] = 'tou_view';
        $this->load->view('includes/template', $data);
    }

    function privacy() {
        $data['main_content'] = 'privacy_view';
        $this->load->view('includes/template', $data);
    }

    function search() {
        $data['main_content'] = 'search_view';
        $this->load->view('includes/template', $data);
    }

    function email() {

        $data['main_content'] = 'contact_submit';
        $this->load->view('includes/template', $data);
    }

    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');

        if ($is_logged_in) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}