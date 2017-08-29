<?php
/**
 * Part of Web Application Secure Coding - PHP
 * It is extremely insecure! Please do not use
 * this in any kind of production environment
 *
 * @author asrulhadi
 * @created 2017
 */

require("libs/DB.php");
require("libs/User.php");
require("libs/Article.php");
require("libs/Comment.php");
require("libs/Smarty.class.php");

$user = new User();

// this page need authenticated user and admin privilege
if ( !($user->get_user_id() && $user->is_admin()) ) {
  header("Location:index.php");
}

$smarty = new Smarty;

$msg = "This page only for authenticated admin only";

$template = "{extends file='page.tpl'}{block name='utama'}<div>". $msg . "</div>{/block}";
$smarty->display("eval:base64:". base64_encode($template));

// vim: et:sta:ai:ts=2:sw=2:fen:fdm=indent:
