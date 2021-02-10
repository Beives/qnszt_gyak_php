<?php
$username="root";
$passwd="";
$dbname="qnszt_gyak";
$szerver="localhost";
$con=mysqli_connect($szerver,$username,$passwd,$dbname);
$con->set_charset("UTF8");
session_start();
if(isset($_POST['submit'])){
	$uname=$_POST['name'];
  $password=$_POST['password'];

  $sql="SELECT * FROM admin WHERE name='".$uname."' AND password='".$password."' LIMIT 1";

  $result=mysqli_query($con,$sql);

  if($result==1){
    header("Location: ./index.php");
    $_SESSION['name']=$uname;
    exit();
  }
  else{
    echo "Sikertelen belépés!";
    exit();
  }
}
?>
<div class="form">
	<form action="login.php" method="post" enctype="multipart/form-data">
				<label for="name">Name:</label>
				<input type="text" name="name" placeholder="Név" required><br>
				<label for="password">Password: </label><br>
				<input type="password" name="password" placeholder="Jelszó" required><br>
	    	<br>
				<input type="submit" value="Belépés" name="submit"></br>
				<a href="../index.php">Back</a>
	</form>			
			
			
</div>
<style>
input[type=text]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=password]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #d3d3d3;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
button{
	width: 100%;
	background-color: #d3d3d3;
	color: black;
	padding: 14px 20px;
	margin: 8px 0;
	border: none;
	border-radius: 4px;
	cursor: pointer;
}


input[type=submit]:hover {
  background-color: #45a049;
}

.form {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
.navbar {
  overflow: hidden;
  background-color: #333;
  position: sticky;
  position: -webkit-sticky;
  top: 0;
}

/* Style the navigation bar links */
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}


/* Right-aligned link */
.navbar a.right {
  float: right;
}

/* Change color on hover */
.navbar a:hover {
  background-color: #ddd;
  color: black;
}

/* Active/current link */
.navbar a.active {
  background-color: #666;
  color: white;
}
</style>
