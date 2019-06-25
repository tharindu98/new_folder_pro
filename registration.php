<?php require_once('database_connection.php'); ?>

<?php 


if(isset($_POST['submit']))
{


$nic=$_POST["nic"];
$name=$_POST["name"];
$email=$_POST['email'];

$emailval = $email;

if (filter_var($emailval, FILTER_VALIDATE_EMAIL)) {
  
    


if($_POST["password"] == $_POST["re-enter"])
 {
    $password=$_POST['password'];
    
//$query="INSERT INTO registration(id,NIC,Name,Email,Password) VALUES (NULL,'$nic','$name','$email','$password')" ;

//$result=mysqli_query($connection,$query);

 $sql = "INSERT INTO registration (id,NIC,Name,Email,Password)
    VALUES (NULL,'$nic','$name','$email','$password')";
    // use exec() because no results are returned
    $connection->exec($sql);
   

if($connection)
{

function phpAlert($msg) 
{
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';


}

phpAlert(   "One Added Successfully"   );  

}
else
{
  function existingmail($notice)
  {
    echo '<script type="text/javascript">alert("'.$notice.'")</script>';
  }
  existingmail("This Email or nic already saved");
}
 }
 

    }


else
{
    
    echo '<script language="javascript">';
    echo 'alert("Password is not matching")';
    echo '</script>';
    
 }

}


 

 if(isset($_POST['home'])){

    header('location:login.php');
 }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet"  href="css/registration.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">

     <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="jQuery-Validation-Engine-master/css/validationEngine.jquery.css">

    <title>Registration</title>
    <h1>Registration</h1>
</head>
<body>
    
<div class="registration">
  <form action="registration.php" id="regstr" method="post">
    <fieldset>
     
    
NIC:<input type="text" id="nic" class="validate[required]" name="nic"><br>
Name:<input type="text" id="name" class="validate[required]" name="name"><br>
Email:<input type="text" id="email" class="validate[required,custom[email]]" name="email"><br>
password:<input type="password" id="pass" class="validate[required]" name="password" ><br>
Re-enter password:<input type="password"  name="re-enter"  class="validate[required,equals[pass]]" placeholder="re-enter password"><br>
<input type="submit" name="submit" value="Register">




</fieldset>
 </form>
 <form  method="post">
   <input type="submit" name="home" value="Back to Login">
 </form>
 
 </div>


 <script src="jQuery-Validation-Engine-master\js/jquery-1.8.2.min.js"></script>

<script src="jQuery-Validation-Engine-master\js\languages/jquery.validationEngine-en.js"></script>

<script src="jQuery-Validation-Engine-master\js\jquery.validationEngine.js"></script>

<script>

$(document).ready(function()
{
    $("#regstr").validationEngine();

});
</script>
</body>
</html>
<?php $connection = null;?>