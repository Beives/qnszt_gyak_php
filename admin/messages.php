<?php
    define("TITLE", "Admin | Basic restaurant");
    include('admin_includes/header.php');
?>
<?php
		$DB_user="root";
		$DB_passwd="";
		$DB_name="qnszt_gyak";
		$DB_host="localhost";
		$con=mysqli_connect($DB_host,$DB_user,$DB_passwd,$DB_name);
		$con->set_charset("UTF8");

if(isset($_POST['submit'])){
	$query="Insert into messages(name,email,message) values ('".$_POST['name']."','".$_POST['email']."','".$_POST['message']."')";
	mysqli_query($con, $query) or die ("Hiba".mysqli_error($con));
	mysqli_close($con);
}
?>
<H1>Üzenetek hozzáadása!</H1>
  <div class="form" align="center">
  <form action="messages.php" method="post" enctype="multipart/form-data">
  <input type="text" name="name" placeholder="Name"><br>
  <input type="text" name="email" placeholder="Email"><br>
  <input type="text" name="message" placeholder="Message"><br>

  <input type="submit" value="Add_Database" name="submit"></br>
  </form></div>


<?php include('admin_includes/footer.php'); ?>