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

$user = new User();
$smarty = new Smarty();
$db = DB::get_instance();

if($_POST['submit']) {
  // save the comment
  $comment = new Comment();
  $comment->set_comment($_POST['comment']);
  $comment->set_article_id($_POST['article_id']);
  $comment->write();
  $cmt = htmlentities($comment->get_comment(),ENT_QUOTES|ENT_HTML5);
  // preventing XSS in this file but not in article.php which will also display comments
  // See http://php.net/manual/en/function.htmlentities.php for more details
  $smarty->assign('info', 'Your comment: ' . $cmt);
  $smarty->assign('msg', 'Your comment has been regsitered');
  $smarty->assign('page', 'article.php?id=' . $comment->get_article_id());
  $smarty->assign('title', 'Article Page');
  $smarty->display('redirect.tpl');
} else {
  // missing content id
  $article_id = $_GET['article_id'];
  if(!$article_id) {
    echo("Missing content id");
    exit();
  }
  $article = new Article($article_id);
  $smarty->assign('title', $article->get_title());
  $smarty->assign('article_id', $article_id);
  $smarty->display("comment.tpl");
}

// vim: et:sta:ai:ts=2:sw=2:fen:fdm=indent:
