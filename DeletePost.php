<?php
$ind = $_POST["index"];

$mysqli = new mysqli("mysql.eecs.ku.edu","lukebeesley","fischer","lukebeesley");

if(empty($ind))
{
	echo "No posts were deleted";
}
else
{

	$n = count($ind);
	for($i = 0; $i < $n; $i++)
	{
		$pn = "'";
		$queue = "DELETE FROM Posts WHERE post_id = " . $pn . $ind[$i] . "'";
		//echo $queue . "<br>";
		if($mysqli->query($queue))
		{
			echo "Post " . $ind[$i] . " has been deleted<br>";
		}
	}
}
?>
