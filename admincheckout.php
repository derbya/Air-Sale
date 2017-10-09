<?php

$tcart = 0;
$rem = 0;

session_start();
if ($_SESSION['login'])
{
	if (!file_exists('./private'))
	{
		mkdir("./private");
	}
	if (!file_exists('./private/checkout'))
	{
		file_put_contents('./private/cart', null);
	}
	$cart = unserialize(file_get_contents('./private/cart'));
	foreach ($basket as $key => $arg)
	{
		print_r($basket[$key]);
	}
	else
	{
		echo "We cannot remove 0 things.\n";
	}
}
else
	echo "You must be logged in to remove items in cart.";
?>
	<br/><a href="./index.html">home</a><br/>
