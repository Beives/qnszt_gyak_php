<?php
    define("TITLE", "Admin | Basic restaurant");
    include('admin_includes/header.php');
?>

<?php include('admin_includes/footer.php'); ?>

<?php
if(isset($_POST['submit'])){
$query="insert into menu_items(title,price,blurb,drink) values ('".$_POST['title']."','".$_POST['price']."','".$_POST['blurb']."','".$_POST['drink']."')";
mysqli_query($conn, $query) or die ("Nem sikerült".mysqli_error($conn));
mysqli_close($conn);
echo "<script>alert('Sikeres!')</script>";
}
?>
<H1>Menű felvétele!</H1>
<div>
    <a href="menu_info.php">Menu Info</a>
</div>
<div>
  <form action="menu.php" method="post" enctype="multipart/form-data">
   <input type="text" name="title" placeholder="Title"><br>
  <input type="number" name="price" placeholder="Price"><br>
  <input type="text" name="blurb" placeholder="Blurb"><br>
    <input type="text" name="drink" placeholder="Drink"><br>

  <input type="submit" value="Submit" name="submit"></br>
  </form></div>