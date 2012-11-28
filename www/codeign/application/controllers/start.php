<?php
class Start extends CI_Controller{
	var $base;
	var $css;

	function __construct()
	{
		parent::__construct();
		$this->base = $this->config->item('base_url'); 
		$this->css = $this->config->item('css');
	}	

	function hello($name)
	{
		$data['css'] = $this->css;
		$data['base'] = $this->base;
		$data['mytitle'] = 'Welcome to my site People';
		$data['mytext'] = "Hello $name, this is my new site man";
		$this->load->view('testview',$data);
	}

}//end of class Start

?>
