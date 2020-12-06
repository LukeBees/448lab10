<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "lukebeesley", "fischer", "lukebeesley");

	if($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	$user = $_POST["uname"];
	$post = $_POST["post"];

	if(strlen($post) == 0)
	{
		echo "Cannot add empty post";
	}
	else
	{
		//boolean value for whether given user is included in database
		$userincluded = 0;
		$useQueue = "Select user_id FROM Users";
		if($result = $mysqli -> query($useQueue))
		{
			while($row = $result->fetch_assoc())
			{
				if($row["user_id"] == $user)
				{
					$userincluded = 1;
				}
			}
			$result->free();
		}

		if($userincluded == 1)
		{
			$par = "'";
			$postqueue = "INSERT INTO Posts (content, author_id) VALUES (" . $par . $post . "','" . $user . "')";

			if($mysqli -> query($postqueue))
			{
				echo "Post added!";
			}
		}
		else
		{
			echo "Username cannot be found in database";
		}
		//$queue1

	}

	$mysqli->close();
?>
