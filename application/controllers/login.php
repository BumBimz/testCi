<?php 
	Class Login extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('loginmodel');
			
		}
		public function index(){
		$this->load->library('session');
		$this->load->helper('form');
		$loggedInUser = $this->loginmodel->getLoggedInUser();
		echo $loggedInUser;
		$this->outputData['loggedInUser'] 	= $loggedInUser; 
		
		 if($this->input->post('usersLogin')){
			$conditions =  array('member_user'=>$this->input->post('username'),'member_password' => $this->input->post('pwd'),'member.position_id !=' => '5');
			$query	= $this->loginmodel->getUsers($conditions);
			if($query->num_rows() > 0){
				$row =  $query->row();
				$updateData = array();
				$updateData['online'] = "1";
				$this->loginmodel->updateUser(array('member_id'=>$row->member_id),$updateData);

				$this->loginmodel->setUserSession($row);
				$this->session->userdata('member_id', $row->member_id);
				$this->session->userdata('member_user', $row->member_user);
					
				$this->session->set_flashdata('flash_message', $this->loginmodel->flash_message('success','Logged In Successfull'));
				redirect('chat');	
			}else{
				$this->session->set_flashdata('flash_message', $this->loginmodel->flash_message('error','Login failed! Incorrect username or password'));
			 	redirect('login');
			}

		 }
		
		$this->load->view('user/login',$this->outputData);
		}
	}
?>