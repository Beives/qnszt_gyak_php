<?php
    define("TITLE", "Admin | Basic restaurant");
    include('admin_includes/header.php');
?>

<?php 
	if(isset($_POST['submit'])){
		$query="INSERT Into messages(name,email,message) values ('".$_POST['name']."','".$_POST['email']."','".$_POST['message']."')";
		mysqli_query($conn, $query) or die ("Hiba".mysqli_error($conn));
		mysqli_close($conn);
	}
?>

  <H1>Üzenetek hozzáadása!</H1>
 <div>
    <a href="messages_info.php">Messages List</a>
</div>
  <div class="form">
  <form action="messages.php" method="post" enctype="multipart/form-data">
  <input type="text" name="name" placeholder="Name"><br>
  <input type="text" name="email" placeholder="Email"><br>
  <input type="text" name="message" placeholder="Message"><br>

  <input type="submit" value="Add" name="submit"></br>
  </form></div>
<?php include('admin_includes/footer.php'); ?>