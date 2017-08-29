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

  function __construct($article_id='') {
    if (!empty($article_id)) {
      // called to retrieve existing article
      $this->id = intval($article_id);  // make sure integer
      if (! $this->retrieve_content()) {
        throw new Exception('Cannot find');
      }
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
    $sql = "SELECT username FROM user WHERE id = " . intval($this->user_id);  // also make integer
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
    // return safe html string to be displayed
    return filter_var($this->title, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
  }

  function set_title($title) {
    $this->title = $title;
  }

  function get_content() {
    return htmlentities($this->content);    // not good. Lost all formatting
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
    $sql = "SELECT * FROM article WHERE id = " . $this->id;    // should be sanitized already
    $result = $db->query($sql);
    if (mysqli_num_rows($result)) {
      $row = $db->fetch_assoc($result);
      $this->user_id = $row['user_id'];
      $this->title = $row['title'];
      $this->content = $row['content'];
      $this->date_created = $row['date_created'];
    } else {
      return False;
    }
    return True;
  }

  function write() {
    $db = DB::get_instance();
    // using prepared statement --> no limit on title and content --> for SQLi only, XSS need another procedure
    $stmt = $db->connection->prepare("INSERT INTO article (user_id, title, content) VALUES (?,?,?)");
    $stmt->bind_param("iss", $this->user_id, $this->title, $this->content);
    $stmt->execute();
    $result = $stmt->get_result();    
  }

}

// vim: et:sta:ai:ts=2:sw=2:fen:fdm=indent:
?>
