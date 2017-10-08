<?php
	function auth($login, $passwd)
	{
		if (!file_exists('./private/passwd'))
			return false;
		if (!$login || !$passwd)
			return false;
		$accounts = unserialize(file_get_contents('./private/passwd'));
		if ($accounts)
		{
			foreach ($accounts as $key => $arg)
			{
				if ($arg['login'] === $login && $arg['passwd'] === hash('whirlpool', $passwd))
					return true;
			}
		}
		return false;
	}
?>
