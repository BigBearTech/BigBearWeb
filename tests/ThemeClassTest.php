<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ThemeClassTest extends TestCase
{
    /**
     * Test the get Themes function
     *
     * @return void
     */
    public function testGetThemes()
    {
        $themes = app('Theme')->getThemes();
        $themesWithConfig = app('Theme')->getThemes(true);
        // dd($themesWithConfig);
        $this->assertEquals($themes, ['default']);
        $this->assertArrayHasKey('config', $themesWithConfig[0]);
    }

    /**
     *	Test the getThemeConfig function
     *
     *	@return void
     */
    public function testGetThemeConfig()
    {
    	$config = app('Theme')->getThemeConfig('default');
    	$this->assertContains('BigBearTheme', $config);
    }
}
