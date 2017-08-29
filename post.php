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
require("libs/Article.php");
require("libs/Comment.php");
require("libs/Smarty.class.php");

$smarty = new Smarty();
$db = DB::get_instance();

// this is need an authenticated user
$user = new User();
if (! $user->get_user_id()) {
  // not logged in yet. Redirecting to home
  header("Location:index.php");
}

if(isset($_POST['submit'])) {
  // create new article
  $content = new Article();
  $content->set_user_id($user->get_user_id());  // take from session. Client data cannot be trusted
  $content->set_title($_POST['title']);
  $content->set_content($_POST['content']);
  // write article to database
  $content->write();
  $smarty->assign('info', '<p>Preview of article:</p><p>' . $content->get_content() . '</p>');
  $smarty->assign('msg', 'Your article has been registered');
  $smarty->display('redirect.tpl');
} else {
  // display form to post message
  $smarty->assign('user_id', $user->get_user_id());
  $smarty->display("post.tpl");
}

// vim: et:sta:ai:ts=2:sw=2:fen:fdm=indent:
