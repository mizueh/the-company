<?php
require '../classes/User.php';

$user = new User;
// die(var_dump($_POST));
// die(var_dump($_FILES));

// Pass all the input and pictures from the form
//into the function
$user->update($_POST, $_FILES);


?>