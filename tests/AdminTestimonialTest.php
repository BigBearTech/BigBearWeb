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
        $user = factory(User::class, 'admin')->make();
        $testimonial = factory(Testimonial::class)->create();

        $this->actingAs($user)
        ->visit('/admin/testimonials');
    }
}
