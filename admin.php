<?php
	function admin($login)
	{
		if (!file_exists('./private/passwd'))
			return false;
		if (!$login)
			return false;
		$accounts = unserialize(file_get_contents('./private/passwd'));
		if ($accounts)
		{
			foreach ($accounts as $key => $arg)
			{
				if ($arg['login'] === $login && $arg['admin'] === true)
					return true;
			}
		}
		return false;
	}
?>
