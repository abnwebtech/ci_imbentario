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
		
		$this->load->model('bented_model');
      	$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
	}
 
	function index()
	{
		$warehouses = $this->warehouse_model->get_warehouses();
		$positions = $this->bented_model->get_by(array('id'=>1));

		$this->data = array(
            'page_header' 	=> 'Warehouse Management',
            'notification' 	=> array("sound"=>false),
			'warehouses' 	=> $warehouses, 
			'positions'		=> $positions
        );
      	$this->load_view('pages/warehouse-view');
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
		$this->load->model('site_model');
        $sites = $this->site_model->get_many_by(array('active_status' => 1));
		
		$this->data = array(
            'page_header' 	=> 'Add New Warehouse',
            'notification' 	=> array("sound"=>false),
			'sites' => $sites
        );
		$this->load_view('forms/warehouse-add');
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
        $url         = $this->uri->segment(3);
        $id 		 = $this->uri->segment(4);

        $mode = explode('_', $url);

		// dump($mode);exit;
        
        $warehouse = $this->warehouse_model->get($id);
        
        $type = 'Warehouse named <strong>' . $warehouse['name'] . '</strong>';
		$modal_message = sprintf(lang('confirmation_message'), $mode[0], $type);

		$data = array(
			'url' 			=> 'warehouses/' . $url . '/' . $id,
			'modal_title' 	=> ucfirst($mode[0]),
			'modal_message' => $modal_message,
			'mode'			=> $mode[0]
		);
		$this->load->view('modals/modal-confirmation', $data);            
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
		$primary_id = $this->uri->segment(3);
        $warehouse = $this->warehouse_model->get_by(array('id'=>$warehouse_id));
        
		$this->data = array(
            'page_header' 	=> 'Warehouse Edit',
            'notification' 	=> array("sound"=>false),
			'warehouse' 	=> $warehouse, 
			'id'			=> $warehouse_id
        );

        $this->load_view('forms/warehouse-edit');

	}
 
	/**
	 * Some description here
	 * 
	 * @author	SMTI-RDaludado
	 * @param
	 * @return
	 */
	function activate($warehouse_id)
	{
		$object_id = $this->uri->segment(3);
		$warehouse    = $this->warehouse_model->get_many_warehouse_by(['id' => $warehouse_id]);
		$update    = $this->warehouse_model->update($warehouse_id, ['active_status' => 1]);

		if ($update) {
			$this->session->set_flashdata('success', 'Successfully Activated warehouse ' . $warehouse['name']);
			redirect('warehouses');
		} else {
			$this->session->set_flashdata('failed', 'Unable to Activate warehouse ' . $warehouse['name']);
			redirect('warehouses');
		}
	}
 
	/**
	 * Some description here
	 * 
	 * @author	SMTI-RDaludado
	 * @param
	 * @return
	 */
	function deactivate($warehouse_id)
	{
		$object_id = $this->uri->segment(3);
		$warehouse    	= $this->warehouse_model->get_many_warehouse_by(['id' => $warehouse_id]);
		$update    		= $this->warehouse_model->update($warehouse_id, ['active_status' => 0]);

		if ($update) {
			$this->session->set_flashdata('success', $warehouse['name'] . 'successfully Deactivated warehouse ');
			redirect('warehouses');
		} else {
			$this->session->set_flashdata('failed', 'Unable to Deactivate warehouse ' . $warehouse['name']);
			redirect('warehouses');
		}
	}

	/**
    * Some description here
    *
    * @param       param
    * @return      return
    */
   public function save()
   {

		$this->data=array(
			'page_header'=>"WAREHOUSE MANAGEMENT"
		);
        $post = $this->input->post();
        $this->form_validation->set_rules('name', 'Warehouse name', 'required');
        $this->form_validation->set_rules('short_name', 'Short name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        //
        if ($this->form_validation->run() == FALSE)
        {
			// dump('here');
        	$this->load_view('forms/warehouse-add'); 
        }
        else
        {
			// dump($post);exit;

			$mode=$post['mode'];
			unset($post['mode']);

			if($mode=='add'){
				$result = $this->warehouse_model->insert($post);
				if($result){
					$this->session->set_flashdata('success', lang('add_warehouse_success'));
					redirect('warehouses');
		
				}
				else{
					$this->session->set_flashdata('error', lang('add_warehouse_error'));
					redirect('warehouses');
				}
			}
			if($mode=='edit'){
				$id=$post['id'];
				unset($post['id']);

				$result = $this->warehouse_model->update($id, $post);

				if($result){
					$this->session->set_flashdata('success', lang('edit_warehouse_success'));
					redirect('warehouses');
					
				}
				else{
					$this->session->set_flashdata('error', lang('edit_warehouse_error'));
					redirect('warehouses');
				}
			}
			

        }
   }
}
// End of file Warehouses.php
// Location: ./application/controller/Warehouses.php