<?php
session_start();
if ($_SESSION['login'])
{
	if ($_POST['submit'])	
	{
		if (file_exists('./private/cart'))
		{
			$cart = unserialize(file_get_contents('./private/cart'));
			if ($account)
			{
				foreach ($cart as $key => $arg)
				{
					if ($arg['login'] === $_SESSION['login']))
					{
						$cart[$key]['item1'] = $_POST['item1'];
						$cart[$key]['item2'] = $_POST['item2'];
						$cart[$key]['item3'] = $_POST['item3'];
						$cart[$key]['item4'] = $_POST['item4'];
						file_put_contents('./private/cart', serialize($cart));
						break;
					}
				}
				$new['login'] = $_SESSION['login'];
				$new['item1'] = $_POST['item1'];
				$new['item2'] = $_POST['item2'];
				$new['item3'] = $_POST['item3'];
				$new['item4'] = $_POST['item4'];
				$cart[] = $new;
				file_put_contents("./private/cart", serialize($cart));
			}
		}
		else
		{
			$new['login'] = $_SESSION['login'];
			$new['item1'] = $_POST['item1'];
			$new['item2'] = $_POST['item2'];
			$new['item3'] = $_POST['item3'];
			$new['item4'] = $_POST['item4'];
			$cart[] = $new;
			file_put_contents("./private/cart", serialize($cart));
		}
	}
}
else
{
	echo "You must be logged in to add to your cart <('.'<) (>'.')>";
}
?>
