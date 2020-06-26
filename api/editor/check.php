<?php
	// include object database and login
	include_once '../api/config/database.php';
	include_once '../api/objects/editor.php';

	// Product object
	$editor = new Editor();
	$data = [];
	$admin_id = $_SESSION['admin_id'];
	$editor->admin_id($admin_id);
	$check = $editor->check_access();
	if ($check != 0) {
		header('location: index.php');
	}
?>