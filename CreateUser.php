<?php

$mysqli = new mysqli("mysql.eecs.ku.edu","lukebeesley","fischer","lukebeesley");

$username = $_POST["uname"];

if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}


//check string length
if(strlen($username) == 0)
{
	echo "Unsuccessful, given username was blank";
}
else
{
	//check database for username
	//$query = "SELECT user_id FROM Users";
	$quo = "'";
	$queue2 = "INSERT INTO Users (user_id) VALUES (" . $quo .  $username . $quo . ")";

	$queue1 = "SELECT user_id FROM Users";

	if($result = $mysqli -> query($queue1))
	{
		$included = 0;
		while ($row = $result->fetch_assoc())
		{
			if($row["user_id"] == $username)
			{
				$included = 1;
			}
		}
		$result->free();

		//echo $included;

		//if username is not in queue, add, else send error
		if(!$included)
		{
			//echo "Successful, username was added";
			//add username
			if($mysqli -> query($queue2))
			{
				echo "Successful, username was added";
				$result -> free_result();
			}

		}
		else
		{
			echo "Unsuccessful, given username is already in database";
		}
	}
}

$mysqli->close();

?>
