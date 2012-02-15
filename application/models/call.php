<?php
require_once '../library/strings.php';
require_once '../application/models/part.php';

class Call
{
	public function __construct($PropertyCount)
	{
		$PartNumber = 0;
		for ($i=0; $i<$PropertyCount; $i++)
		{
			$PropertyName = Strings::RandomString(rand(5, 15));
			$Type = rand(0,3);
			switch ($Type)
			{
				case 0:
					$this->$PropertyName = array_rand(array(true, false));
					break;
				case 1:
					$this->$PropertyName = rand(-10, 1000000);
					break;
				case 2:
					$PropertyName = 'Parts'.$PartNumber;
					$PartNumber += 1;
					$this->$PropertyName = new Part(5, 0);
					break;
				default:
					$this->$PropertyName = Strings::RandomString(rand(1, 64));
			}
		}
	}
}