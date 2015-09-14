<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Registreer extends CI_Controller {

		 function __construct()
	 	{
	  		 parent::__construct();
	 	}

		function index()
		 {
		   $data['titel'] = "Registreer";
		   $this->load->helper(array('form'));
		   $this->load->view('header-view', $data);
		   $this->load->view('registreer-view', $data);
		 }

	}
?>