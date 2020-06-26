<?php
	/**
	 * user object
	 */
	Class User extends Database {
		// databse connect and database name
		protected $user_id;
		protected $name;
		protected $avatar;
		protected $password;
		protected $phone_number;


		function user_id($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->user_id = $val;
		}

		function name($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->name = $val;
		}

		function avatar($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->avatar = $val;
		}

		function password($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->password = $val;
		}

		function phone_number($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->phone_number = $val;
		}

		function read() {
			// query 
			$query = "SELECT * FROM `user` WHERE `user_id` = ".$this->user_id;
			$query_statement = mysqli_query($this->get_connection(), $query);
			return $query_statement;
		}

		// check before user
		function check() {
			// query 
			$query = "SELECT * FROM `user` WHERE `post_id` = ".$this->post_id." AND `user_id` = ".$this->user_id;
			$query_statement = mysqli_query($this->get_connection(), $query);
			return mysqli_num_rows($query_statement);
		}

		//update
		function update() {
			// query 
			$query = "UPDATE `user` SET `name` = '".$this->name."', `avatar` = '".$this->avatar."', `phone_number` = '".$this->phone_number."' WHERE `user_id` = ".$this->user_id;
			$query_statement = mysqli_query($this->get_connection(), $query);
			return $query_statement;
		}

		//update
		function update_password() {
			// query 
			$query = "UPDATE `user` SET `password` = '".$this->password."' WHERE `user_id` = ".$this->user_id;
			$query_statement = mysqli_query($this->get_connection(), $query);
			return $query_statement;
		}
	}
?>