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

if($_POST['submit']) {
  // create new article
  $content = new Article();
  $content->set_user_id($_POST['user_id']);
  $content->set_title($_POST['title']);
  $content->set_content($_POST['content']);
  // write article to database
  $content->write();
  $smarty->assign('info', '<p>Preview of article:</p><p>' . $content->get_content() . '</p>');
  $smarty->assign('msg', 'Your article has been registered');
  $smarty->display('redirect.tpl');
} else {
  // display form to post message
  $user = new User();
  $smarty->assign('user_id', $user->get_user_id());
  $smarty->display("post.tpl");
}

// vim: et:sta:ai:ts=2:sw=2:fen:fdm=indent:
