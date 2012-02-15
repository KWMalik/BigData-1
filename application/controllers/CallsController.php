<?php
class CallsController
{
	public function Action()
	{
		require_once '../application/models/calls.php';
		$Model = new CallsModel();
//		$Model->AddRandomCalls(1);

		$Start = microtime(true);
		$Databases = $Model->ListDatabases();
		$DatabaseInformationTime = microtime(true) - $Start;
				
		$Start = microtime(true);
		$CallCount = $Model->CountCalls();
		$CountTime = microtime(true) - $Start;
		
		$Start = microtime(true);
		$Cursor = $Model->FindCalls();
		$QueryTime = microtime(true) - $Start;
		
		
		include_once '../application/views/scripts/calls/CallsView.phtml';
	}
}
?>