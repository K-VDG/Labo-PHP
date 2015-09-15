<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	class UploadItem extends CI_Controller {
	 
		 function __construct()
		 {
		   parent::__construct();
		   $this->load->model('Todo_model','',TRUE);
		 }

		 function index() {

		 	if(!empty($_POST['nieuwItem'])) {

				if($this->session->userdata('logged_in')){

						$dezeUser = $_SESSION['logged_in']['userID'];
						$nieuwItem = $_POST['nieuwItem'];

						$this->Todo_model->setTodo($dezeUser, $nieuwItem);
						$_SESSION['notification'] = 'Todo "' . $nieuwItem . '" toegevoegd.';
						redirect('todo', 'refresh');

				} else 	{
				    //If no session, redirect to login page
				   	redirect('login', 'refresh');
				}	
			} else {
				$_SESSION['notification'] = 'Niets vergeten in te vullen?';
				redirect('todo/voegtoe', 'refresh');
			}
		}
	}
?>


