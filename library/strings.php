<?php
class Strings
{
	public static function RandomString($Length)
	{
		$rtn='';
		$chars = explode(" ", "a b c d e f g h i j k l m n o p q r s t u v w x y z 0 1 2 3 4 5 6 7 8 9");
		for($i = 0; $i < $Length; $i++)
		{
			$rnd = array_rand($chars);
			$rtn .= base64_encode(md5($chars[$rnd]));
		}
		return substr(str_shuffle(strtolower($rtn)), 0, $Length);
	}
}