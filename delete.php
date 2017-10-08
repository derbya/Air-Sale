<?php
	require_once('admin.php');
	session_start();
if (!$_SESSION['login'])
	die("You are not logged in");
if ($_POST['login'] && $_POST['passwd'] && $_POST['passwd2'] && $_POST['submit'])
{
	if ($_POST['passwd'] != $_POST['passwd2'])
		die("Your passwords did not match <html><body><a href='deleteacc.html'>Go back</a></body></html>");
	$account = unserialize(file_get_contents('./private/passwd'));
	if ($account)
	{
		foreach ($account as $key => $arg)
		{
			if (admin($_SESSION['login']))
			{
				if ($arg['login'] === $_POST['login'])
				{
				unset($account[$key]);
				file_put_contents('./private/passwd', serialize($account));
				header('Location: index.html');
				die("The account has been deleted by an admin <html><body><a href='index.html'>home</a></body></html>");
				}
			}
			if ($arg['login'] === $_POST['login'] && $arg['passwd'] === hash('whirlpool', $_POST['passwd']))
			{
				unset($account[$key]);
				file_put_contents('./private/passwd', serialize($account));
				header('Location: index.html');
				die("Your account has been deleted <html><body><a href='index.html'>home</a></body></html>");
			}
		}
	}
}
?>
