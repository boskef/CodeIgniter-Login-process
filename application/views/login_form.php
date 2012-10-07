<?php 
  echo form_open(base_url().'login/sign_in'); 
  echo form_input('username','Username'); 
  echo form_password('password','Password'); 
  echo form_submit('sign in','Sign in'); 
  form_close();
  
  echo anchor(base_url().'login/sign_up','Create Account'); 
  ?>
  