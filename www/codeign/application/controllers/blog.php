<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

	function _construct()
	{
		parent::_construct();
	}
	public function index()
	{
		$data['title'] = "Maverick is ";
		$data['heading'] = "My first codeign page";
		$data['todo'] = array('eat','shit','sleep');
		$this->load->view('blog_view',$data);

	}
}

