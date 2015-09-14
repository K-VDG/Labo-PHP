<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// de onderstaande index functie nog herschrijven

class VerifyLogin extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('User_model','',TRUE);
 }
 
 
 function index()
 {
   //This method will have the credentials validation

   $this->load->library('form_validation');
 
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
     redirect('dashboard', 'refresh');
   }
 	
 }

 function check_database($password)
 {

   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
 
   //query the database
   $result = $this->User_model->login($username, $password);
 
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'username' => $row->email,
         'password' => $row->saltyhashedpassword,						//
         'userID' => $row->id
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Foute gebruikersnaam en/of paswoord! Probeer opnieuw.');

     return false;
   }
 }

}

?>