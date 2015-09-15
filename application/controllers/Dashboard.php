<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller {

   function index()
   {
     if($this->session->userdata('logged_in'))
     {
       $session_data = $this->session->userdata('logged_in');
       $data['titel'] = "Dashboard";
       $this->load->view('header-view', $data);
       $this->load->view('dashboard-view');
     }
     else
     {
       redirect('login', 'refresh');
     }
   }   
   
   function logout()
   {
     $this->session->unset_userdata('logged_in');
     session_destroy();
     redirect('login', 'refresh');
   }
 
}


 
?>