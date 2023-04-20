<?php
include "../classes/user.php";

//create an obj
$user = new User;

// Call the method
$user->login($_POST);
//$_POST holds all data from the form