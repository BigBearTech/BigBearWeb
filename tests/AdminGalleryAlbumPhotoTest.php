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

    /**
     * Show the create view for the photo
     *
     * @return void
     */
    public function testAdminGalleryAlbumPhotoCreateTest()
    {
    	$user = factory(User::class, 'admin')->create();
    	$gallery = factory(Gallery::class)->create();
        $user->galleries()->save($gallery);
        $album = factory(Album::class)->create();
        $user->albums()->save($album);
        $gallery->albums()->save($album);

        $this->actingAs($user)
        ->visit(route('admin.gallery.album.photo.create', ['gallery' => $gallery->id, 'album' => $album->id]));
    }

    private function prepareFileUpload($path)
	{
	    TestCase::assertFileExists($path);

	    $finfo = finfo_open(FILEINFO_MIME_TYPE);

	    $mime = finfo_file($finfo, $path);

	    return new \Illuminate\Http\UploadedFile($path, null, $mime, null, null, true);
	}

    /**
     * Show the create view for the photo
     *
     * @return void
     */
    public function testAdminGalleryAlbumPhotoUpdateTest()
    {
    	$user = factory(User::class, 'admin')->create();
    	$gallery = factory(Gallery::class)->create();
        $user->galleries()->save($gallery);
        $album = factory(Album::class)->create();
        $user->albums()->save($album);
        $gallery->albums()->save($album);

        $file = $this->prepareFileUpload('public/upload/test.png');

        $this->actingAs($user);
	    $this->call('POST', route('admin.gallery.album.photo.store', ['gallery' => $gallery->id, 'album' => $album->id]), [], [], ['file' => $file], []);
    	$this->assertResponseOk();

        $photo = \App\Photo::find(1);

        $this->visit(route('admin.gallery.album.photo.edit', ['gallery' => $gallery->id, 'album' => $album->id, 'photo' => $photo->id]))
        ->type('Testing Title', 'title')
        ->type('Testing Description', 'description')
        ->press('Update');
    }
}
