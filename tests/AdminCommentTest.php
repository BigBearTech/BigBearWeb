<?php

use App\User;
use App\Comment;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminCommentTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * Showing all the comments
     *
     * @return void
     */
    public function testCommentsHome()
    {
    	$user = factory(User::class, 'admin')->create();
    	$comment = factory(Comment::class)->create();
        
        $this->actingAs($user)
        ->visit('/admin/comments');
    }
}
