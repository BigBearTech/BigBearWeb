<?php

use App\User;
use App\FaqGroup;
use App\Faq;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminFaqGroupFaqTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * Test the FaqGroup page
     *
     * @return void
     */
    public function testAdminFaqGroupFaqHome()
    {
        $user = factory(User::class, 'admin')->create();
        $faqGroup = factory(FaqGroup::class)->create();
        $user->faqgroups()->save($faqGroup);
        $faq = factory(Faq::class)->create();
        $user->faqs()->save($faq);

        $this->actingAs($user)
        ->visit(route('admin.faqgroups.faqs.index', ['faqgroups' => $faqGroup->id]))
        ->see($faq->title);
    }

    /**
     *	Test the FaqGroup create page.
     *
     *	@return void
     */
    public function testAdminFaqGroupFaqCreate()
    {
    	$user = factory(User::class, 'admin')->create();
        $faqGroup = factory(FaqGroup::class)->create();
        $user->faqgroups()->save($faqGroup);

    	$this->actingAs($user)
    	->visit(route('admin.faqgroups.faqs.create', ['faqgroups' => $faqGroup->id]))
    	->see('Add New FAQ')
    	->type('Testing FAQ', 'title')
    	->type('Testing FAQ description', 'description')
    	->press('Save');

    	$this->seeInDatabase('faqs', ['title' => 'Testing FAQ']);
    }

    /**
     *	Test the Faq edit page.
     *
     *	@return void
     */
    public function testAdminFaqGroupFaqUpdate()
    {
    	$user = factory(User::class, 'admin')->create();
        $faqgroup = factory(FaqGroup::class)->create();
        $user->faqgroups()->save($faqgroup);
    	$faq = factory(Faq::class)->create();
        $user->faqs()->save($faq);

    	$this->actingAs($user)
    	->visit(route('admin.faqgroups.faqs.edit', ['faqgroups' => $faqgroup->id, 'faqs' => $faq->id]))
    	->see('Edit FAQ')
    	->type('Testing 2', 'title')
    	->type('Testing description', 'description')
    	->press('Save');

    	$this->seeInDatabase('faqs', ['title' => 'Testing 2']);
    }
}
