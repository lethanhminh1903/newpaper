<?php
	/**
	 * editor object
	 */
	Class Editor extends Database {
		// databse connect and database name
		protected $name;
		protected $email;
		protected $password;
		protected $avatar;
		protected $created;
		protected $kinds;
		protected $admin_id;


		function name($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->name = $val;
		}

		function email($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->email = $val;
		}

		function password($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->password = $val;
		}

		function avatar($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->avatar = $val;
		}

		function created($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->created = $val;
		}

		function kinds($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->kinds = $val;
		}

		function admin_id($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->admin_id = $val;
		}

		// add editor
		function add() {
			// query
			$query = "INSERT INTO `admin`( `name`, `email`, `password`, `avatar`, `created`, `kinds`) VALUES ('".$this->name."', '".$this->email."', '".$this->password."', '".$this->avatar."', '".$this->created."', '".$this->kinds."')";
			return mysqli_query($this->get_connection(), $query);
		}

		// delete editor
		function delete() {
			// query
			$query = "DELETE FROM `editor` WHERE `post_id` = ".$this->post_id." AND `user_id` = ".$this->user_id;
			return mysqli_query($this->get_connection(), $query);
		}

		function read() {
			// query 
			$query = "SELECT * FROM `admin` WHERE `kinds` = 1";
			$query_statement = mysqli_query($this->get_connection(), $query);
			return $query_statement;
		}

		function check() {
			// query 
			$query = "SELECT * FROM `admin` WHERE `email` = '".$this->email."'";
			$query_statement = mysqli_query($this->get_connection(), $query);
			$check = mysqli_num_rows($query_statement);
			return $check;
		}

		function check_access() {
			// query 
			$query = "SELECT `kinds` FROM `admin` WHERE `admin_id` = '".$this->admin_id."'";
			$query_statement = mysqli_query($this->get_connection(), $query);
			$row = mysqli_fetch_array($query_statement);
			return $row['kinds'];
		}
	}
?>