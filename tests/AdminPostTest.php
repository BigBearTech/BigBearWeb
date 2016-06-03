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
        ->assertViewHasAll(['posts'])
        ->see('Posts')
        ->see($post->name);
    }
    /**
     * Test that the admin can see the create post
     *
     * @return void
     */
    public function testAdminPostCreate()
    {
        $user = factory(User::class, 'admin')->create();

        $this->actingAs($user)
        ->visit('/admin/posts/create')
        ->type('This is a good post', 'name')
        ->type('This is the posts body', 'content')
        ->press('Save');

        $this->seeInDatabase('posts', [
            'name' => 'This is a good post',
            'slug' => str_slug('This is a good post'),
        ]);
    }
    /**
     * Test that the admin can edit a post
     *
     * @return void
     */
    public function testAdminPostEdit()
    {
        $user = factory(User::class, 'admin')->create();
        $post = factory(Post::class)->create();
        $user->posts()->save($post);

        $this->actingAs($user)
        ->visit(route('admin.posts.edit', ['post_id' => $post->id]))
        ->type('This is a good post 2', 'name')
        ->type('This is a good post 2', 'slug')
        ->type('This is the posts body 2', 'content')
        ->press('Save');

        $this->seeInDatabase('posts', [
            'name' => 'This is a good post 2',
            'slug' => str_slug('This is a good post 2'),
        ]);
    }
    /**
     * Test that the admin can delete a post
     *
     * @return void
     */
    public function testAdminPostDestroy()
    {
        $user = factory(User::class, 'admin')->create();
        $post = factory(Post::class)->create();
        $user->posts()->save($post);

        $this->actingAs($user)
        ->visit('/admin/posts')
        ->press('Delete');
    }
}
