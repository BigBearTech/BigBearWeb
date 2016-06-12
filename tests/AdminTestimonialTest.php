<?php

use App\User;
use App\Testimonial;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminTestimonialTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * Test that the admin can see the testimonials page
     *
     * @return void
     */
    public function testAdminTestimonialHome()
    {
        $user = factory(User::class, 'admin')->create();
        $testimonial = factory(Testimonial::class)->create();
        $user->testimonials()->save($testimonial);

        $this->actingAs($user)
        ->visit('/admin/testimonials')
        ->see($testimonial->fullname);
    }
    /**
     * Test that the admin can see the create testimonial
     *
     * @return void
     */
    public function testAdminTestimonialCreate()
    {
        $user = factory(User::class, 'admin')->create();

        $this->actingAs($user)
        ->visit('/admin/testimonials/create')
        ->type('John Doe', 'display_name')
        ->type('J. Doe', 'fullname')
        ->type('test@bigbearmail.com', 'email')
        ->type('Portland', 'location')
        ->type('http:/bigbeartech.com', 'url')
        ->type('This is a cool testimonial!', 'content')
        ->select('true', 'display_url')
        ->select('false', 'featured')
        ->select('publish', 'status')
        ->press('Save');

        $this->seeInDatabase('testimonials', [
            'display_name' => 'John Doe',
        ]);
    }
}
