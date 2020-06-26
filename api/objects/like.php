<?php
	/**
	 * like object
	 */
	Class Like extends Database {
		// databse connect and database name
		protected $user_id;
		protected $post_id;
		protected $created;


		function user_id($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->user_id = $val;
		}

		function post_id($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->post_id = $val;
		}

		function created($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->created = $val;
		}

		// add like
		function add() {
			// query
			$query = "INSERT INTO `like`(`user_id`, `post_id`, `created`) VALUES (".$this->user_id.", '".$this->post_id."', '".$this->created."')";
			return mysqli_query($this->get_connection(), $query);
		}

		// delete like
		function delete() {
			// query
			$query = "DELETE FROM `like` WHERE `post_id` = ".$this->post_id." AND `user_id` = ".$this->user_id;
			return mysqli_query($this->get_connection(), $query);
		}

		// check before like
		function read() {
			// query 
			$query = "SELECT `comment_id`, `content`, `name`, `avatar`, `comment`.`created` as created FROM `comment` JOIN `user` ON `comment`.`user_id` = `user`.`user_id` WHERE `post_id` = ".$this->post_id." ORDER BY `comment_id` DESC";
			$query_statement = mysqli_query($this->get_connection(), $query);
			return $query_statement;
		}

		// check before like
		function check() {
			// query 
			$query = "SELECT * FROM `like` WHERE `post_id` = ".$this->post_id." AND `user_id` = ".$this->user_id;
			$query_statement = mysqli_query($this->get_connection(), $query);
			return mysqli_num_rows($query_statement);
		}

		// total like
		function total() {
			// query 
			$query = "SELECT count(*) as `total` FROM `like` WHERE `post_id` = ".$this->post_id;
			$query_statement = mysqli_query($this->get_connection(), $query);
			$row = mysqli_fetch_array($query_statement);
			return $row['total'];
		}
	}
?>