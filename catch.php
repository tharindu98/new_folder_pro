<?php

$connection=mysqli_connect('localhost','root','','new_db');

if(mysqli_connect_errno())
{
	die('Database connection failed' . mysqli_connect_error());
}


?>