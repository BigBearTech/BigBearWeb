<?php

use App\User;
use App\Gallery;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminGalleryTest extends TestCase
{
	use DatabaseMigrations;

    /**
     * Show a list of galleries
     *
     * @return void
     */
    public function testGalleryHome()
    {
        $user = factory(User::class, 'admin')->create();
        $gallery = factory(Gallery::class)->create();
        $user->galleries()->save($gallery);

        $this->actingAs($user)
        ->visit(route('admin.gallery.index'))
        ->see('Photo Galleries');

        $this->seeInDatabase('galleries', ['title' => $gallery->title]);
    }

    /**
     * Show the create gallery page
     *
     * @return void
     */
    public function testGalleryCreate()
    {
        $user = factory(User::class, 'admin')->create();
        $gallery = factory(Gallery::class)->create();
        $user->galleries()->save($gallery);

        $this->actingAs($user)
        ->visit(route('admin.gallery.create'))
        ->see('Add New Photo Gallery')
        ->type('BigBearGallery', 'title')
        ->type('This is cool gallery!', 'description')
        ->press('Save');

        $this->seeInDatabase('galleries', ['title' => 'BigBearGallery']);
    }

    /**
     * Show the update gallery page
     *
     * @return void
     */
    public function testGalleryUpdate()
    {
        $user = factory(User::class, 'admin')->create();
        $gallery = factory(Gallery::class)->create();
        $user->galleries()->save($gallery);

        $this->actingAs($user)
        ->visit(route('admin.gallery.edit', ['gallery' => $gallery->id]))
        ->see('Edit Photo Gallery')
        ->type('BigBearGallery 2', 'title')
        ->type('This is cool gallery!', 'description')
        ->press('Save');

        $this->seeInDatabase('galleries', ['title' => 'BigBearGallery 2']);
    }
}
