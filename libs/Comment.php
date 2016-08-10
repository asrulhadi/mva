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
    $this->comment_id = intval($comment_id);	// make sure $comment_id is integer
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
    $this->article_id = intval($id);	// make sure $id is integer
  }

  function get_date_created() {
    return $this->date_created;
  }

  function set_date_created($date_created) {
    $this->date_created = $date_created;
  }

  function write() {
    $db = DB::get_instance();
	$safe_comment = $db->connection->real_escape_string($this->comment);
	// escape (ASCII 0), \n, \r, \, ', ", and Control-Z.
    $sql = "INSERT INTO comment (comment, article_id) VALUES " . 
      "( '" . $safe_comment . "'" . 	// make sure cannot inject
      ", '" . $this->article_id . "')";	// article_id is already integer
    $result = $db->query($sql);
  }

}

// vim: et:sta:ai:ts=2:sw=2:fen:fdm=indent:
?>
