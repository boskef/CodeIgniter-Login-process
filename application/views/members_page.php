<?php 
 
  echo '<b>Welcome'.'   '.$this->session->userdata('username'). '  '.', you are now on members page!';
  echo '<br />If you wanna logout, you should click '.anchor(base_url().'login/logout','that link').'</b>'; 
  
  ?>
  