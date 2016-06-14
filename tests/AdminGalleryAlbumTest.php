<?php

use App\User;
use App\Gallery;
use App\Album;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminGalleryAlbumTest extends TestCase
{
	use DatabaseMigrations;

    /**
     * Show the albums for a gallery
     *
     * @return void
     */
    public function testAdminGalleryAlbumTest()
    {
        $user = factory(User::class, 'admin')->create();
        $gallery = factory(Gallery::class)->create();
        $user->galleries()->save($gallery);
        $album = factory(Album::class)->create();
        $user->albums()->save($album);
        $gallery->albums()->save($album);

        $this->actingAs($user)
        ->visit(route('admin.gallery.album.index', ['gallery' => $gallery->id]));
    }

    /**
     * Show the create view for the album
     *
     * @return void
     */
    public function testAdminGalleryAlbumCreateTest()
    {
    	$user = factory(User::class, 'admin')->create();
    	$gallery = factory(Gallery::class)->create();
    	$user->galleries()->save($gallery);

        $this->actingAs($user)
        ->visit(route('admin.gallery.album.create', ['gallery' => $gallery->id]))
        ->type('Testing Album', 'title')
        ->type('This is a description!', 'description')
        ->press('Save');

        $this->seeInDatabase('albums', ['title' => 'Testing Album']);
    }

    /**
     * Show the edit view
     *
     * @return void
     */
    public function testAdminGalleryAlbumUpdateTest()
    {
    	$user = factory(User::class, 'admin')->create();
    	$gallery = factory(Gallery::class)->create();
    	$user->galleries()->save($gallery);
		$album = factory(Album::class)->create();
		$user->albums()->save($album);
		$gallery->albums()->save($album);

        $this->actingAs($user)
        ->visit(route('admin.gallery.album.edit', ['gallery' => $gallery->id, 'album' => $album->id]))
        ->type('Testing Album edit', 'title')
        ->type('This is a description!', 'description')
        ->press('Save');

        $this->seeInDatabase('albums', ['title' => 'Testing Album edit']);
    }
}
