<?php

class CallsModel
{
	private $Mongo;
	
	const ASCENDING = 1;
	const DESCENDING = -1;

	public function __construct()
	{
		$this->Mongo = new Mongo();
	}

	public function AddRandomCalls($Count)
	{
		require_once '../application/models/call.php';
		$Collection = $this->Mongo->ba->calls;

		for ($i=0; $i<$Count; $i++)
		{
			$Call = new Call(10);
			error_log(print_r($Call, true));
			$Collection->insert($Call);
		}
	}

	public function CountCalls()
	{
		return $this->Mongo->ba->calls->Count();
	}

	public function FindCalls()
	{
		$Collection = $this->Mongo->ba->calls;

//		$Query = array( "nymod" => "4oa");	
		$Query = array( "Parts0.m2mny" => "jtmz5jimjz2zvmfz2zm5zyowqutd0z2w2vikxtjim2w");

		return $Collection->find($Query);
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
}
