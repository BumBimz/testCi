<?php 
 
class Chat extends CI_Controller {
    public $outputData;		
	public $loggedInUser;

	public function index(){
		$this->load->model('users_model');
		$this->load->library('session');			
		$sessionUserID = $this->session->userdata('member_id');
		if(!$sessionUserID) 
			redirect('welcome');
		$this->outputData['listOfUsers']	= $this->users_model->getUsers();
		$userdata  = $this->session->all_userdata(); 
		$this->outputData['session_dataa'] = $userdata;
		$this->load->view('chat/userList',$this->outputData);
    }
}