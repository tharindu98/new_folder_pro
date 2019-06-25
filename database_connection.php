<?php


//$connection=mysqli_connect('localhost','root','','new_db');

//if(mysqli_connect_errno())
//{
	//die('Database connection failed' . mysqli_connect_error());
//}


$servername = "localhost" ;
$username = "root" ;
$password = "" ;

try{

$connection=new PDO("mysql:host=$servername;dbname=new_db",$username,$password);

$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//echo "Connected Successfully";

}catch(PDOException $e){

 echo "Connection failed:".$e->getMessage();
}

?>