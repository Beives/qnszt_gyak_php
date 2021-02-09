<?php
    define("TITLE", "Admin | Basic restaurant");
    include('admin_includes/header.php');
?>
<H1>Message list!</H1>
<form method="post">
    <input type="text" name="search" placeholder="Keresés a táblában">
    <input type="submit" value="Keresés" name="keres">
</form>
	</form>
	<table>
	<tr>
		<td>Name</td>
		<td>Email</td>
		<td>Message</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>


<?php
$query="SELECT * FROM messages";
$result=mysqli_query($conn, $query);
while ($row=mysqli_fetch_assoc($result))
{
echo 
	'<tr>
		<td>'.$row["name"].'</td> 
		<td>'.$row["email"].'</td>
		<td>'.$row["message"].'</td>
	<td>
		<a href="messages_edit.php?edit='.$row["id"].'">
		<input type="submit" name="submit" value="Edit"></a></td>
	<td>
	<form action="messages_info.php" method="post">
		<input type="hidden" name="id" value="'.$row["id"].'">
		<input type="submit" name="submit" value="Delete">
	</form></td></tr>';
}
if(isset($_POST["submit"]))
{
	$Del="DELETE From messages where id=".$_POST["id"];
	mysqli_query($conn, $Del);
}
mysqli_close($conn);?>
