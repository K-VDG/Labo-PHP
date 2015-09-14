<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class RegistreerUser extends CI_Controller {

		 function __construct(){
	  		 parent::__construct();
	  		 $this->load->model('User_model','',TRUE);
 		}

 function index()
 {
   //This method will have the credentials validation

	$this->load->library('form_validation');
	$username = $this->input->post('username');
	$password = $this->input->post('password');

	$this->form_validation->set_rules('username', $username, 'trim|required|valid_email');
  $this->form_validation->set_rules('password', $password, 'trim|required|min_length[8]');

   	if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
    $data['titel'] = "Registreer";
    $this->load->view('header-view', $data);
    $this->load->view('registreer-view');
    return;
   }

	// alle users ophalen om te checken of 'm al bestaat
	$allUsers = $this->User_model->getAllUsers($username, $password);

	$overloopArray = array();
	foreach($allUsers as $user){
		  $overloopArray[] = $user['email'];
	}

	if(in_array($username, $overloopArray)){
		// hier foutboodschap weergeven! 
		redirect('Registreer', 'refresh');
		$this->form_validation->set_message('check_database', 'Deze user bestaat al.');			//


	} else {
		// als user nog niet bestaat: user invoegen.
		$this->User_model->registreerUser($username, $password);

		$userID = $this->db->insert_id();	// ID ophalen van de nieuwe gebruiker
		
		$sess_array = array(
         'username' => $username,
         'password' => $password,
         'userID' => $userID
       );
       $this->session->set_userdata('logged_in', $sess_array);

		redirect('dashboard', 'refresh'); 

	}

}



 /*
   $this->form_validation->set_rules('username', 'username', 'trim|required');
   $this->form_validation->set_rules('password', 'password', 'trim|required|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
    $data['titel'] = "Login";
    $this->load->view('header-view', $data);
    $this->load->view('login-view');
   }
   else
   {
     //Go to private area
     redirect('home', 'refresh');
   }
 
 }
*/



	}
?>