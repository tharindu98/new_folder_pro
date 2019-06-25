<?php require_once('database_connection.php'); ?>

<?php

session_start();
if(!isset($_SESSION['user_id'])){

    header('location:login.php');

}

if(isset($_POST['update'])){
  
$id=$_POST['id'];
$nic=$_POST['nic'];
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];





//UPDATE table-name 
  // SET column-name = value, column-name = value, ...
    


$query="UPDATE registration SET NIC='$nic',Name='$name',Email='$email',Password='$password' WHERE id=$id" ;

$stmt = $connection->prepare($query);

$stmt->execute();

$result = $stmt->rowCount();

if($result == 1)
{

echo "<script type='text/javascript'>alert('successfully updated')</script>";
header('Location: table_view.php');
}else{
  echo "database failed";
}
}

if(isset($_GET['id']))
{

  $id = $_GET['id'];
  $decrypted_id = base64_decode($id);
  $query = "SELECT * FROM registration WHERE id=$decrypted_id ";
  $stmt = $connection->prepare($query);
  $stmt->execute();

  $row = $stmt -> fetch(PDO::FETCH_ASSOC);
  
}
if(isset($_POST['home']))
{
  header('Location: table_view.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/update.css">
    <title>Update</title>
    <h1>Update</h1>
</head>
<body>
    
<div class="update">
 <form action="update.php" method="post">
    <fieldset>
  ID:<input type="text" name="id" value="<?php echo @$row['id'] ?>" > <br>
  NIC:<input type="text" name="nic" value="<?php echo @$row['NIC'] ?>" > <br>
  Name:<input type="text" name="name" value="<?php echo @$row['Name'] ?>" placeholder="" ><br>
  Email:<input type="text" name="email" value="<?php echo @$row['Email'] ?>"><br>
Password:<input type="text" name="password" value="<?php echo @$row['Password'] ?>"><br>


<input type="submit" name="update" value="update">
<input type="submit" name="home" value="home">


</fieldset>

 </form>
</div>

</body>
</html>
<?php $connection = null; ?>