<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminSettingsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Test the general settings
     *
     * @return void
     */
    public function testAdminSettingsGeneral()
    {
        $user = factory(User::class, 'admin')->create();

        $this->actingAs($user)->visit(route('admin.setting.general'));
    }
}
