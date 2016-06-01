<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminTest extends TestCase
{
	use DatabaseMigrations;

    /**
     * Test the admin homepage
     *
     * @return void
     */
    public function testHome()
    {
    	$user = factory(User::class, 'admin')->make();

        $this->actingAs($user)
        ->visit('/admin')
        ->see('BigBearWeb');
    }

    /**
     * Test that non admins can't see the admin panel
     *
     * @return void
     */
    public function testNotAAdmin()
    {
    	$user = factory(User::class)->make();

    	$this->actingAs($user)
    	->get('/admin')
    	->assertResponseStatus('403');
    }
}
