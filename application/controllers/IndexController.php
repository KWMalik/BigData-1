<?php
class IndexController
{
	public function Action()
	{
		require_once '../application/models/mongo.php';
		$Model = new Model();
//		$Model->addTitleIndex();
		
		$Databases = $Model->ListDatabases();
		
		$TitleCount = $Model->CountTitles();
		
		$Start = microtime(true);
		$Cursor = $Model->FindTitles('/hitch.+/i');
		$QueryTime = microtime(true) - $Start;
		
		include_once '../application/views/scripts/mongo/mongo.phtml';
	}
}
?>