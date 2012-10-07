<?php 
   
    class Login_Model extends CI_Model 
	{
		function __construct()
		{
			  parent::__construct();
		}
		function validate()
		{
			  $this->db->where('username',$this->input->post('username')); 
			  $this->db->where('password',md5($this->input->post('password')));
			  $query=$this->db->get('member'); 
			if($query->num_rows()==1)
			{
				  return true;
			}
			else
			return false;
		}
		
		function create_member()
		{
			  $data=array('first_name'=>$this->input->post('first_name'), 
			  'last_name'=>$this->input->post('last_name'), 
			  'mail_adress'=>$this->input->post('mail_adress'),
			  'username'=>$this->input->post('username'), 
			  'password'=>md5($this->input->post('password')) // if you use md5 or sha1, it will be better about security.
			  );
			  $result=$this->db->insert('member',$data); 
			  return $result; 
		}
	}
	