<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 * @author	SMTI-RDaludado
 */
class Warehouses extends MY_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->model('warehouse_model');
      	$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
	}
 
	function index()
	{
		$data['warehouses'] = $this->warehouse_model->get_warehouses();
      	$this->load->view('pages/warehouse-view', $data);
	}
 
	/**
	 * Load add warehouse form
	 * 
	 * @author	SMTI-RDaludado
	 * @param
	 * @return
	 */
	function add()
	{
		$this->load->view('forms/warehouse-add');
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
	function edit($warehouse_id)
	{
        $data['warehouse_id'] = $warehouse_id;
        $data['warehouse'] = $this->warehouse_model->get_warehouse($warehouse_id);
        var_dump($this->db->last_query());
        $this->load->view('forms/warehouse-edit', $data);

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

	/**
    * Some description here
    *
    * @param       param
    * @return      return
    */
   public function save()

   {
        $post = $this->input->post();
        $this->form_validation->set_rules('warehouse_name', 'Warehouse name', 'required');
        $this->form_validation->set_rules('short_name', 'Short name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        //
        if ($this->form_validation->run() == FALSE)
        {
         $this->load->view('forms/warehouse-add'); 
        }
        else
        {
          $result = $this->warehouse_model->save_warehouse_data($post);
           echo 'Successfully added new Warehouse<br>';
            echo anchor('warehouses/index', 'View List');
        }
}
// End of file Warehouses.php
// Location: ./application/controller/Warehouses.php