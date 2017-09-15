<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 * @author	SMTI-CKSagun
 */
class Employees extends MY_Controller {
 
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
        // code here...
        echo 'employee management page';
    }
 
    /**
     * Some description here
     * 
     * @author	SMTI-CKSagun
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
     * @author	SMTI-CKSagun
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
     * @author	SMTI-CKSagun
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
     * @author	SMTI-CKSagun
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
     * @author	SMTI-CKSagun
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
     * @author	SMTI-CKSagun
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
     * @author	SMTI-CKSagun
     * @param
     * @return
     */
    function deactivate()
    {
        $object_id = $this->uri->segment(3);
        // code here...
    }
}
// End of file Employees.php
// Location: ./application/controller/Employees.php