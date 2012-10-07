<?php 
    echo form_open(base_url().'login/create_account'); 
	echo form_input('username','Username'); 
	echo form_password('password','Password'); 
	echo form_input('first_name','First_name'); 
	echo form_input('last_name','Last_name'); 
	echo form_input('mail_adress','Mail adress'); 
	echo form_submit('signup','Signup'); 
	?>
	