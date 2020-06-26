<?php
	/**
	 * login object
	 */
	Class Login extends Database {
		// databse connect and database name
		public $table_name = "admin";
		public $email;
		public $password;

		// function check number rows after query statement 
		function read() {
			// query 
			$query = "SELECT * FROM `".$this->table_name."` WHERE `email` = '".$this->email."'";
			$query_statement = mysqli_query($this->get_connection(), $query);
			return $query_statement;
		}
	}
?>