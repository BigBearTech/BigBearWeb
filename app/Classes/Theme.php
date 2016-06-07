<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;

/**
* 
*/
class Theme
{
	
	function __construct()
	{

	}

	/**
	 * 	Get the themes and the theme.json
	 *
	 *	@return void
	 */
	public function getThemes($config=false)
	{
		$themes = Storage::disk('themes')->directories();

		if($config) {
			$themesfinal = [];
			foreach($themes as $theme) {
				$themesfinal[] = [
					'name' => $theme,
					'config' => $this->getThemeConfig($theme),
				];
			}
			return $themesfinal;
		}

		return $themes;
	}

	/**
	 * 	Get the theme config for a specified theme
	 *
	 *	@return void
	 */
	public function getThemeConfig($themeName)
	{
		if(Storage::disk('themes')->exists($themeName . DIRECTORY_SEPARATOR . '/theme.json')) {
			$config = Storage::disk('themes')->get($themeName . DIRECTORY_SEPARATOR . '/theme.json');
			return (array)json_decode($config);
		}
		return false;
	}
}