<?php
class IndexController
{
	public function Action()
	{
		require_once '../application/models/mongo.php';
		$Model = new Model();
//		$Model->addTitleIndex();
		
		$Start = microtime(true);
		$Databases = $Model->ListDatabases();
		$DatabaseInformationTime = microtime(true) - $Start;
		
		$Start = microtime(true);
		$TitleCount = $Model->CountTitles();
		$CountTime = microtime(true) - $Start;
		
		$Start = microtime(true);
		$Cursor = $Model->FindTitles('/hitch.+/i');
		$QueryTime = microtime(true) - $Start;
		
		include_once '../application/views/scripts/mongo/mongo.phtml';
	}
}
?>