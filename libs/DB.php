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
 * @modify 2015
 *
 */

class DB {
  /**
   * This class provides the barest wrapper for MySQL
   */
  private $host = "localhost";
  private $username = "root";
  private $password = "toor";
  private $db_name = "insecure";
  private static $instance;

  private function __construct() {
    $this->connect();
  }

  function connect() {
    $this->connection = mysqli_connect($this->host, $this->username, $this->password);
    if(!$this->connection) {
      echo(mysqli_error());
    }
    mysqli_select_db($this->connection, $this->db_name);
  }

  function query($sql) {
    $result = mysqli_query($this->connection, $sql);
    if(!$result) {
      echo("Function query: " . mysqli_error($this->connection));
    }
    return $result;
  }

  function count_rows($result) {
    return mysqli_num_rows($result);
  }

  function fetch_assoc($result) {
    return mysqli_fetch_assoc($result);
  }

  static function get_instance() {
    if(!self::$instance) {
      self::$instance = new DB;
    }
    return self::$instance;
  }

}

// vim: et:sta:ai:ts=2:sw=2:fen:fdm=indent:
?>
