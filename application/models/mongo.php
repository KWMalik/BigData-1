<?php

class Model
{
	private $Mongo;
	
	const ASCENDING = 1;
	const DESCENDING = -1;

	public function __construct()
	{
		$this->Mongo = new Mongo();
	}

	public function FindTitles($RegexString)
	{
		$Collection = $this->Mongo->comedy->cartoons;
//		error_log(print_r($Collection->getIndexInfo(), true));
		
		$RegexObject = new MongoRegex($RegexString); 
		$Query = array( "title" => $RegexObject);
		return $Collection->find($Query);
	}
	
	public function AddTitle()
	{
		$Object = array( "title" => "The Hitchhiker's Guide to the Galaxy", "author" => "Douglas Adams" );
		$Collection = $this->Mongo->comedy->cartoons;
		$Collection->insert($Object);
	}

	public function AddTitleIndex()
	{
		$Collection = $this->Mongo->comedy->cartoons;
		$Collection->ensureIndex(array('title'=>self::ASCENDING), array('safe'=>true, 'timeout'=>60000, 'background'=>true));
	}
	
	public function CountTitles()
	{
		return $this->Mongo->comedy->cartoons->Count();
	}

	public function AddRandomTitles($Count)
	{
		$Collection = $this->Mongo->comedy->cartoons;

		for ($i=0; $i<$Count; $i++)
		{
			$obj = array( "title" => $this->random_string(25) );
			$Collection->insert($obj);
		}
	}

	private function random_string($Length)
	{
		$rtn='';
		$chars = explode(" ", "a b c d e f g h i j k l m n o p q r s t u v w x y z 0 1 2 3 4 5 6 7 8 9");
		for($i = 0; $i < $Length; $i++)
		{
			$rnd = array_rand($chars);
			$rtn .= base64_encode(md5($chars[$rnd]));
		}
		return substr(str_shuffle(strtolower($rtn)), 0, $max);
	}
	
	public function ListDatabases()
	{
		$DBs = $this->Mongo->listDBs();
		$Names = array();
		foreach ($DBs['databases'] as $key=>$DB)
		{
			$DatabaseName = $DB['name'];
			$Database = $this->Mongo->selectDB($DB['name']);
			$Collections = $Database->listCollections();
			$CollectionNames = array();
			foreach ($Collections as $Collection)
			{
				$CollectionNames[] = $Collection->getName();
			}
			$DBs['databases'][$key]['collectionNames'] = $CollectionNames;
		}
		return $DBs['databases'];
	}
	
	public function findFoo()
	{
		$Collection = $this->Mongo->test->foo;
		return $Collection->find();
	}
	
	public function DropFoo()
	{
		$this->Mongo->test->drop();
	}
}
