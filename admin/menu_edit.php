<?php
    define("TITLE", "Admin | Basic restaurant");
    include('admin_includes/header.php');
?>


<?php
$query="select * from menu_items where id=".$_GET["modosit"];
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
if(isset($_POST['submit'])){
$Modquery="update menu_items set title='".$_POST["title"]."',price='".$_POST["price"]."',blurb='".$_POST["blurb"]."',drink='".$_POST["drink"]."' where id=".$_GET["modosit"];
mysqli_query($conn, $Modquery) or die ("Nem sikerült".mysqli_error($conn));
mysqli_close($conn);
echo '<meta http-equiv="refresh" content="0;url=menu_info.php">';
}
?>
<H1>Menu edit!</H1>
<table>
<form action="menu_edit.php?modosit=<?php echo $_GET["modosit"];?>" method="post" enctype="multipart/form-data">
<tr><td><label for="title">Title:</label></td><td><input type="text" name="title" value="<?php echo $row["title"];?>"></td></tr>
<tr><td><label for="price">Price:</label></td><td><input type="number" name="price" value="<?php echo $row["price"];?>"></td></tr>
<tr><td><label for="blurb">Blurb:</label></td><td><input type="text" name="blurb" value="<?php echo $row["blurb"];?>"></td></tr>
<tr><td><label for="drink">Drink:</label></td><td><input type="text" name="drink" value="<?php echo $row["drink"];?>"></td></tr>
<tr><td></td><td><input type="submit" value="Edit	" name="submit"></td>
</form></table>

<?php include('admin_includes/footer.php'); ?>