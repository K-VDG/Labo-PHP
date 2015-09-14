<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	class UploadItem extends CI_Controller {
	 
		 function __construct()
		 {
		   parent::__construct();
		   $this->load->model('Todo_model','',TRUE);
		 }

		 function index() {
			if($this->session->userdata('logged_in') && !empty($_POST['nieuwItem'])){

					$dezeUser = $_SESSION['logged_in']['userID'];
					$nieuwItem = $_POST['nieuwItem'];

					$this->Todo_model->setTodo($dezeUser, $nieuwItem);
					redirect('todo', 'refresh');

			} else 	{
			    //If no session, redirect to login page
			    redirect('todo/voegtoe', 'refresh');
			}				
		}

	}
?>

