<?php

	Class Todo_model extends CI_Model{

		function getToDo($id){
			$this -> db -> select('id, taak, actief');
			$this -> db -> from('todolist');
			$this->db->where('user', $id);

		 	$query = $this -> db -> get();

		 	return($query->result_array());
		}


		function deleteTodo($taakID, $actiefStatus){
			$this -> db -> where('id', $taakID);
			$this -> db -> delete('todolist');
		}

		function setTodo($dezeUser, $nieuwItem){
				$output = array(	
		 		'user' => $dezeUser,
		 		'taak' => $nieuwItem,
		 		'actief' => 1
		 		);

		 	$this -> db -> insert('todolist', $output);

		}

		function veranderStatus($ditItem, $nieuweStatus){
			$data = array(
               'actief' => $nieuweStatus
            );

			$this->db->where('id', $ditItem);
			$this->db->update('todolist', $data); 
		}
	
	}

?>