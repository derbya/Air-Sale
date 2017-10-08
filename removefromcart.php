<?php

$tcart = 0;
$rem = 0;

session_start();
if ($_SESSION['login'])
{
	if ($_POST['amount'])
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
		foreach ($basket as $key => $arg)
		{
			if ($arg['login'] === $_SESSION['logged_on'])
				$tcart = 1;
			if ($tcart && !$rem)
			{
				$rem = 1;
				if ($_POST['item1'])
				{
					$cart[$key]['item1'] = $cart[$key]['item1'] - $_POST['item1'];
					if ($cart[$key]['item1'] <= 0)
						unset($cart[$key]['item1']);
				}
				if ($_POST['item2'])
				{
					$cart[$key]['item2'] = $cart[$key]['item2'] - $_POST['item2'];
					if ($cart[$key]['item2'] <= 0)
						unset($cart[$key]['item2']);
				}
				file_put_contents('./private/cart', serialize($cart));
				echo "Things have been removed from your cart.\n";
			}
		}
		if (!$tcart)
			echo "There is nothing in your cart to remove";
		print_r($basket);
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
