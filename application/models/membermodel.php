<?php 
class MemberModel extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	
	public function getResult($sql){
		$rs=$this->db->query($sql);
		return $rs->result();
	}
}
?>