<?php

class QueryResult {
  private mysqli_result $result;
  
  function __construct(mysqli_result $result) {
    $this->result = $result;
  }
  
  /**
   * Return results as an associative array
   *
   * @return array
   */
  public function toArray(): array {
    // reset pointer to 0 to avoid empty results if called multiple times
    $this->result->data_seek(0);
    
    return $this->result->fetch_all(MYSQLI_ASSOC);
  }
  
  /**
   * Read row by row and return it as an associative array
   *
   * @param $callback
   *
   * @return void
   */
  public function forEach($callback) {
    // reset pointer to 0 to avoid empty results if called multiple times
    $this->result->data_seek(0);
    
    while ($row = $this->result->fetch_assoc()) {
      $callback($row);
    }
  }
}
