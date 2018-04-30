<?php
/**
 * This controller serves the user management pages and tools.
 * @copyright  Copyright (c) 2014-2017 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      0.1.0
 */
// this is owners layout
if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

/**
 * This controller serves the user management pages and tools.
 * The difference with HR Controller is that operations are technical (CRUD, etc.).
 */
class Owner extends CI_Controller {

    /**
     * Default constructor
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function __construct() {
        parent::__construct();
        log_message('debug', 'URI=' . $this->uri->uri_string());
        $this->session->set_userdata('last_page', $this->uri->uri_string());
        if($this->session->loggedIn === TRUE) {
           // Allowed methods
         if ($this->session->isAdmin || $this->session->isSuperAdmin) {
             //User management is reserved to admins and super admins
         } else {
           redirect('errors/privileges');
       }
   } else {
     redirect('connection/login');
 }
 $this->load->model('users_model');
}

    /**
     * Display the list of all users
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function index() {
        $this->load->helper('form');
        $data['users'] = $this->users_model->getUsersAndRoles();
        $data['title'] = 'List of owners';
        $data['activeLink'] = 'owners';
        $data['flashPartialView'] = $this->load->view('templates/flash', $data, TRUE);
        $this->load->view('templates/header', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('owners/index', $data);
        $this->load->view('templates/footer', $data);
    }

    /**
     * Set a user as active (TRUE) or inactive (FALSE)
     * @param int $id User identifier
     * @param bool $active active (TRUE) or inactive (FALSE)
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function active($id, $active) {
        $this->users_model->setActive($id, $active);
        $this->session->set_flashdata('msg', 'The user was successfully modified');
        redirect('users');
    }

    /**
     * Display a for that allows updating a given user
     * @param int $id User identifier
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function edit($id) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Edit a owners';
        $data['activeLink'] = 'owners';

        $this->form_validation->set_rules('firstname', 'Firstname', 'required|strip_tags');
        // $this->form_validation->set_rules('lastname', 'Lastname', 'required|strip_tags');
        // $this->form_validation->set_rules('login', 'Login', 'required|strip_tags');
        // $this->form_validation->set_rules('email', 'Email', 'required|strip_tags');
        // $this->form_validation->set_rules('role[]', 'Role', 'required');

        $data['users_item'] = $this->users_model->getUsers($id);
        if (empty($data['users_item'])) {
            redirect('notfound');
        }

        if ($this->form_validation->run() === FALSE) {
            $data['roles'] = $this->users_model->getRoles();
            $this->load->view('templates/header', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('owners/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->users_model->updateUsers();
            $this->session->set_flashdata('msg', 'The user was successfully modified.');
            if (isset($_GET['source'])) {
                redirect($_GET['source']);
            } else {
                redirect('users');
            }
        }
    }

    /**
     * Delete a user. Log it as an error.
     * @param int $id User identifier
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    // public function delete($id) {
        //Test if user exists
    //     $data['users_item'] = $this->users_model->getUsers($id);
    //     if (empty($data['users_item'])) {
    //         redirect('notfound');
    //     } else {
    //         $this->users_model->deleteUser($id);
    //     }
    //     log_message('error', 'User #' . $id . ' has been deleted by user #' . $this->session->userdata('id'));
    //     $this->session->set_flashdata('msg', 'The user was successfully deleted');
    //     redirect('users');
    // }
}
