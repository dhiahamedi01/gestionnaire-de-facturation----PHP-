<?php session_start();

include('database connection.php');

if(isset($_POST['login']))
{

$user_unsafe=$_POST['username'];
$pass_unsafe=$_POST['password'];

$user = mysqli_real_escape_string($con,$user_unsafe);
$pass = mysqli_real_escape_string($con,$pass_unsafe);

$query=mysqli_query($con,"select * from users where Username='$user' and Password='$pass'")or die(mysqli_error($con));
	$row=mysqli_fetch_array($query);
           
			$name=$row['Username'];
			$id=$row['ID'];
			$test=$row['Level'];
           $counter=mysqli_num_rows($query);
           
	  	if ($counter == 0) 
		  {	
		  echo "<script type='text/javascript'>alert('Invalid Username or Password!');
		  document.location='login.php'</script>";
		  } 
	  else if($test==1)
		  {
			$_SESSION['id']=$id;	
			$_SESSION['username']=$name;
	    echo "<script type='text/javascript'>document.location='../project-m/Index.php'</script>";
	  }else if($test==2){
		$_SESSION['id']=$id;	
		$_SESSION['username']=$name;
	    echo "<script type='text/javascript'>document.location='../project-m/Index1.php'</script>";
	  }
}	 
?>

