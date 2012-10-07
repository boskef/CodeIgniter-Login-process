<?php 
   
     class Login extends CI_Controller 
	 {
		 
		    function index()
			{
				  $data['main_content']='login_form';//This statement will call login_form.php file in template file.
				  $this->load->view('template',$data); //We're loading template view page.
			}
			
			  function sign_in()
			  {
				     $this->load->model('login_model'); 
					$q=$this->login_model->validate(); 
					if($q)
					{
					     $data=array('username'=>$this->input->post('username'), 
						'is_logged_in'=>true);
						$this->session->set_userdata($data); 
						redirect(base_url().'login/members_page'); //redirecting members_page function. 
					}
					else
					  {
						 $this->index(); 
					  }
					  }
			  
			  function sign_up()
			  {
				    $data['main_content']='sign_up_form'; 
					$this->load->view('template',$data); 
			  }
			  function create_account()
			  {  
				     $this->load->library('form_validation'); 
					 $this->form_validation->set_rules('first_name','First Name','required|trim|min_length[4]'); 
					 $this->form_validation->set_rules('last_name','Last Name','required|trim|min_length[4]'); 
					 $this->form_validation->set_rules('mail_adress','Mail Adress','required|trim|valid_email'); 
					 $this->form_validation->set_rules('username','Username','required|trim|min_length[4]'); 
					 $this->form_validation->set_rules('password','Password','required|trim|min_length[4]|mex_length[30]');
					 if($this->form_validation->run()==FALSE)
					 {
						  $this->sign_up(); 
					 }
					 else
					   {
						   $this->load->model('login_model'); 
						   if($this->login_model->create_member())
						   {
							    $data['main_content']='success_page'; 
								$this->load->view('template',$data); 
						   }
						   else
						     {
								   $this->create_account(); 
							 }
						   
					   }
			  }
			  function members_page()
			  {
				   
					
				   $data['main_content']='members_page'; 
				   $this->load->view('template',$data); 
				  
				  
			  }
			  function logout()
			  {
				    $this->session->unset_userdata($this->sess_vars); 
					$this->session->sess_destroy(); 
					$this->index();
			  }
	 }
	 ?>