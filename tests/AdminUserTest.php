<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminUserTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * Test that the admin can see the comments.
     *
     * @return void
     */
    public function testUserIndex()
    {
    	$user = factory(User::class, 'admin')->create();

        $this->actingAs($user)
        ->visit('/admin/users')
        ->see('Users')
        ->see($user->name);
    }

    /**
     * Test that the admin can see the create page
     *
     * @return void
     */
    public function testAdminUserCreate()
    {
        $user = factory(User::class, 'admin')->create();

        $this->actingAs($user)
        ->visit('/admin/users/create')
        ->type('Jane Doe', 'name')
        ->type('test@test.com', 'email')
        ->type('123456', 'password')
        ->select('user', 'role')
        ->press('Add New User');

        $this->seeInDatabase('users', [
            'name' => 'Jane Doe',
            'email' => 'test@test.com',
            'role' => 'user',
        ]);
    }

    /**
     * Test that the admin can edit a user
     *
     * @return void
     */
    public function testAdminUserEdit()
    {
        $user = factory(User::class, 'admin')->create();
        $user2 = factory(User::class)->create();

        $this->actingAs($user)
        ->visit(route('admin.users.edit', ['users' => $user2->id]))
        ->type('Jane Doe', 'name')
        ->type('test@test.com', 'email')
        ->type('123456', 'password')
        ->select('user', 'role')
        ->press('Save');

        $this->seeInDatabase('users', [
            'name' => 'Jane Doe',
            'email' => 'test@test.com',
            'role' => 'user',
        ]);
    }

    /**
     * Test that the admin can delete a post
     *
     * @return void
     */
    public function testAdminUserDestroy()
    {
        $user = factory(User::class, 'admin')->create();
        $user2 = factory(User::class)->create();

        $this->actingAs($user)
        ->visit('/admin/users')
        ->press('Delete');
    }
}
