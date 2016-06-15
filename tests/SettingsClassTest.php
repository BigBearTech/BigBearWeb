<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SettingsClassTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * Test the add settings function to see if it works correctly.
     *
     * @return void
     */
    public function testAddSetting()
    {
        app('Settings')->add('testing', '123');

        $this->seeInDatabase('settings', ['name' => 'testing', 'value' => '123']);
    }

    /**
     * Test the get settings function to see if it works correctly.
     *
     * @return void
     */
    public function testGetSetting()
    {
        app('Settings')->add('testing', '123');
        $getSetting = app('Settings')->get('testing');

        $this->assertTrue($getSetting->value === '123');
    }

    /**
     * Test the get settings function with a array to see if it works correctly.
     *
     * @return void
     */
    public function testGetSettingArray()
    {
        app('Settings')->add('testing', '123');
        app('Settings')->add('testing2', '1234');
        $getSetting = app('Settings')->get(['testing', 'testing2']);

        $getMultpleSetting = $getSetting->where('name', 'testing')->first();

		$showSetting = app('Settings')->show($getSetting, 'testing');

        $this->assertTrue($getMultpleSetting->value === '123');
		$this->assertTrue($showSetting === '123');
    }
}
