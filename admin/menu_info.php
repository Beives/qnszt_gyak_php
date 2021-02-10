<?php
    define("TITLE", "Admin | Basic restaurant");
    include('admin_includes/header.php');
?>

<H1>Menu list!</H1>
<div>
    <a href="menu.php">Menu</a>
</div>
<form method="post">
    <input type="text" name="search" placeholder="Keresés a táblában">
    <input type="submit" class="btn btn-success" value="Keresés" name="keres">


</form>
<table>
<tr>
<td><a href="menu_info.php?Rendezes=title" >Title</a></td>
<td><a href="menu_info.php?Rendezes=price">Price</a></td>
<td><a href="menu_info.php?Rendezes=blurb">Blurb</a></td>
<td><a href="menu_info.php?Rendezes=drink">Drink</a></td>
</tr>


<?php
$query="SELECT * FROM menu_items";
if(isset($_POST['keres'])){
        $searchq = $_POST['search'];
        $query .= " WHERE
            LOWER(title) LIKE '$searchq' OR
            LOWER(price) LIKE '$searchq' OR
            LOWER(blurb) LIKE '$searchq' OR 
			LOWER(drink) LIKE '$searchq' 
        ";
    }
if(isset($_GET["Rendezes"]))
{
$query.=" order by ".$_GET["Rendezes"];
}
$result=mysqli_query($conn, $query);
while ($row=mysqli_fetch_assoc($result))
{
echo '<tr>
<td>'.$row["title"].'</td> 
<td>'.$row["price"].'</td>
<td>'.$row["blurb"].'</td>
<td>'.$row["drink"].'</td>
<td>
<a href="menu_edit.php?modosit='.$row["id"].'">
		<input type="submit" class="btn btn-warning col-10" name="submit" value="Edit"></a></td>
<td>
<form action="menu_info.php" method="post">
<input type="hidden" name="id" value="'.$row["id"].'">
		<input type="submit" class="btn btn-warning col-8" name="submit" value="Delete">
</form></td></tr>';
}
if(isset($_POST["submit"]))
{
	$Deletequery="delete from menu_items where id=".$_POST["id"];
	mysqli_query($conn, $Deletequery);
}
mysqli_close($conn);?>

<?php include('admin_includes/footer.php'); ?>
