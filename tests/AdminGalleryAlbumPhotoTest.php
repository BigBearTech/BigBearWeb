<?php

use App\User;
use App\Gallery;
use App\Album;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminGalleryAlbumPhotoTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Show the photo index
     *
     * @return void
     */
    public function testAdminGalleryAlbumPhotoTest()
    {
        $user = factory(User::class, 'admin')->create();
        $gallery = factory(Gallery::class)->create();
        $user->galleries()->save($gallery);
        $album = factory(Album::class)->create();
        $user->albums()->save($album);
        $gallery->albums()->save($album);

        $this->actingAs($user)
        ->visit(route('admin.gallery.album.photo.index', ['gallery' => $gallery->id, 'album' => $album->id]));
    }
}
