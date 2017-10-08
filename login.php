<?php
	require_once('auth.php');
	session_start();
	if (!$_POST['login'] || !$_POST['passwd'])
		die("Your username or login was empty. Fill in all feilds you moron. Have you never loged into anything before? IDIOT\n");
	if (auth($_POST['login'], $_POST['passwd']))
	{
		$_SESSION['login'] = $_POST['login'];
		print("You have succesfully loged in as " . $_POST['login'] . "\n");
	}
	else
	{
		$_SESSION['login'] = "";
		echo "your login or password was incorrect.\n";
	}
?>

<br/><a href="./index.html">Return home</a><br/>
