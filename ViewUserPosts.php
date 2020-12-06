<?php

$mysqli = new mysqli("mysql.eecs.ku.edu","lukebeesley","fischer","lukebeesley");

$un = $_POST["uname"];
$sq = "'";
$query = "SELECT content FROM Posts WHERE author_id = " . $sq . $un . "'";

//echo $query;

echo "<table>";
if ($result = $mysqli->query($query))
{
	while($row = $result->fetch_assoc())
	{
		echo "<tr><td>";
		echo $row["content"];
		echo "</td></tr>";
	}
	$result->free();
}
echo "</table>";

$mysqli->close();


?>
