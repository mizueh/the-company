<?php
require '../classes/User.php';

$user = new User;

$user->delete($_POST);
?>