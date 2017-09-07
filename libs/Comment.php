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

class Comment {
  private $comment_id = null;
  private $comment = null;
  private $article_id = null;
  private $date_created = null;

  function __construct($comment_id='', $comment='', $article_id='', $date_created='') {
    $this->set_comment_id($comment_id);
    $this->set_comment($comment);
    $this->set_article_id($article_id);
    $this->set_date_created($date_created);
  }

  function get_comment_id() {
    return $this->comment_id;
  }

  function set_comment_id($comment_id) {
    $this->comment_id = $comment_id;
  }

  function get_comment() {
    return $this->comment;
  }

  function set_comment($comment) {
    $this->comment = $comment;
  }

  function get_article_id() {
    return $this->article_id;
  }

  function set_article_id($id) {
    $this->article_id = $id;
  }

  function get_date_created() {
    return $this->date_created;
  }

  function set_date_created($date_created) {
    $this->date_created = $date_created;
  }

  function write() {
    $db = DB::get_instance();
    $sql = "INSERT INTO comment (comment, article_id) VALUES " . 
      "( '" . $this->comment . "'" . 
      ", '" . $this->article_id . "')";
    $result = $db->query($sql);
  }

}

// vim: et:sta:ai:ts=2:sw=2:fen:fdm=indent:
?>
