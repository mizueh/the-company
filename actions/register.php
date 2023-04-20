<?php
include "../classes/User.php";
// $first_name = $_POST['first_name'];

// echo $first_name;

// print_r($_POST);

//instantiate the class user
$user_obj = new User;

//call the method store to save the uer in the db
$user_obj->store($_POST);



?>