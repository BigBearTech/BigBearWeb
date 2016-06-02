<?php

use App\User;
use App\Post;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminPageTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * Test that the admin can see the pages page
     *
     * @return void
     */
    public function testAdminPostHome()
    {
        $user = factory(User::class, 'admin')->create();
        $post = factory(Post::class, 'page')->create();
        $user->posts()->save($post);

        $this->actingAs($user)
        ->visit('/admin/pages')
        ->see('Pages')
        ->see($post->name);
    }
    /**
     * Test that the admin can see the create page
     *
     * @return void
     */
    public function testAdminPostCreate()
    {
        $user = factory(User::class, 'admin')->create();

        $this->actingAs($user)
        ->visit('/admin/pages/create')
        ->type('This is a good page', 'name')
        ->type('This is the posts body', 'content')
        ->press('Create');

        $this->seeInDatabase('posts', [
            'name' => 'This is a good page',
            'slug' => str_slug('This is a good page'),
            'post_type' => 'page',
        ]);
    }
    /**
     * Test that the admin can edit a page
     *
     * @return void
     */
    public function testAdminPostEdit()
    {
        $user = factory(User::class, 'admin')->create();
        $page = factory(Post::class, 'page')->create();
        $user->posts()->save($page);

        $this->actingAs($user)
        ->visit(route('admin.pages.edit', ['pages' => $page->id]))
        ->type('This is a good page 2', 'name')
        ->type('This is a good page 2', 'slug')
        ->type('This is the page body 2', 'content')
        ->press('Save');

        $this->seeInDatabase('posts', [
            'name' => 'This is a good page 2',
            'slug' => str_slug('This is a good page 2'),
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
        $post = factory(Post::class, 'page')->create();
        $user->posts()->save($post);

        $this->actingAs($user)
        ->visit('/admin/pages')
        ->press('Delete');
    }
}
