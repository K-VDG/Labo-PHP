<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Home extends CI_Controller {

          function index() {
             $data['titel'] = "Home";
             $this->load->view('header-view', $data);
             $this->load->view('home-view');
         }
    }
 
?>