<?php require_once('database_connection.php'); ?>
<?php


$id=$_REQUEST['id'];

$query= "DELETE FROM registration WHERE id = $id LIMIT 1 ";

$count = $connection->exec($query);

  
  

 if($count == 1)
 {

  header('Location: table_view.php');

 }else

 {
  echo  "<script type='text/javascript'>alert('not deleted successfully!')</script>";
 }


?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Query</title>
	 <link rel="stylesheet"  href="css/registration.css">
</head>
<body>

</body>
</html>
<?php $connection = null; ?>