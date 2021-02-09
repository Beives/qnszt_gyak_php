<?php
    define("TITLE", "Admin | Basic restaurant");
    include('admin_includes/header.php');
?>

<?php include('admin_includes/footer.php'); ?>

<?php
$username="root";
$passwd="";
$dbname="qnszt_gyak";
$szerver="localhost";
$con=mysqli_connect($szerver,$username,$passwd,$dbname);
$con->set_charset("UTF8");
?>
<H1>Menu list!</H1>
<div>
    <a href="menu.php">Menu</a>
</div>
<form method="post">
    <input type="text" name="search" placeholder="Keresés a táblában">
    <input type="submit" value="Keres" name="keres">


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
$result=mysqli_query($con, $query);
while ($row=mysqli_fetch_assoc($result))
{
echo '<tr>
<td>'.$row["title"].'</td> 
<td>'.$row["price"].'</td>
<td>'.$row["blurb"].'</td>
<td>'.$row["drink"].'</td>
<td>
<a href="menu_edit.php?modosit='.$row["id"].'">
<input type="submit" name="submit" value="Edit"></a></td>
<td>
<form action="menu_info.php" method="post">
<input type="hidden" name="id" value="'.$row["id"].'">
<input type="submit" name="submit" value="Delete">
</form></td></tr>';
}
if(isset($_POST["submit"]))
{
	$Deletequery="delete from menu_items where id=".$_POST["id"];
	mysqli_query($con, $Deletequery);
}
mysqli_close($con);?>