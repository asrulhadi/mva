<?php

$user = array(
	"Alice" => 'p455w0rd',
	'Bob' => 'DualPhone',
	'Eve' => 'Hacker'
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
	
	if ($link->query("CREATE TABLE user (id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(16), password VARCHAR(64))")) {
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
	foreach ($user as $name => $pass) {
		$link->query("INSERT INTO user (username,password) VALUES ('$name','$pass')");
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

?>
