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
require("libs/Smarty.class.php");

$user = new User();
$smarty = new Smarty;
$db = DB::get_instance();

// which page to display, default to login form
$page = "signup.tpl";

if ($user->get_user_id()) {
  // already logged in, redirect to homepage
  $smarty->assign("msg","You are already logged in.");
  $page = "redirect.tpl";
}

$error = False;
$errmsg = "Username and Password must not be empty";
if (isset($_POST['register']) &&
    isset($_POST['username']) && (!empty($_POST['username'])) &&
    isset($_POST['password']) && (!empty($_POST['password']))
   ) {
  $error = False;
  // get username
  $name = $_POST['username'];
  $pass = $_POST['password'];

  $db = DB::get_instance();
  // check username
  $sql = "SELECT id,username FROM user";
  $users = $db->query($sql);
  while ($row = $db->fetch_assoc($users)) {
    if ($row['username'] == $name) {
      $error = True;
      $errmsg = "Username '$name' already exist";
      break;
    }
  }
  $avatar = 'anon.jpg';  // default avatar
  if (! $error) {
    // user baru
    $dir = dirname($_SERVER['SCRIPT_FILENAME']);
    // avatar could be only set during signup
    if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
      $avatar = basename($_FILES['avatar']['name']);
      $tmpfile = $_FILES['avatar']['tmp_name'];
      // make sure it is an image
      // $_FILES['avatar']['mime'] <== cannot be trusted. Controlled by client
      if (substr(mime_content_type($tmpfile),0,5) !== "image" ) {
          $error = True;
          $errmsg = "Not an image";
      } else {
        // generate new name -- avoid double extension vulnerability
        $ext = strrchr($avatar,".");
        $avatar = strtr(base64_encode(sha1($avatar, True)."@"),array("+"=>"_","/"=>"-")) . $ext;
        if (move_uploaded_file($tmpfile, "$dir/avatar/$avatar")) {
        } else {
          $error = True;
          $errmsg = "File upload error";
        }
      }
    }
  }
  if (! $error) {
    // create user
    $stmt = $db->connection->prepare("INSERT INTO user (username,password,avatar) VALUES (?,?,?)");
    $stmt->bind_param("sss",$name,$pass,$avatar);
    $stmt->execute();
    $res = $stmt->errno;
    if ( ! $res ) {
      // successfully register
      $smarty->assign("msg","You ($name) have been registered. Avatar: $avatar ");
      $page = "redirect.tpl";
    } else {
      $error = True;
      $errmsg = "inserting error $f";
    }
  }
}

// if error exist
if ($error) {
  // error in login. Either username or password
  $smarty->assign('error',$errmsg);
}

$smarty->display($page);

// vim: et:sta:ai:ts=2:sw=2:fen:fdm=indent:
