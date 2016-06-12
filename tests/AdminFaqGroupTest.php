<?php

use App\User;
use App\FaqGroup;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminFaqGroupTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * Test the FaqGroup page
     *
     * @return void
     */
    public function testAdminFaqGroupHome()
    {
        $user = factory(User::class, 'admin')->create();
        $faq = factory(FaqGroup::class)->create();
        $user->faqgroups()->save($faq);

        $this->actingAs($user)
        ->visit('/admin/faqgroups')
        ->see($faq->title);
    }

    /**
     *	Test the FaqGroup create page.
     *
     *	@return void
     */
    public function testAdminFaqGroupCreate()
    {
    	$user = factory(User::class, 'admin')->create();

    	$this->actingAs($user)
    	->visit('/admin/faqgroups/create')
    	->see('Add New FAQ Group')
    	->type('Testing Group', 'title')
    	->type('Testing Group description', 'description')
    	->press('Save');

    	$this->seeInDatabase('faq_groups', ['title' => 'Testing Group']);
    }

    /**
     *	Test the FaqGroup create page.
     *
     *	@return void
     */
    public function testAdminFaqGroupUpdate()
    {
    	$user = factory(User::class, 'admin')->create();
    	$faqgroup = factory(FaqGroup::class)->create();

    	$this->actingAs($user)
    	->visit(route('admin.faqgroups.edit', ['faqgroups' => $faqgroup->id]))
    	->see('Edit FAQ Group')
    	->type('Testing Group 2', 'title')
    	->type('Testing Group description', 'description')
    	->press('Save');

    	$this->seeInDatabase('faq_groups', ['title' => 'Testing Group 2']);
    }
}
