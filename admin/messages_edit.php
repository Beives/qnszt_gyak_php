<?php
    define("TITLE", "Admin | Basic restaurant");
    include('admin_includes/header.php');
?>
<?php
		$query="SELECT * from messages where id=".$_GET["edit"];
		$result=mysqli_query($conn, $query);
		$row=mysqli_fetch_array($result);
		if(isset($_POST['submit'])){
		$Edit="UPDATE messages set name='".$_POST["name"]."',email='".$_POST["email"]."',message='".$_POST["message"]."' WHERE id=".$_GET["edit"];
		mysqli_query($conn, $Edit) or die ("Nem sikerült".mysqli_error($conn));
		mysqli_close($conn);
		echo '<meta http-equiv="refresh" content="0;url=messages_info.php">';
		}
?>
<H1>Messages edit!</H1>
<table class="table ">
<form action="messages_edit.php?edit=<?php echo $_GET["edit"];?>" method="post" enctype="multipart/form-data">
<tr><td><label for="name">Name:</label></td><td><input type="text"  name="name" value="<?php echo $row["name"];?>"></td></tr>
<tr><td><label for="email">Email:</label></td><td><input type="text" name="email" value="<?php echo $row["email"];?>"></td></tr>
<tr><td><label for="message">Message:</label></td><td><input type="text" name="message" value="<?php echo $row["message"];?>"></td></tr>
<tr><td><td><input type="submit" class="btn btn-dark col-3" value="Edit" name="submit"> </td></td></tr>
</form></table>
<?php include('admin_includes/footer.php'); ?>