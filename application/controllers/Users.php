<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 * @author	SMTI-RDaludado
 */
class Users extends MY_Controller {
 
    /**
     * Some description here
     * 
     * @author	SMTI-RDaludado
     * @param
     * @return
     */
    function __construct()
    {
        parent::__construct();
    }
 
    /**
     * Some description here
     * 
     * @author	SMTI-RDaludado
     * @param
     * @return
     */
    function index()
    {
        $this->session->set_flashdata("try_again", lang("try_again_message"));
        
        $this->data = array(
            'page_header' => 'User Management',
            'notification' => array("sound"=>false),
        );
        $this->load_view("pages/user-list");
    }
 
    /**
     * Some description here
     * 
     * @author	SMTI-RDaludado
     * @param
     * @return
     */
    function list()
    {
        // code here...
    }
 
    /**
     * Some description here
     * 
     * @author	SMTI-RDaludado
     * @param
     * @return
     */
    function details()
    {
        $object_id = $this->uri->segment(3);
        // code here...
    }
 
    /**
     * Some description here
     * 
     * @author	SMTI-RDaludado
     * @param
     * @return
     */
    function add()
    {
        // code here...
    }
 
    /**
     * Some description here
     * 
     * @author	SMTI-RDaludado
     * @param
     * @return
     */
    function confirmation()
    {
        $object_id = $this->uri->segment(3);
        // code here...
    }
 
    /**
     * Some description here
     * 
     * @author	SMTI-RDaludado
     * @param
     * @return
     */
    function edit()
    {
        $object_id = $this->uri->segment(3);
        // code here...
    }
 
    /**
     * Some description here
     * 
     * @author	SMTI-RDaludado
     * @param
     * @return
     */
    function activate()
    {
        $object_id = $this->uri->segment(3);
        // code here...
    }
 
    /**
     * Some description here
     * 
     * @author	SMTI-RDaludado
     * @param
     * @return
     */
    function deactivate()
    {
        $object_id = $this->uri->segment(3);
        // code here...
    }
}
// End of file Users.php
// Location: ./application/controller/<Users class="php"></Users>