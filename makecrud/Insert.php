<?php
require_once 'classcontact.php'; 


$contact = new classcontact();


$res = $contact->insert('081273645', 'maliki'); 

echo $res; 
?> 
