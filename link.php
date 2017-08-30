<?php
/**
 * Part of Web Application Secure Coding - PHP
 * It is extremely insecure! Please do not use                                                                                        
 * this in any kind of production environment                 
 *
 * @author asrulhadi
 * @modified 2017
 */

require("libs/DB.php");
require("libs/User.php");
require("libs/Smarty.class.php");

$user = new User();
$smarty = new Smarty;
$db = DB::get_instance();

// which page to display
$page = "link.tpl";

$content = "";  // None by default
$s = DIRECTORY_SEPARATOR;

// check the mode
if (isset($_GET['mode']) && !empty($_GET['mode'])) {
  $smarty->assign('mode', $_GET['mode']);
  switch ($_GET['mode']) {
  // File Mode
  case "file":
    if (isset($_GET['target']) && !empty($_GET['target'])) {
      // make sure target is a file name and have .txt 
      $target_f = basename($_GET['target'], ".txt") . ".txt";
      $target = "text" . $s . $target_f;  // allow only in "text" directory
      if (is_readable($target)) {
        // read the file
        $smarty->assign('content', file_get_contents($target));
      } else {
        $smarty->assign('error','File does not exist or unreadable');
      }
    }
    break;
  // directory mode  
  case "dir":
    if (isset($_GET['target']) && !empty($_GET['target']) && is_readable($_GET['target'])) {
      $target = $_GET['target'];
      $target_d = getcwd() . "/" . $target;   // assuming the target is inside our path
      $ok = ( $target_d === realpath($target_d) );   // make sure only read "allowable" directory
      if ($ok && is_dir($target) && ($dirs = scandir($target))) {
        $odirs = array();
        $oimgs = array();
        // read files in dir
        foreach ( $dirs as $dir ) {
          if ($dir === '.' || $dir === '..') { continue; }
          if (substr($dir,0,1) === '.') { continue; } // hidden dir
          // ok for others
          $f = "$target$s$dir";
          if (is_dir($f)) {
            $odirs[] = array('name' => $dir, 'src' => 'avatar/folder.png');
          }
          // only display if image
          if (is_file($f) && is_readable($f) && substr(mime_content_type($f),0,5) === "image" ) {
            $oimgs[] = array('name' => $dir, 'src' => $f);
          }
        }
        if (count($odirs)) $smarty->assign('dirs', $odirs);
        if (count($oimgs)) $smarty->assign('imgs', $oimgs);
      } else {
        $smarty->assign('error','Not a directory');
      }
    } else {
      $smarty->assign('error','Directory does not exist or unreadable');
    }
    break;
  default:
    $content = "Anything to see?";
  }
}

$smarty->display($page);

// vim: et:sta:ai:ts=2:sw=2:fen:fdm=indent:
