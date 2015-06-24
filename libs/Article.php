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

class Article {
  private $id = null;
  private $user_id = null;
  private $title = null;
  private $content = null;
  private $date_created = null;

  function __construct($article_id = '', $user_id = '', $title = '', $content = '', $date_created = '') {
    if($article_id) {
      $this->id = $article_id;
      $this->retrieve_content();
    } else {
      $this->user_id = $user_id;
      $this->title = $title;
      $this->content = $content;
      $this->date_created = $date_created;
    }
  }

  function get_id() {
    return $this->id;
  }

  function set_id($article_id) {
    $this->id = $article_id;
  }

  // retrieve username from database
  function get_username() {
    $db = DB::get_instance();
    $sql = "SELECT username FROM user WHERE id = " . $this->user_id;
    $result = $db->query($sql);
    $row = $db->fetch_assoc($result);
    return $row['username'];
  }

  function get_user_id() {
    return $this->user_id;
  }

  function set_user_id($user_id) {
    $this->user_id = $user_id;
  }

  function get_title() {
    return $this->title;
  }

  function set_title($title) {
    $this->title = $title;
  }

  function get_content() {
    return $this->content;
  }

  function set_content($content) {
    $this->content = $content;
  }

  function get_date_created() {
    return $this->date_created;
  }

  function set_date_created($date_created) {
    $this->date_created = $date_created;
  }

  private function retrieve_content() {
    $db = DB::get_instance();
    $sql = "SELECT * FROM article WHERE id = " . $this->id;
    $result = $db->query($sql);
    $row = $db->fetch_assoc($result);
    $this->__construct('', $row['user_id'], $row['title'], $row['content'], $row['date_created']);
  }

  function write() {
    $db = DB::get_instance();
    $sql = "INSERT INTO article (user_id, title, content) VALUES (" . 
      "'" . $this->user_id . "'," . 
      "'" . $this->title . "'," .
      "'" . $this->content . "')";
    $result = $db->query($sql);
  }

}

// vim: et:sta:ai:ts=2:sw=2:fen:fdm=indent:
?>
