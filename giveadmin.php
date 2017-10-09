<?php
session_start();
if ($_SESSION['login'] && $_SESSION['admin'])
{
	$account = unserialize(file_get_contents('./private/passwd'));
	if ($account)
	{
		foreach ($account as $key => $arg)
		{
			if ($_SESSION['admin'] == true)
			{
				if ($arg['login'] === $_POST['login'])
				{
					$account[$key]['admin'] = true;
					echo "the user has been given admin rights\n";
					break;
				}
			}
		}
	}
}
else
{
	echo "You must be logged in as an admin to access this";
}
?>
