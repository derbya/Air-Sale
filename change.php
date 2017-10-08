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
				if ($arg['login'] === $_SESSION['login'] && $arg['passwd'] === hash('whirlpool', $_POST['oldpw']))
				{
					$account[$key]['passwd'] = hash('whirlpool', $_POST['newpd']);
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
