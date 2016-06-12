<?php

namespace App\Classes;

/**
* 
*/
class Form
{
	private function compare($param, $param2, $strict)
	{
		if($strict) {
			if($param === $param2) {
				return true;
			}
			return false;
		}
		if($param == $param2) {
			return true;
		}
		return false;
	}

	public function isActive($param, $param2, $default='selected', $strict=false)
	{
		$compare = $this->compare($param, $param2, $strict);

		if($compare) {
			return $default;
		}
		return '';
	}
}