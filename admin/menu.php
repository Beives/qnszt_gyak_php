<?php
    define("TITLE", "Admin | Basic restaurant");
    include('admin_includes/header.php');
?>


<?php
if(isset($_POST['submit'])){
$query="insert into menu_items(title,price,blurb,drink) values ('".$_POST['title']."','".$_POST['price']."','".$_POST['blurb']."','".$_POST['drink']."')";
mysqli_query($conn, $query) or die ("Nem sikerült".mysqli_error($conn));
mysqli_close($conn);
echo "<script>alert('Sikeres!')</script>";
}
?>
<h1>Menű felvétele!</h1>
<div>
    <a href="menu_info.php">Menu Info</a>
</div>
<div>
  <form action="menu.php" method="post" enctype="multipart/form-data">
   <input type="text" name="title" placeholder="Title" class="form-control"><br>
  <input type="number" name="price" placeholder="Price" class="form-control"><br>
  <input type="text" name="blurb" placeholder="Blurb" class="form-control"><br>
    <input type="text" name="drink" placeholder="Drink" class="form-control"><br>

<tr><td><td><input type="submit" class="btn btn-warning" col-3" value="Add" name="submit"> </td></td></tr>
  </form></div>
<?php include('admin_includes/footer.php'); ?>
