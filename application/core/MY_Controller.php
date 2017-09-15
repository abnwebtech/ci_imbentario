<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here...
 *
 * @package     KAWANI
 * @subpackage  subpackage
 * @category    category
 * @author      joseph.gono@systemantech.com
 * @link        http://systemantech.com
 */
class MY_Controller extends CI_Controller
{

	protected $data = array();

	function __construct()
	{
		parent::__construct();

		if ( ! $this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}

		// dump($this->uri->segmet);

		$this->load->model('user_model');
	}

	protected function prep_user_data()
	{
		$user = $this->ion_auth->user()->row();
		$user_role = $this->user_model->get_user_default_role($user->id);

		$this->data['navigation_menu'] = $this->navigation->get_role_navigation_menu($user_role[0]['system_group_id']);

		$this->data['user_details'] = $user;
		$this->data['user_role'] = $user_role[0]['role_name'];
	}

    protected function load_view($sub_view = null)
    {
		$this->data['sub_view'] = (isset($sub_view)) ? $sub_view : 'errors/error_404';
		$this->data['app_version'] = $this->config->item('app_version');
		$this->data['site_title']  = $this->config->item('site_title');

		foreach ($this->config->item('main_components') as $key => $component)
		{
			$this->data[$key] = strtolower(sprintf('%s/%s', 'components', $component));
		}

		foreach ($this->config->item('layout_settings') as $layout_key => $layout_value)
		{
			$this->data[$layout_key] = $layout_value;
		}

		foreach ($this->config->item('btn_settings') as $btn_key => $btn_value)
		{
			$this->data[$btn_key] = $btn_value;
		}

		$this->prep_user_data();
		$this->load->view('main-wrapper', $this->data);
		$this->output->enable_profiler(false);
    }
}
/* End of file MY_Controller.php */
/* Locaiotn: ./application/core/MY_Controller.php */