<?php require_once('database_connection.php'); ?>
<?php
session_start();
if(!isset($_SESSION['user_id'])){

    header('location:login.php');

}
$query="SELECT * FROM registration";
$result = $connection->prepare($query);
$result->execute();



if($result)
{

	$table='<table class="table table-striped" align="center">';
    $table.='<tr><th>id</th><th>nic</th><th>Name</th><th>Email</th><th>Password</th><th>Change_the_database</th></tr> <br>';
 
	foreach(($result->fetchAll()) as $k=>$record) { 
  
    
$table .= '<tr>';
$table.='<td>'.$record['id'].'</td>';
$table.='<td>'.$record['NIC'].'</td>';
$table.='<td>' .$record['Email']. '</td>';
$table .='<td>' .$record['Name']. '</td>';
$table.='<td>' . $record['Password']. '</td>';
 
 

//$encrypted_id = base64_encode('id');


$table.='<td><button class="btn btn-success" onclick="updatedata('.$record['id'].')">Update Data</button>
  &emsp; <button type="submit" class="btn btn-danger" name="delete"><a onclick="myFunction('.$record['id'].')">Delete</button> </td>';
}

	$table.='</tr>';
	$table.='</table>';
 
}



?>
<!DOCTYPE html>
<html>
<head>

	<title></title>
	<style >

	table{border-collapse: collapse;}
td,th{border:1px solid black;}

</style>

<link rel="stylesheet" type="text/css" href="css/button_query.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/common.css">
  <link rel="stylesheet" type="text/css" href="css/table_view.css">
  <h1><center>MAIN</center></h1>
</head>
<body>
    <div class="log">
<form action="logout.php" method="post">
    <span class="glyphicon glyphicon-log-out"></span> Log out
<input type="submit" class="btn btn-info btn-lg" name="logout" value="Logout">

</form>
</div>

	<hr><hr>
&ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;	


<div class="animation">
<?php echo $table; ?>
</div>
<script>
function myFunction(id) {
    var x;
    if (confirm("Are you sure?") === false)
     {
    	
        window.location="table_view.php";
        return true;
    } else  
    {
    	
    	window.location="delete.php?id="+id;
        
        return true;
    }
    document.getElementById("demo").innerHTML = x;
}

function updatedata(id)
{
 
 
<?php $encrypted_id = base64_encode('id');  ?>

   
    	window.location="update.php?id=<?php echo $encrypted_id; ?>";
        
        
        return true;
 
}

</script>

</body>
</html>

<?php $connection = null; ?>