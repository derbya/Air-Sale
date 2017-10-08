<?php

$add = 0;
$tcart = 0;

session_start();
if ($_SESSION['login'])
{
	if ($_POST['amount'])
	{
		if (!file_exists('./private/cart'))
		{
			file_put_contents('./private/cart', null);
		}
		$basket = unserialize(file_get_contents('./private/cart'));
		$temp['login'] = $_SESSION['login'];
		foreach ($cart as $key => $arg)
		{
			if ($arg['login'] === $_SESSION['login'])
				$tcart = 1;
			if ($tcart && !$add)
			{
				$add = 1;
				if ($_POST['item1'])
					$cart[$key]['item1'] = $cart[$key]['item1'] + $_POST['item1'];
				if ($_POST['item2'])
					$cart[$key]['item2'] = $cart[$key]['item2'] + $_POST['item2'];
				file_put_contents('./private/cart', serialize($cart));
				echo "Thigngs have been added to your basket\n";
			}
		}
		if (!$tcart)
		{
			if ($_POST['item1'])
				$temp['item1'] = $_POST['item1'];
			if ($_POST['item2'])
				$temp['item2'] = $_POST['item2'];
			$cart[] = $temp;
			file_put_contents('./private/cart', serialize($cart));
			echo "Things have been added to your cart.\n";
		}
		print_r($basket);
	}
	else
	{
		echo "you have not selected an amount.\n";
	}
}
else
	echo "You must be logged in to add items to cart.";
?>
	<br/><a href="./index.html">home</a><br/>
