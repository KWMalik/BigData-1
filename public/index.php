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
	case 'Calls':
		require_once '../application/controllers/CallsController.php';
		$Controller = new CallsController();
		$Controller->Action();
		break;
		
	default:
		require_once '../application/controllers/IndexController.php';
		$Controller = new IndexController();
		$Controller->Action();
}
?>