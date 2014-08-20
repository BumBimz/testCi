<?php 
class MemberServiceModel{
	private $connectionDB;
	public function __construct($connectionDB){
		$this->connectionDB = $connectionDB;
	}
	function listMember(){
	try {
      $sql = "select * from member";
      $local_dbh = $this->connectionDB->getConnection();
      $stmt = $local_dbh->query($sql);
      $member = $stmt->fetchAll(PDO::FETCH_OBJ);
      $local_dbh = null;
      return $member;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
	}
}
?>