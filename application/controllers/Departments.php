<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 * @author	SMTI-CKSagun
 */
class Departments extends MY_Controller {
 
    /**
     * Some description here
     * 
     * @author	SMTI-CKSagun
     * @param
     * @return
     */
    function __construct()
    {
        parent::__construct();

        $this->load->model('department_model');
    }
 
    /**
     * Some description here
     * 
     * @author	SMTI-CKSagun
     * @param
     * @return
     */
    function index()
    {
        $departments = $this->department_model->get_many_by(['active_status' => 1]);

        $this->data = array(
            'page_header' => 'Department Management',
            'departments' => $departments
        );
        $this->load_view('pages/department-list');
    }
 
    /**
     * Some description here
     * 
     * @author	SMTI-CKSagun
     * @param
     * @return
     */
    function list_department()
    {
        // code here...
    }
 
    /**
     * Some description here
     * 
     * @author	SMTI-CKSagun
     * @param
     * @return
     */
    function details_department()
    {
        $object_id = $this->uri->segment(3);
        // code here...
    }
 
    /**
     * Some description here
     * 
     * @author	SMTI-CKSagun
     * @param
     * @return
     */
    function add_department()
    {
        $this->load->model('site_model');
        $sites = $this->site_model->get_many_by(array('active_status' => 1));
        
        $this->data = array(
            'page_header' => 'Add New Department',
            'sites' => $sites
        );

        $this->load_view('forms/department-add');
    }
 
    /**
     * Some description here
     * 
     * @author	SMTI-CKSagun
     * @param
     * @return
     */
    function confirmation()
    {
        $url         = $this->uri->segment(3);
        $primary_id  = $this->uri->segment(4);

        $mode = explode('_', $url);
        
        $department = $this->department_model->get($primary_id);
        
        $type = 'Department named <strong>' . $department['name'] . '</strong>';
		$modal_message = sprintf(lang('confirmation_message'), $mode[0], $type);

		$data = array(
			'url' 			=> 'departments/' . $url . '/' . $primary_id,
			'modal_title' 	=> ucfirst($mode[0]),
			'modal_message' => $modal_message,
			'mode'			=> $mode[0]
		);

		$this->load->view('modals/modal-confirmation', $data);
            
    }
 
    /**
     * Some description here
     * 
     * @author	SMTI-CKSagun
     * @param
     * @return
     */
    function edit_department()
    {
        $primary_id = $this->uri->segment(3);

        // parameters or variables
        $this->data = array(
            'page_header' => 'Edit Department'
        );

        // page template
        $this->load_view('forms/department-edit');
    }
 
    /**
     * Some description here
     * 
     * @author	SMTI-CKSagun
     * @param
     * @return
     */
    function activate_department()
    {
        $object_id = $this->uri->segment(3);
        // code here...
    }
 
    /**
     * Some description here
     * 
     * @author	SMTI-CKSagun
     * @param
     * @return
     */
    function deactivate_department()
    {
        $object_id = $this->uri->segment(3);
        // code here...
    }

    function save_data()
    {
        $posted_data = $this->input->post();
        $mode = $posted_data['mode'];
        unset($posted_data['mode']);

        if ($mode === 'add') {

            $last_id = $this->department_model->insert($posted_data);

            if ($last_id) {
                $this->session->set_flashdata('success', lang('add_department_success'));
                redirect('departments');
            } else {
                $this->session->set_flashdata('error', lang('add_department_error'));
                redirect('departments');
            }
        }

        if ($mode === 'edit') {
            dump('updating record...');
        }

    }

}
// End of file Departments.php
// Location: ./application/controller/Departments.php