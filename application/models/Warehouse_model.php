<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here...
 *
 * @package     IMBENTARIO
 * @subpackage  subpackage
 * @category    category
 * @author      SMTI-RDaludado
 * @link        http://systemantech.com
 */
class Warehouse_model extends MY_Model {

    protected $_table      = 'warehouses';
    protected $primary_key = 'id';
    protected $return_type = 'array';

    /**
     * Callbacks or Observers
     */
    protected $before_create = ['set_data_before_create'];
    protected $before_update = ['set_data_before_update'];
    protected $after_get     = ['set_default_data'];
    protected $after_create  = ['write_audit_trail'];
    protected $after_update  = ['write_audit_trail'];

    protected function set_data_before_create($warehouse)
    {
        if ( ! isset($warehouse)) return FALSE;

        $warehouse['active_status'] = 1;
        $warehouse['created_by']    = $this->ion_auth->user()->row()->id;
        $warehouse['created']       = date('Y-m-d H:i:s');
        return $warehouse;
    }

    protected function set_data_before_update($warehouse)
    {
        $warehouse['modified_by'] = $this->ion_auth->user()->row()->id;
        $warehouse['modified']    = date('Y-m-d H:i:s');
        return $warehouse;
    }

    protected function set_default_data($warehouse)
    {
        //$warehouse['active_status']  = ($warehouse['active_status'] == 1) ? 'Active' : 'Inactive';
        $warehouse['status_label']   = ($warehouse['active_status'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
        $warehouse['status_url'] 	 = ($warehouse['active_status'] == 1) ? 'deactivate' : 'activate';
        $warehouse['status_action']  = ($warehouse['active_status'] == 1) ? 'Deactivate' : 'Activate';
		$warehouse['status_icon']    = ($warehouse['active_status'] == 1) ? 'fa-times text-red' : 'fa-check text-green';
        return $warehouse;
    }

    public function get_warehouse_by($param)
    {
        $query = $this->db;
        $query->select('*');
        return $this->get_by($param);
    }

    public function get_many_warehouse_by($param)
    {
        $query = $this->db;
        $query->select('*');
        return $this->get_many_by($param);
    }

    public function get_warehouses()
    {
        $query = $this->db;
        $query->select('*');
        return $this->get_all();
    }
}