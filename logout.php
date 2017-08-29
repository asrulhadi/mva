<?php
/**
 * 
 * Part of Web Application Secure Coding - PHP
 * It is extremely insecure! Please do not use                                                                                        
 * this in any kind of production environment                 
 *
 * @author asrulhadi
 * @created 2015
 */

session_start(); session_destroy(); // need to destroy session to really log out
unset($_COOKIE['PHPSESSID']);
session_start();

require("libs/Smarty.class.php");

$smarty = new Smarty;
$smarty->assign('msg', 'You have been logout.');
$smarty->display("redirect.tpl");

// vim: et:sta:ai:ts=2:sw=2:fen:fdm=indent:
