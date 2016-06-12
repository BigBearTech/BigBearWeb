<?php

namespace App\Classes;

use App\Setting;

/**
* 
*/
class Settings
{
	function __construct()
	{
		# code...
	}

	/**
	 *	Get one setting or multiples.
	 *
	 *	@return Model
	 */
	public function add($name, $value)
	{
		$setting = new Setting;
		$setting->name = $name;
		$setting->value = $value;
		$setting->save();

		return $setting;
	}

	/**
	 *	Get one setting or multiples.
	 *
	 *	@return Model
	 */
	public function get($setting)
	{
		if(is_array($setting)) {
			$settings = Setting::whereIn('name', $setting)->get();
		} else {
			$settings = Setting::where('name', $setting)->first();
		}
		return $settings;
	}
}