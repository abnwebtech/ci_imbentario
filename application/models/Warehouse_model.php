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
    protected $before_create = ['generate_date_created_status'];
    protected $after_get     = ['set_default_data'];
    protected $after_create  = ['write_audit_trail'];
    protected $after_update  = ['write_audit_trail'];

    protected function generate_date_created_status($warehouse)
    {
        $warehouse['active_status'] = 1;
        $warehouse['created_by']    = 0;
        $warehouse['created']       = date('Y-m-d H:i:s');
        return $warehouse;
    }

    protected function set_default_data($warehouse)
    {
        $warehouse['active_status']  = ($warehouse['active_status'] == 1) ? 'Active' : 'Inactive';
        $warehouse['status_label']   = ($warehouse['active_status'] == 'Active') ? 'De-activate' : 'Activate';
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