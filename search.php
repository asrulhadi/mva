<?php
/**
 * Part of Web Application Secure Coding - PHP
 * It is extremely insecure! Please do not use 
 * this in any kind of production environment 
 *
 * @author asrulhadi
 * @created 2015
 */

require("libs/DB.php");
require("libs/User.php");
require("libs/Article.php");
require("libs/Comment.php");
require("libs/Smarty.class.php");

$user = new User();
$smarty = new Smarty;

function get_all_article($keyword) {
  $db = DB::get_instance();
  $sql = "SELECT id FROM article WHERE title LIKE '%$keyword%' or content LIKE '%$keyword%'";
  $result = $db->query($sql);
  $content_arr = [];
  while($row=$db->fetch_assoc($result)) {
    $content_arr[] = new Article($row['id']);
  }
  return $content_arr;
}

$key = $_GET['q'];
// display the result or indicate no article found
// defaulting to null
$articles = [];
if ( isSet($key) && ( $key != "" )  ) {
  $articles = get_all_article($key);
}
$smarty->assign('keyword', $key);
$smarty->assign('articles', $articles);
$smarty->assign('found', count($articles));
$smarty->display("search.tpl");

// vim: et:sta:ai:ts=2:sw=2:fen:fdm=indent:
