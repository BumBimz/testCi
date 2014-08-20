<?php 
	Class Member extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('membermodel');
		}
		
		public function index(){
			$sqlSelectMember = 'SELECT *
							FROM `member`
							LEFT JOIN company
							ON member.company_id = company.company_id
							LEFT JOIN branch
							ON member.branch_id = branch.branch_id
							LEFT JOIN position
							ON member.position_id = position.position_id';
			$data['member']= $this->membermodel->getResult($sqlSelectMember);
			$this->load->view('member/member',$data);
		}
	}
?>