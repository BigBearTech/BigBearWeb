<?php

use App\User;
use App\Post;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminPostTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * Test that the admin can see the posts page
     *
     * @return void
     */
    public function testAdminPostHome()
    {
    	$user = factory(User::class, 'admin')->create();
    	$post = factory(Post::class)->create();
    	$user->posts()->save($post);

        $this->actingAs($user)
        ->visit('/admin/posts')
        ->see('Posts');
    }
}
