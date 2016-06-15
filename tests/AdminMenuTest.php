<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminMenuTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Test the menu home
     *
     * @return void
     */
    public function testAdminMenuHome()
    {
        $user = factory(User::class, 'admin')->create();

        $this->actingAs($user)
        ->visit(route('admin.menu.index'));
    }
}
