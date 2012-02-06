<?php
if (array_key_exists('c', $_REQUEST))
{
	$Request = $_REQUEST['c'];
}
else
{
	$Request = null;
}

switch ($Request)
{
	default:
		require_once '../application/controllers/IndexController.php';
		$Controller = new IndexController();
		$Controller->Action();
}
?>