<?php

	Class User_model extends CI_Model{

		 function login($email, $password){

			$this -> db -> select('id, email, salt, saltyhashedpassword');
			$this -> db -> from('users');
			$this -> db -> where('email', $email);
			//$this -> db -> where('saltyhashedpassword', $password);	
			$this -> db -> limit(1);
			 
			$query = $this -> db -> get();

			// if query num ruws() === 1  		CHECKEN

			if($query -> num_rows() == 1){
				$DBoutput = ($query->result_array());
				$salt = $DBoutput[0]['salt'];
				$saltyhashedpassword = $DBoutput[0]['saltyhashedpassword'];
				$saltyUserInput = hash('SHA512',($salt . $password));
				
					if($saltyUserInput === $saltyhashedpassword){
					    return $query->result();
					} else {
						return false;
					}
				} else {
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

		 	// random salt maken
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    	$charactersLength = strlen($characters);
	   		$randomString = '';
		    for ($i = 0; $i < 10; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
    		$salt = $randomString;

    		// paswoord salten & hashen
    		$saltyHashedPassword = hash('SHA512',($salt . $password));

    		// en uploaden
		 	$output = array(	
		 		'email' => $email,
		 		'salt' => $salt,
		 		'saltyhashedpassword' => $saltyHashedPassword
		 		);
		 	$this -> db -> insert('users', $output);
		 }



	}

?>