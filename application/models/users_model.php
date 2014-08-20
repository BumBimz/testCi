<?php 

class Users_model extends CI_Model {
     
    /**
     * Constructor 
     *
     */
     
    function __Construct()
    {
        parent::__Construct();
    }
    
    
    // --------------------------------------------------------------------
        
    /**
     * Get Users
     *
     * @access  private
     * @param   array   conditions to fetch data
     * @return  object  object with result set
     */
     function getUsers($conditions=array(),$fields='')
     {
        
        parent::__construct(); 
        
        
        if(count($conditions)>0)        
            $this->db->where($conditions);
            
        $this->db->from('member');

        $this->db->order_by("member.member_id", "asc");

        
        if($fields!='')
                $this->db->select($fields);
        else        
            $this->db->select('member.member_id,member.member_user,member.member_first_name,member.online');
        
        $result = $this->db->get();
        
        return $result;
        

      }//End of getUsers Function
 }
 
 ?>