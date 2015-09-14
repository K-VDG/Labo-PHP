<?php

	Class User_model extends CI_Model{

		 function login($email, $password){

		   $this -> db -> select('id, email, saltyhashedpassword');
		   $this -> db -> from('users');
		   $this -> db -> where('email', $email);
		   $this -> db -> where('saltyhashedpassword', $password);	// PASWOORD HASHING NOG TOEVOEGEN
		   $this -> db -> limit(1);
		 
		   $query = $this -> db -> get();
		 
		   if($query -> num_rows() == 1)
		   {
		     return $query->result();
		   }
		   else
		   {
		     return false;
		   }
		 }

		 function getAllUsers($email, $password){

		 	// om te checken of user bestaat
		 	$this -> db -> select('email');
		 	$this -> db -> from('users');
		 	$query = $this -> db -> get();

		 	$allUsers = $query->result_array();

		 	return $allUsers;
		 }


		 function registreerUser($email, $password){

		 	$output = array(	
		 		'email' => $email,
		 		'saltyhashedpassword' => $password
		 		);
		 	$this -> db -> insert('users', $output);
		 }



	}

?>