<?php

$user = array(
	"Alice" => array('pass' => 'p455w0rd', 'avatar' => 'alice.jpg', 'admin' => True),
	'Bob' => array('pass' => 'DualPhone', 'avatar' => 'bob.jpg', 'admin' => False),
	'Eve' => array('pass' => 'Hacker', 'avatar' => 'eve.jpg', 'admin' => False)
);

if(isset($_REQUEST["install"]) && $_REQUEST["install"] == "yes") {
	include_once("configs/settings.php");
	$link = new mysqli($db['host'], $db['username'], $db['password']);
	if($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }
    if ($link->query("DROP DATABASE IF EXISTS ". $db['name'])) {
		$cl = "success"; $err = "";
	} else {
		$cl = "danger"; $err = $link->error;
	}
	$msg = '<div class="bg-'. $cl .'">Dropping Database ' . $db['name'] . $err ." </div>";
	
	if ($link->query("CREATE DATABASE ". $db['name'])) {
		$cl = "success"; $err = "";
	} else {
		$cl = "danger"; $err = $link->error;
	}
	$msg .= '<div class="bg-'. $cl .'">Database ' . $db['name'] . $err . " created</div>";
	$link->select_db($db['name']);
	
	if ($link->query("CREATE TABLE user (id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(32), password VARCHAR(128), avatar VARCHAR(128), admin BOOLEAN)")) {
		$cl = "success"; $err = "";
	} else {
		$cl = "danger"; $err = $link->error;
	}
	$msg .= '<div class="bg-'. $cl .'">Table user created ' . $err . '</div>';
	
	if ($link->query("CREATE TABLE article (id INT AUTO_INCREMENT PRIMARY KEY, user_id INT, title VARCHAR(140), content TEXT, date_created TIMESTAMP)")) {
		$cl = "success"; $err = "";
	} else {
		$cl = "danger"; $err = $link->error;
	}
	$msg .= '<div class="bg-'. $cl .'">Table article created' . $err . '</div>';
	
	if ($link->query("CREATE TABLE comment (id INT AUTO_INCREMENT PRIMARY KEY, comment VARCHAR(140), article_id INT, date_created TIMESTAMP)")) {
		$cl = "success"; $err = "";
	} else {
		$cl = "danger"; $err = $link->error;
	}
	$msg .= '<div class="bg-'. $cl .'">Table comment created' . $err . '</div>';
	
	$msg .= "Creating user <table class='table'><tr><th>Username</th><th>Password</th></tr>";
  foreach ($user as $name => $data) {
    $pass = $data['pass'];
    $avatar = $data['avatar'];
    $admin = $data['admin'];
		$link->query("INSERT INTO user (username,password,avatar,admin) VALUES ('$name','$pass','$avatar','$admin')");
		$msg .= "<tr><td>$name</td><td>$pass</td></tr>";
	}
	$msg .= "</table>";
	
	$link->close();
} else {
	$msg = "Click <a href='install.php?install=yes'>here</a> to install/reset";
}

require("libs/Smarty.class.php");

$template = "{extends file='page.tpl'}{block name='utama'}<div>". $msg . "</div>{/block}";

$smarty = new Smarty;
$smarty->display("eval:base64:". base64_encode($template));

// vim: et:sta:ai:ts=2:sw=2:fen:fdm=indent:
?>
