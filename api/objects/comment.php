<?php
	/**
	 * comment object
	 */
	Class Comment extends Database {
		// databse connect and database name
		protected $user_id;
		protected $content;
		protected $post_id;
		protected $created;
		protected $comment_id;


		function user_id($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->user_id = $val;
		}

		function content($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->content = $val;
		}

		function post_id($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->post_id = $val;
		}

		function created($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->created = $val;
		}

		function comment_id($val) {
			$val = mysqli_escape_string($this->get_connection(), $val);
			$this->comment_id = $val;
		}

		// add comment
		function add() {
			// query
			$query = "INSERT INTO `comment`(`user_id`, `post_id`, `content`, `created`) VALUES (".$this->user_id.", '".$this->post_id."', '".$this->content."', '".$this->created."')";
			return mysqli_query($this->get_connection(), $query);
		}

		// delete comment
		function delete() {
			// query
			$query = "DELETE FROM `comment` WHERE `comment_id` = ".$this->comment_id." AND `user_id` = ".$this->user_id;
			return mysqli_query($this->get_connection(), $query);
		}

		// check before comment
		function read() {
			// query 
			$query = "SELECT `comment_id`, `content`, `name`, `avatar`, `comment`.`created` as created FROM `comment` JOIN `user` ON `comment`.`user_id` = `user`.`user_id` WHERE `post_id` = ".$this->post_id." ORDER BY `comment_id` DESC";
			$query_statement = mysqli_query($this->get_connection(), $query);
			return $query_statement;
		}

		// check before comment
		function read_me() {
			// query 
			$query = "SELECT `comment_id` FROM `comment` WHERE `post_id` = ".$this->post_id." AND `user_id` = ".$this->user_id;
			$query_statement = mysqli_query($this->get_connection(), $query);
			return $query_statement;
		}
	}
?>