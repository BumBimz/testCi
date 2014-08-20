<?php 
class LoginModel extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	
	public function getLoggedInUser(){
		$user = '';
		$condition = array('member.member_id'=>$this->session->userdata('member_id'));
		$fields    = 'member.member_id,member.member_user,member.online';
		$query = $this->getUsers($condition,$fields);			
		if($query->num_rows()>0)
		{
			$user = $query->row();				
		}			
		return $user;
	}
	
	function getUsers($conditions=array(),$fields=''){
		parent::__construct(); 
		if(count($conditions)>0)		
	 		$this->db->where($conditions);
		$this->db->from('member');
		$this->db->order_by("member.member_id", "asc");
		if($fields!='')
			$this->db->select($fields);
		else 		
	 		$this->db->select('member.member_id,member.member_user,member.online');
		$result = $this->db->get();
		return $result;
    }
	
	function setUserSession($row=NULL)
	{
		$values = array('member_id'=>$row->user_id,'logged_in'=>TRUE,'username'=>$row->member_user);
		$this->session->set_userdata($values);
	}
	
	function updateUser($updateKey=array(),$updateData=array()){
		$this->db->update('member',$updateData,$updateKey); 
	}
	
	function flash_message($type,$message){
	 	switch($type)
		{
			case 'success':
					$data = '<div class="message"><div class="success">'.$message.'</div></div>';
					break;
			case 'error':
					$data = '<div class="message"><div class="error">'.$message.'</div></div>';
					break;		
		}
		return $data;
	 }
}
?>