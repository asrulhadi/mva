<?php
/**
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

require("libs/DB.php");
require("libs/User.php");
require("libs/Smarty.class.php");

$user = new User();
$smarty = new Smarty;
$db = DB::get_instance();

// which page to display, default to login form
$page = "login.tpl";

if ($user->get_user_id()) {
  // already logged in, redirect to homepage
  $smarty->assign("msg","You are already logged in.");
  $page = "redirect.tpl";
}

if ($_POST['submit']) {
  $user->login($_POST['username'], $_POST['password']);
  if($user->get_user_id()) {
    // successfully login. Goto home page
    header("Location:index.php");
  } else {
    // error in login. Either username or password
    $smarty->assign('error',"Username or Password incorrect");
  }
}

$smarty->display($page);

// vim: et:sta:ai:ts=2:sw=2:fen:fdm=indent:
