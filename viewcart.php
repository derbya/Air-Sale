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
	if (!file_exists('./private/cart'))
	{
		file_put_contents('./private/cart', null);
	}
	$cart = unserialize(file_get_contents('./private/cart'));
	$temp['login'] = $_SESSION['login'];
	foreach ($cart as $key => $arg)
	{
		if ($arg['login'] === $_SESSION['login'])
		{
			print_r($cart[$key]]);
		}
	}
	if (!$tcart)
		echo "There is nothing in your cart";
}
else
	echo "You must be logged in to remove items in cart.";
?>
	<br/><a href="./index.html">home</a><br/>
