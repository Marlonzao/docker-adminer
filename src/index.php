<?php
function adminer_object()
{
	// required to run any plugin
	include_once "./plugins/plugin.php";

	// autoloader
	foreach (glob("plugins/*.php") as $filename) {
		include_once "./$filename";
	}

	// enable extra drivers just by including them
	//~ include "./plugins/drivers/simpledb.php";

	// Custom class to set CSS theme
	class AdminerCustomization extends AdminerPlugin
	{
		function css()
		{
			$return = array();
			$return[] = getenv('DB_THEME') ? getenv('DB_THEME') : "adminer.css";
			return $return;
		}
	}

	$plugins = array(
		new FillLoginForm(
			getenv('DB_TYPE') ? getenv('DB_TYPE') : 'server',
			getenv('DB_HOST') ? getenv('DB_HOST') : 'database',
			getenv('DB_USER'),
			getenv('DB_PASSWORD'),
			getenv('DB_NAME')
		)
	);

	return new AdminerCustomization($plugins);
}

// include original Adminer or Adminer Editor
include "./adminer.php";
