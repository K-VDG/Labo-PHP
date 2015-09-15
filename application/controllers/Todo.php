<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	class Todo extends CI_Controller {
	 
		 function __construct()
		 {
		   parent::__construct();
		   $this->load->model('Todo_model','',TRUE);
		 }

		 function index() {
			if($this->session->userdata('logged_in')){

				$todolist = $this->Todo_model->getToDo($_SESSION['logged_in']['userID']);

				// lijst opsplitsen in twee:
				$nogTeDoen = array();
				$alGedaan = array();

				foreach($todolist as $key => $value) {
					if($todolist[$key]['actief'] == 1){

						$nogTeDoen[$key]['id'] = $todolist[$key]['id'];
						$nogTeDoen[$key]['taak'] = $todolist[$key]['taak'];
						$nogTeDoen[$key]['actief'] = 1;

					} else {
						$alGedaan[$key]['id'] = $todolist[$key]['id'];
						$alGedaan[$key]['taak'] = $todolist[$key]['taak'];
						$alGedaan[$key]['actief'] = 0;
					}
				}

				$data['titel'] = "To do";
				$data['nogTeDoen'] = $nogTeDoen;
				$data['alGedaan'] = $alGedaan;
				$this->load->view('header-view', $data);
				$this->load->view('Todo-view', $data);

			} else 	{
			    //If no session, redirect to login page
			    redirect('login', 'refresh');
			}				
		}

		function deleteTaak(){
			$taakId = $this->uri->segment(3);
			$actiefStatus = $this->uri->segment(4);
			$this->Todo_model->deleteToDo($taakId, $actiefStatus);
			$_SESSION['notification'] = 'Het item werd verwijderd.';
			redirect('todo', 'refresh');
		}

		function voegToe(){
			if($this->session->userdata('logged_in')){
				$this->load->helper('form');
				$data['titel'] = "Voeg item toe";
				$this->load->view('header-view', $data);
				$this->load->view('voegtoe-view', $data);
			} else 	{
			    //If no session, redirect to login page
			    redirect('login', 'refresh');
			}
		}

		function verplaatsItem(){
			$taakId = $this->uri->segment(3);
			$actiefStatus = $this->uri->segment(4);

			$nieuweStatus = ($actiefStatus == 0)? 1 : 0 ;	

			if ($actiefStatus == 0){
				$nieuweStatus = 1;
				$_SESSION['notification'] = 'Pfffrt. Nog meer werk.';
			} else {
				$nieuweStatus = 0;
				$_SESSION['notification'] = 'Alright! Dat is geschrapt.';
			}

			$this->Todo_model->veranderStatus($taakId, $nieuweStatus);

			redirect('todo', 'refresh');
		}
	}
?>

