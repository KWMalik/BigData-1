<?php
require_once '../library/strings.php';

class Part
{
	public function __construct($PropertyCount, $RecursionDepth)
	{
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
					if ($RecursionDepth < 5)
					{
						$RecursionDepth += 1;
						$PropertyName = 'Parts'.$RecursionDepth;
						$this->$PropertyName = new Part(5, $RecursionDepth);
						break;
					}
				default:
					$this->$PropertyName = Strings::RandomString(rand(1, 64));
			}
		}
	}
}