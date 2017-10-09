<?php

$tcart = 0;
$rem = 0;

session_start();
if ($_SESSION['login'])
{
	if ($_POST['checkout'])
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
			if ($arg['login'] === $_SESSION['login'])
				$tcart = 1;
			if ($tcart && !$rem)
			{
				$rem = 1;
				if ($cart[$key]['item1'] > 0)
				{
					$new['item1'] = $cart[$key]['item1'];
					unset($cart[$key]['item1']);
				}
				if ($cart[$key]['item2'] > 0)
				{
					$new['item2'] = $cart[$key]['item2'];
					unset($cart[$key]['item2']);
				}
				$checkout[] = $new;
				file_put_contents('./private/checkout', serialize($new));
				echo "you have purchased things.\n";
			}
		}
		if (!$tcart)
			echo "There is nothing in your cart to checkout";
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
