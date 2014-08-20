<?php 
require_once ('../tests/MockPDO.php');
class QueryMemberTest extends PHPUnit_Framework_TestCase { 	
    private $CI; 		

    public function setUp() { 	
		$this->CI = &get_instance();
		$this->CI->load->model('MemberServiceModel');
	}
	
	public function testGetAllMember() {
	
	$mockStatement = $this->getMock('PDOStatement', array('fetchAll'));
    $mockStatement->expects($this->once())->method('fetchAll');
	
	$mockPDO = $this->getMock('MockPDO', array('query'));
    $mockPDO->expects($this->once())->method('query')->will($this->returnValue($mockStatement));
	
	$mockConnection = $this->getMock('MemberSQLConnection', array('getConnection'));
    $mockConnection->expects($this->once())->method('getConnection')->will($this->returnValue($mockPDO));

    $memberAPI = new MemberServiceModel($mockConnection);
    $memberAPI->listMember();
	}
	/*public function testGetAllMember() {
		$this->CI->load->model('membermodel');
		$sql = 'SELECT * FROM `member`';
		$posts = $this->CI->membermodel->getResult($sql);
		$this->assertEquals(275, count($posts));
	}*/
	
}
?>