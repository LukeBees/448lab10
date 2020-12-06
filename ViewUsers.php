<?php
$mysqli = new mysqli("mysql.eecs.ku.edu","lukebeesley","fischer","lukebeesley");

if($mysqli->connect_errno)
{
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$queue = "SELECT user_id FROM Users";

echo "<table>";

if ($result = $mysqli->query($queue))
{
	while($row = $result->fetch_assoc())
	{
		echo "<tr><td>", $row["user_id"], "</td></tr>";
		//echo "<tr><td>", $row["user_id"], "</td></tr>";
	}

	$result->free();
}

echo "</table>";


$mysqli->close();
?>
