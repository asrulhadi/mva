<?php
/**
 * 
 * Part of Web Application Secure Coding - PHP
 * It is extremely insecure! Please do not use
 * this in any kind of production environment
 * 
 * @author jackwillk
 * @created 2010
 * 
 * @author asrulhadi
 * @modified 2015
 */

class User {
	private $username = null;
	private $password = null;
	private $user_id = null;

	function __construct($user_id='') {
		if($this->check_user_session()) {
			$this->set_username($_SESSION['username']);
			$this->set_user_id($_SESSION['user_id']);
		}
	}

	function get_user_id() {
		return $this->user_id;
	}

	function set_user_id($user_id) {
		$this->user_id = $user_id;
	}

	function get_username() {
		return $this->username;
	}

	function set_username($username) {
		$this->username = $username;
	}

	/**
	 * This function will check a user submitted username and password against 
	 * the database. If it exists, it sets up a new session
	 */
	function login($username, $password) {
		$db = DB::get_instance();
		$sql = "select * from user where username = '$username' and password = $password";
		$result= $db->query($sql);
		if($db->count_rows($result)) {
			$row = $db->fetch_assoc($result);
			$this->set_user_id($row['id']);
			$this->set_username($row['username']);
			$this->create_user_session();
		}
	}

	// This function is used to start a session and set initial variables
	private function create_user_session() {
		session_start();
		$_SESSION['user_id'] = $this->get_user_id();
		$_SESSION['username'] = $this->get_username();
	}

	// This function checks to see if a user is logged in.
	function check_user_session() {
		session_start();
		if($_SESSION['user_id'] && $_SESSION['username']) {
			return true;
		}
		return false;
	}
}

// vim: et:sta:ai:ts=2:sw=2:fen:fdm=indent:
?>
