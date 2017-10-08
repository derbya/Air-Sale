<?php
	require_once('auth.php');
	require_once('admin.php');
	session_start();
	if (!$_POST['login'] || !$_POST['passwd'])
		die("Your username or login was empty. Fill in all feilds you moron. Have you never loged into anything before? IDIOT\n");
	if (auth($_POST['login'], $_POST['passwd']))
	{
		$_SESSION['login'] = $_POST['login'];
		if (admin($_POST['login']))
		{
			$_SESSION['admin'] = true;
			echo "You have succesfully logged in and have admin rights.";
		}
		else
			print("You have succesfully loged in as " . $_POST['login'] . "\n");
	}
	else
	{
		$_SESSION['login'] = "";
		echo "your login or password was incorrect.\n";
	}
?>

<br/><a href="./index.html">Return home</a><br/>
