<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 * @package	package
 * @category	category
 * @author	SMTI-CKSagun
 */
class Department_model extends MY_Model {
 
    /**
     * Some description here
     * 
     * @author	SMTI-CKSagun
     */
    protected $_table = 'departments';
 
    /**
     * Some description here
     * 
     * @author	SMTI-CKSagun
     */
    protected $primary_key = 'id';
 
    /**
     * Some description here
     * 
     * @author	SMTI-CKSagun
     */
    protected $return_type = 'array';

    /**
     * Some description here
     * 
     * @author	SMTI-CKSagun
     */
    protected $before_create = array('before_create_prepare_data');

    /**
     * Some description here
     * 
     * @author	SMTI-CKSagun
     */
    protected $after_get = array('prepare_data', 'prepare_data2');

    /**
     * Some description here
     * 
     * @author	SMTI-CKSagun
     */
    protected function before_create_prepare_data($department)
    {
        if ( ! isset($department)) return FALSE;
        
        $department['created']    = date('Y-m-d H:i:s');
        $department['created_by'] = $this->ion_auth->user()->row()->id;
        
        return $department;
    }

    /**
     * Some description here
     * 
     * @author	SMTI-CKSagun
     */
    protected function prepare_data($department)
    {
        if ( ! isset($department)) return FALSE;
        
        // transform active_status into textual
        $status = ($department['active_status'] == 1) ? 'Active' : 'Inactive';
        $label  = ($department['active_status'] == 1) ? 'success' : 'danger';
        $department['active_status_label'] = '<span class="label label-'.$label.'">'. $status .'</span>';

        return $department;
    }

    /**
     * Some description here
     * 
     * @author	SMTI-CKSagun
     */
    protected function prepare_data2($department)
    {
        if ( ! isset($department)) return FALSE;
        
        $department['date_created'] = date('F j, Y', strtotime($department['created']));

        return $department;
    }
}
// End of file Department_model.php
// Location: ./application/model/Department_model.php