<?php
class MemberSQLConnection {
  private $pdo;

  function __construct(){
    $this->pdo = new PDO('mysql::memory:');
  }

  function setPDO($pdo){
    $this->pdo = $pdo;
  }
  
  function getConnection(){
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$this->createWineTable();
    //$this->initialDataForWineTable();
    return $this->pdo;
  }
  
  
}
?>