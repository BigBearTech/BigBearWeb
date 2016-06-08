<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Storage;

class AdminMediaTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * Test that the admin can see the media page
     *
     * @return void
     */
    public function testAdminMediaHome()
    {
    	$user = factory(User::class, 'admin')->create();

        $this->actingAs($user)
        	->visit('/admin/media')
        	->see('Media Manager');

    }

    private function prepareFileUpload($path)
	{
	    TestCase::assertFileExists($path);

	    $finfo = finfo_open(FILEINFO_MIME_TYPE);

	    $mime = finfo_file($finfo, $path);

	    return new \Illuminate\Http\UploadedFile($path, null, $mime, null, null, true);
	}

	private function uploadImage($user)
	{
		Storage::disk('media')->deleteDirectory(\Carbon\Carbon::now()->year);
		$file = $this->prepareFileUpload('public/upload/upload.jpg');

        $this->actingAs($user);
	    $this->call('POST', '/admin/media', [], [], ['file' => $file], []);
    	$this->assertResponseOk();
	}

    /**
     * Test that the file gets uploaded
     *
     * @return void
     */
    public function testMediaPost()
    {
	    $user = factory(User::class, 'admin')->create();
	    $this->uploadImage($user);
    }

    /**
     *	Test that the file can be edited.
     *
     *	@return void
     */
    public function testMediaEdit()
    {
    	$user = factory(User::class, 'admin')->create();
    	$this->uploadImage($user);

    	$this->actingAs($user)
    		->visit(route('admin.media.edit', ['media' => 1]))
    		->type('image', 'title')
    		->type('123 this is a cool caption', 'caption')
    		->type('This is a nice image', 'alt_text')
    		->type('This is a cool description', 'description')
    		->press('Update');

    	$this->seeInDatabase('attachments', ['title' => 'image']);
    }
}
