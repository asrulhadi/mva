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

function get_all_content() {
  $db = DB::get_instance();
  $sql = "SELECT id FROM article ORDER BY date_created DESC";
  $result = $db->query($sql);
  while($row=$db->fetch_assoc($result)) {
    $content_arr[] = new Article($row['id']);
  }
  return $content_arr;
}

$user = new User();

$smarty = new Smarty;
$smarty->assign('articles', get_all_content());
$smarty->display("index.tpl");

// vim: et:sta:ai:ts=2:sw=2:fen:fdm=indent:
