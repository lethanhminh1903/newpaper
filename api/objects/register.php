<?php 
	/**
	 * register object
	 */
	class Register extends Database {
		public $name;
		public $email;
		public $password;
		public $date_created;

		function check_exists() {
			$query = "SELECT * FROM `user` WHERE `email` = '".$this->email."'";
			$query_statement = mysqli_query($this->get_connection(), $query);
			return mysqli_num_rows($query_statement);
		}

		function create() {
			$query = "INSERT INTO `user` (`name`, `email`, `password`, `created`) VALUES ('".$this->name."', '".$this->email."', '".$this->password."', '".$this->date_created."')";
			mysqli_query($this->get_connection(), $query);
			return 1;
		}
	}
?>