<?php

use App\User;
use App\Post;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminPost extends TestCase
{
    /**
     * Test that the admin can see the posts page
     *
     * @return void
     */
    public function testExample()
    {
    	$user = factory(User::class, 'admin')->make();
    	$post = factory(Post::class)->make();

        $this->actingAs($user)
        ->visit('/admin/posts');
    }
}
