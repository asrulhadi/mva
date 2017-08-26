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
 *
 */

require("libs/DB.php");
require("libs/User.php");
require("libs/Article.php");
require("libs/Comment.php");
require("libs/Smarty.class.php");

$user = new User();
$smarty = new Smarty();
$db = DB::get_instance();

function get_all_comments($id) {
  $db = DB::get_instance();
  $comment_arr = [];
  $sql = "SELECT * FROM comment WHERE article_id = '$id' ORDER BY date_created";
  $result = $db->query($sql);
  while($row = $db->fetch_assoc($result)) {
    $r_id = $row['id'];
    $r_cmt = $row['comment'];
    $r_cnt = $row['article_id'];
    $r_date = $row['date_created'];
    $comment_arr[] = new Comment($r_id, $r_cmt, $r_cnt, $r_date);
  }
  return $comment_arr;
}

$article_id = $_GET['id'];
if($article_id) {
  try {
    // Display the article
    $article = new Article($article_id);
    $smarty->assign('id', $article->get_id());
    $smarty->assign('title', $article->get_title());
    $smarty->assign('date_created', $article->get_date_created());
    $smarty->assign('username', $article->get_username());
    $smarty->assign('content', $article->get_content());
    $smarty->assign('comments', get_all_comments($article_id));
    $smarty->display("article.tpl");
  } catch (Exception $e) {
    $smarty->display("redirect.tpl");
  }
} else {
  // no article id ==> redirect to homepage
  $smarty->display("redirect.tpl");
}

// vim: et:sta:ai:ts=2:sw=2:fen:fdm=indent:
