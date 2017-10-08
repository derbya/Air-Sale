<?php
if ($_POST['passwd'] != $_POST['passwd2'])
	die("Your password does not match\n");
if ($_POST['submit'] != 'OK')
	die("ERROR\n");
if (!$_POST['login'] || !$_POST['passwd'])
	die("ERROR\n");
if (!file_exists('./private'))
	mkdir("private", 0700);
if (file_exists('./private/passwd'))
{
	$auth = unserialize(file_get_contents('./private/passwd'));
	foreach ($auth as $acc)
	{
		if ($acc['login'] === $_POST['login'])
		{
			die("ERROR\n");
		}
	}
}
$new['login'] = $_POST['login'];
$new['passwd'] = hash('whirlpool', $_POST['passwd']);
if ($_POST['adminpass'] === "a")
	$new['admin'] = true;
else
	$new['admin'] = false;
$auth[] = $new;
file_put_contents("./private/passwd", serialize($auth));
print("Your account has been created " . $_POST['login'] . "!\n")
?>

<br/><a href="index.html">Return home</a><br/>
