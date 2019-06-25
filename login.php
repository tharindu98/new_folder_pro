
<?php require_once('database_connection.php'); ?>
<?php 


session_start();


if(isset($_POST['submit'])){
   

        $email =$_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM registration WHERE Email = '{$email}' AND Password='{$password}' LIMIT 1";

        $stmt = $connection->prepare($query);

        $stmt->execute();

        $result = $stmt->rowCount();

       

        if($result == 1){

            
               
               $user = $stmt -> fetch(PDO::FETCH_ASSOC);
               $_SESSION['user_id'] = $user['id'];
               
        
                header('Location: table_view.php');

            }
            
            
       
        
   


}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    
     <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="jQuery-Validation-Engine-master/css/validationEngine.jquery.css">
    <title>Login</title>
  
</head>
<body>
<div class="login">
  <form action="login.php" id="regform" method="post">
    <fieldset>
     
    <legend><h2>Log In</h2></legend>

    <?php 
    
 //   if(isset($errors) && !empty($errors)){
//        echo '<p class="error">Invalid Username/Password</p>' ;
//  }  
    ?>


Email:<input type="text" name="email" class="validate[required,custom[email]]" placeholder="Email Address"><br>
password:<input type="password" name="password" class="validate[required]" placeholder="Password"><br>
<a href="registration.php"><center>Register Now</center></a><br>
<input type="submit" name="submit" value="Login">



</fieldset>
 </form>
 </div>
 <script src="jQuery-Validation-Engine-master\js/jquery-1.8.2.min.js"></script>

<script src="jQuery-Validation-Engine-master\js\languages/jquery.validationEngine-en.js"></script>

<script src="jQuery-Validation-Engine-master\js\jquery.validationEngine.js"></script>

<script>

$(document).ready(function()
{
    $("#regform").validationEngine();

});
</script>
</body>
</html>

<?php $connection=null; ?>