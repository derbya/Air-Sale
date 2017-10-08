<?php
session_start();
if ($_SESSION['login'])
{
	if ($_POST['oldpw'] && $_POST['newpw'] && $_POST['newpw2'] && $_POST['submit'])	
	{
		$check = 1;
		if ($_POST['newpw'] != $_POST['newpw2'])
			die("Your passwords did not match. <('^')>");
		$account = unserialize(file_get_contents('./private/passwd'));
		if ($account)
		{
			foreach ($account as $key => $arg)
			{
				if ($_SESSION['admin'] == true)
				{
					if ($arg['login'] === $_POST['login'])
					{
					$account[$key]['passwd'] = hash('whirlpool', $_POST['newpw']);
					file_put_contents('./private/passwd', serialize($account));
					echo "the users password has been changed you are admin\n";
					break;
					}
				}
				else if ($arg['login'] === $_SESSION['login'] && $arg['passwd'] === hash('whirlpool', $_POST['oldpw']))
				{
					$account[$key]['passwd'] = hash('whirlpool', $_POST['newpw']);
					file_put_contents('./private/passwd', serialize($account));
					echo "Your password has been changed\n";
					break;
				}
			}
		}
	}
}
else
{
	echo "You must be logged in to change your password <('.'<) (>'.')>";
}
?>
