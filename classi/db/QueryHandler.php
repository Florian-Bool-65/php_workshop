<?php

require_once __DIR__ . '/../exceptions/DbException.php';
require_once __DIR__ . '/QueryResult.php';

define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "db_university");

class QueryHandler {
  /**
   * @var mysqli|null
   */
  private static ?mysqli $instance = null;
  
  /**
   * @return mysqli
   * @throws DbException
   */
  private static function createInstance(): mysqli {
    $dbInstance = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    // Check connection
    if ($dbInstance->connect_error) {
      throw new DbException("Connection failed: " . $dbInstance->connect_error);
    }
    
    // store the instance for future use
    self::$instance = $dbInstance;
    
    return self::$instance;
  }
  
  /**
   * @return mysqli
   * @throws DbException
   */
  public static function getInstance(): mysqli {
    if (isset(self::$instance)) {
      return self::$instance;
    }
    
    return self::createInstance();
  }
  
  /**
   * Execute a query and return its result
   *
   * @param  string  $query
   *
   * @return QueryResult|null
   * @throws DbException
   */
  public static function execute(string $query): ?QueryResult {
    $db     = self::getInstance();
    $result = $db->query($query);
    
    if($db->error){
      throw new DbException($db->error);
    }
    
    return $result ? new QueryResult($result) : null;
  }
}
