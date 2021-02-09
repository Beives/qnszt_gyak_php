<?php
    define("TITLE", "Admin | Basic restaurant");
    include('admin_includes/header.php');
?>
<?php
		$DB_user="root";
		$DB_passwd="";
		$DB_name="qnszt_gyak";
		$DB_host="localhost";
		$con = mysqli_connect($DB_host,$DB_user,$DB_passwd,$DB_name);
		$con->set_charset("UTF8");
?>

<H1>Messages list!</H1>
<form method="post">
    <input type="text" name="search" placeholder="Keresés a táblában">
    <input type="submit" value="Keresés" name="keres">
</form>
	</form>
	<table>
	<tr>
		<td>Nev</td>
		<td>Email</td>
		<td>Message</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>


<?php
$query="SELECT * FROM messages";
$result=mysqli_query($con, $query);
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
	mysqli_query($con, $Del);
}
mysqli_close($con);?>
