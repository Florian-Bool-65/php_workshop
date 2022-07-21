<?php

require_once __DIR__ . '/QueryHandler.php';
require_once __DIR__ . '/QueryResult.php';

class Department {
  function __construct() {
  
  }
  
  /**
   * @throws DbException
   */
  public static function all(): ?QueryResult {
    $query = "SELECT * FROM `departments`";
    
    return QueryHandler::execute($query);
  }
  
  
  public static function find($id): ?QueryResult {
    $query = "SELECT * FROM `departments` WHERE `id` = {$id}";
    
    return QueryHandler::execute($query);
  }
  
  /**
   * @param $departmentId
   *
   * @return QueryResult|null
   * @throws DbException
   */
  public static function degrees($departmentId): ?QueryResult {
    $query = "SELECT *
              FROM `degrees`
               WHERE `department_id` = $departmentId";
    
    return QueryHandler::execute($query);
  }
  
}
